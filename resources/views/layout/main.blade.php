<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('js/jstree.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ec6611206c.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css/jstree.css') }}" rel="stylesheet" /> --}}
    @yield ('header')
</head>

<body>
    <div class="loader">
        <div class="spinner" role="status">
            <span class=""><i class="fa-solid fa-spinner fa-spin-pulse"></i></span>
        </div>
    </div>
    @include('partials.mainNav')
    <div class="wrapper">
        <div class="content">
            <div id="main" class="main main-sub">
                <div class="content-new">
                    @yield ('content')
                </div>
            </div>
            @if(!in_array(Route::currentRouteName(), ['frontpage.index', 'admin.index', 'student.index']))
                @include('partials.sidebar')
            @endif
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield ('footer')
    {{-- @include('partials.loading') --}}
</body>

</html>
