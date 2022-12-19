<nav class="navbar fixed-top navbar-expand navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand sl" href="{{ route('frontpage.index') }}">
            <div class="logo_wrapper" ta><span class="logo_first">UCL</span><span class="logo_second">Vejledning</span></div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav md-auto">
                <li class="nav-item">
                    <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'frontpage.index') active @endif"" href="{{ route('frontpage.index') }}">Registering</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'dashboard.index') active @endif" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a id="datareports" class="nav-link top-nav-link top-nav-link-mega load @if (Route::currentRouteName() == 'admin.index') active @endif" href="{{ route('admin.index') }}">Admin</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @if(!in_array(Route::currentRouteName(), ['frontpage.index', 'admin.index', 'student.index']))
                <li class="nav-item">
                    <a class="nav-link top-nav-link" id="filter_toggle">
                        Filter <i class="fal fa-filter" aria-hidden="true"></i>
                    </a>
                </li>
                @endif
                <li class="nav-item dropdown nav-user">
                    <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            <span class="account-user-name">
                                Nikolaj With Lauritsen
                            </span>
                            <span class="account-position">
                                Udvikler
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-animated" aria-labelledby="navbarDropdown">
                        <li>
                            <h6 class="dropdown-header">Nikolaj With Lauritsen</h6>
                        </li>
                        <li>
                            <div class="dropdown-item-text">Udvikler</div>
                        </li>
                        <li>
                            <div class="dropdown-item-text">Direktions- og Kvalitetssekretariatet</div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand fixed-top navbar-expand-md subnavbar">
    <div class="container-fluid">
        @if (in_array(Route::currentRouteName(), ['dashboard.index', 'dashboard.topics', 'dashboard.student']))
            <a class="navbar-brand-sub sl me-5" href="/">Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarNavSub">
                <ul class="navbar-nav sub-nabbar-nav">
                    <li class="nav-item">
                        <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'dashboard.index') active @endif"" href="{{ route('dashboard.index') }}">Oversigt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'dashboard.topics') active @endif"" href="{{ route('dashboard.topics') }}">Emner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'dashboard.student') active @endif"" href="{{ route('dashboard.student') }}">Studerendes meninger</a>
                    </li>
                </ul>
            </div>
        @endif
        @if (in_array(Route::currentRouteName(), ['student.index', 'frontpage.index']))
            <a class="navbar-brand-sub sl me-5" href="/">Registering</a>
            <div class="collapse navbar-collapse" id="navbarNavSub">
                <ul class="navbar-nav sub-nabbar-nav">
                    <li class="nav-item">
                        <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'frontpage.index') active @endif"" href="{{ route('frontpage.index') }}">For studievejleder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link top-nav-link load @if (Route::currentRouteName() == 'student.index') active @endif"" href="{{ route('student.index') }}">For studerende</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
