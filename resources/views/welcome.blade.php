<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Build Customize Page</title>


    <link rel="stylesheet" href="{{ asset('/assets/style.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <style>
        .error {
            font-size: small;
            color: red;
            padding: 4px;
        }
    </style>

</head>

<body class="container bg-light">
    <!-- Start Header form -->
    <div class="text-center pt-5">
        <h2>Building Customize View </h2>
        <p>
            Please fill up the required fields to generate a beautiful view page for you.
        </p>
    </div>
    <!-- End Header form -->

    <!-- Start Card -->
    <div class="card">
        <!-- Start Card Body -->
        <div class="card-body">
            <!-- Start Form -->
            <form id="viewForm" action="{{ route('collector') }}" method="post" class="needs-validation" novalidate
                autocomplete="off" enctype="multipart/form-data">
                @csrf


                <!-- Start Logo Choose -->
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required />
                    <small class="form-text text-muted">Minimal logo will be a great match.</small>
                </div>
                <!-- End Logo Choose -->

                <!-- Start Input Colors -->
                <div class="form-group">
                    <label>Choose Colors</label>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <input type="color" class="form-control" id="bg_color" name="bg_color" value="#fef059"
                            required />

                        <div class="pl-1 pr-2">-</div>
                        <input type="color" class="form-control" id="heading_bg_color" name="heading_bg_color"
                            value="#ffffff" required />
                        <div class="pl-1 pr-2">-</div>
                        <input type="color" class="form-control" id="heading_text_color" name="heading_text_color"
                            value="#00000000" required />
                    </div>
                    <small class="form-text text-muted">Choose background color, Heading Text
                        background color & Heading Text color
                        respectively.</small>
                    @if($errors->has('bg_color'))
                    <div class="form-text error">{{ $errors->first('bg_color') }}</div>
                    @endif

                    @if($errors->has('heading_bg_color'))
                    <div class="form-text error">{{ $errors->first('heading_bg_color') }}</div>
                    @endif

                </div>
                <!-- End Input Colors -->

                <!-- Start Input Head Text -->
                <div class="form-group">
                    <label for="logo">Heading Text</label>
                    <input type="text" class="form-control" id="heading" name="heading"
                        value="Everything will be alright just be positive" required />
                    <small class="form-text text-muted">Meaningful heading text can generate awesome background
                        image.</small>

                    @if($errors->has('heading'))
                    <div class="form-text error">{{ $errors->first('heading') }}</div>
                    @endif
                </div>
                <!-- End Input Head Text -->


                <!-- Start Website & social link -->
                <div class="form-row">
                    <legend class="col-form-label pb-3">Website & Social Links</legend>
                    <div class="row col-md-12 px-1">
                        <div class="form-group col-md-12">
                            <label for="website">Website URL</label>
                            <input type="link" class="form-control" id="website" name="website"
                                value="https://jeevenlamichhane.com.np" required />
                            @if($errors->has('website'))
                            <div class="form-text error">{{ $errors->first('website') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="linkedin">LinkedIn URL</label>
                            <input type="link" class="form-control" id="linkedin" name="linkedin"
                                value="http://linkedin.com/in/jeeven-lamichhane" required />
                            @if($errors->has('linkedin'))
                            <div class="form-text error">{{ $errors->first('linkedin') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="instagram">Instagram URL</label>
                            <input type="link" class="form-control" id="instagram" name="instagram"
                                value="https://instagram.com/_nepalivlog" required />
                            @if($errors->has('instagram'))
                            <div class="form-text error">{{ $errors->first('instagram') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="facebook">Facebook URL</label>
                            <input type="link" class="form-control" id="facebook" name="facebook"
                                value="https://facebook.com/macalistairvlogs" required />
                            @if($errors->has('facebook'))
                            <div class="form-text error">{{ $errors->first('facebook') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-md-12">

                            @foreach ($errors->all() as $error)
                            <div class="form-text error">{{ $error }}</div>
                            @endforeach

                            @if($errors->has('failure_message'))
                            <div class="form-text error">{{ $errors->first('failure_message') }}</div>
                            @endif

                        </div>



                    </div>
                </div>
                <!-- End Website & social link -->



                <!-- Start Submit Button -->
                <button class="btn btn-primary btn-block col-lg-2 float-right" type="submit">Generate View</button>
                <!-- End Submit Button -->
            </form>
            <!-- End Form -->
        </div>
        <!-- End Card Body -->
    </div>
    <!-- End Card -->
    <footer>
        <div class="my-4 text-muted text-center">
            <p>© {{ env('APP_NAME', 'Page Generator') }}</p>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <script src="{{ asset('/assets/script.js') }}"></script>

</body>

</html>
