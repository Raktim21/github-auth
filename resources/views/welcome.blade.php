<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{-- Connect CDN of bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <h1 class="text-center">Welcome to Github Auth</h1>
                </div>
                <div class="col-md-12">
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('auth.redirect') }}">Login with Github</a>
                    </div>
                </div>
            </div>
        </div>


        {{-- Connect CDN of bootstrap js --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>