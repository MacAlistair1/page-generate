<?php

namespace App\Http\Controllers;

use App\Custom\HttpRequest;
use App\Http\Requests\InputRequest;
use App\Http\Resources\PageBuilderResource;
use App\Models\PageBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FormController extends Controller
{

    public function collectData(InputRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('logo');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(storage_path('app/public'), $filename);
        $data['logo'] = $filename;
        $data['website'] = $this->removeHttp($request->website, '');
        $data['linkedin'] = $this->removeHttp($request->linkedin, 'linkedin.com/in');
        $data['instagram'] = $this->removeHttp($request->instagram, 'instagram.com');
        $data['facebook'] = $this->removeHttp($request->facebook, 'facebook.com');

        $pageData = PageBuilder::create($data);

        $url = URL::temporarySignedRoute(
            'view',
            now()->addHours(1)
        );

        return redirect($url);
    }

    public function getData()
    {
        $data = PageBuilder::latest()->first();

        return new PageBuilderResource($data);

    }

    public function generateImage(Request $request)
    {

        $page = PageBuilder::findOrFail($request->pageId);

        $url = 'https://api.unsplash.com/search/photos';

        $params = [
            "query" => $page->heading,
            "client_id" => config('services.unsplash.client_id'),
        ];

        $httpBuilder = new HttpRequest();
        $httpBuilder->get($url, $params);
        $response = $httpBuilder->execute();

        $results = $response->response()['results'];

        $image = $results[0]['urls']['regular'];

        $page->generated_image = $image;
        $page->save();

        return new PageBuilderResource($page);

    }

    public function viewPage(Request $request)
    {

        if (!$request->hasValidSignature()) {
            return redirect('/')->with('failure_message', 'Invalid signature found.');
        }

        if (PageBuilder::count() == 0) {
            return redirect('/')->with('failure_message', 'Please fill up the require fields to generate awesome view.');
        }

        return view('view');
    }

    private function removeHttp($url, $social)
    {
        $disallowed = array('http://' . $social, 'https://' . $social);
        foreach ($disallowed as $d) {
            if (strpos($url, $d) === 0) {
                return str_replace($d, '', $url);
            }
        }
        return $url;
    }

}
