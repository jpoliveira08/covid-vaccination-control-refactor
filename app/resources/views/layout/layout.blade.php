<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <x-common.nav/>
                    </div>
                </div>
                <div class="col py-3">
                    <h1>@yield('page_title')</h1>
                    <hr>
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
