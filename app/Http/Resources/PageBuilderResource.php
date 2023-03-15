<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageBuilderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'logo' => url($this->logo),
            'bgColor' => $this->bg_color,
            'headingBgColor' => $this->heading_bg_color,
            'headingTextColor' => $this->heading_text_color,
            'heading' => $this->heading,
            'website' => $this->website,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'image' => $this->generated_image,
        ];
    }
}
