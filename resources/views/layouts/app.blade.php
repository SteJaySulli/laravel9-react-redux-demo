<!doctype html>
<html>
    <head>
        <title>{{env("APP_NAME")}}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @viteReactRefresh
        @vite('resources/js/app.js')
    </head>
    <body>
        <div style="background: rgba(0,0,0,0.3)">
            <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh; overflow-y: auto;">
                @yield('content')
            </div>
        </div>
    </body>
</html>