<!DOCTYPE html>
<html>

<head>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ec6611206c.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    @yield ('header')
</head>

<body>
    <div class="loader">
        <div class="spinner" role="status">
            <span class=""><i class="fa-solid fa-spinner fa-spin-pulse"></i></span>
        </div>
    </div>
    <nav class="navbar fixed-top navbar-expand navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand load" href="/">
                <div class="logo_wrapper">
                    <span class="logo_first">UCL Erhvervsakademi og Professionshøjskole</span>
                </div>
            </a>
        </div>
    </nav>
    <div class="wrapper">
        <div class="content">
            <div id="main" class="main main-sub">
                <p class="p-0 mb-5 text-center" id="identity_provider">This Identity Provider needs to validate your identity. Please login to your existing account here so that we can return verification back to your local service.
                    <br/><em>(for testing purposes, just enter a random email and password)</em>
                </p>
                <div class="content-new">
                    <div class="login_box mx-auto">
                        <img class="w-50 mb-4 mx-auto d-block" src="{{ asset('images/ucl_logo.png') }}">
                        <form action="{{ route('frontpage.index') }}">
                            <input class="form-control mb-3" type="text" placeholder="Username" required>
                            <input class="form-control mb-3" type="password" placeholder="Password" required>
                            <input class="ms-auto d-block btn btn-primary" type="submit" value="Sign in">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
