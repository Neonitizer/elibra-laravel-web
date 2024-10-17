<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/elibra_logo.png')}}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Britannic Bold Regular';
            src: url("{{asset('font/Britannic-Bold-Regular.ttf')}}");
        }
        
        @font-face {
            font-family: 'Oswald';
            src: url("{{asset('font/Oswald-VariableFont_wght.ttf')}}");
        }

        body {
            background-image: url("{{asset('img/green_background.jpeg')}}");
            background-size: cover;
            height: 100vh;
            margin: 0;
        }

        .custom-bg-color {
            background-color: #014515;
        }

        h1 {
            font-family: 'Britannic Bold Regular' !important;
            font-size: 30px;
            font-weight: bold;
        }
        h2 {
            font-family: 'Oswald';
            font-size: 25px;
        }
        * {
            font-family: Arial;
            font-size: 16px;
        }

    </style>
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    <div class="navbar sticky-top" style="background-color: #B0D85F;">
        <div class="container-fluid">
            <a href="{{route('homepage')}}">
                <img class="navbar-brand" style="width:20vw" src="{{asset('img/logo_elibra_plus_text.png')}}" alt="" />
            </a>
            @if (session('accesslevel'))
            <div>
                <a class="bg-success btn me-4 rounded text-white" href="{{route('logout_process')}}">Log-out</a>
            </div>
            @elseif (!request()->is('login') && !request()->is('register'))
            <div>
                <a class="bg-success btn me-4 rounded text-white" href="{{route('login_page')}}">Log-in</a>
                <a class="bg-success btn me-4 rounded text-white" href="{{route('register_page')}}">Register</a>
            </div>
            @endif
        </div>
    </div>
    <div class="container-fluid mt-5 pb-5">
        <div class="container mt-5">
            {{ $slot }}
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>