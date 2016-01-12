@if ($authenticatedUser && $authenticatedUser->role == 'admin')
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">{{ $authenticatedUser->username }} <i style="padding-left: 5px;" class="ti ti-user"></i> </a>
                    <ul class="dropdown-menu">
                        <li><a href="/dashboard"><i class="ti-bar-chart m-r-5"></i> Dashboard</a></li>
                        <li><a href="/logout"><i class="ti-power-off m-r-5"></i> Se déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@elseif($authenticatedUser)
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php $username = Route::current()->parameters()['username']; ?>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('blog', $username) }}">Accueil</a></li>
                    <li><a href="{{ route('blog-articles', $username) }}">Articles</a></li>
                    <li><a href="{{ route('contact', $username) }}">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">{{ $authenticatedUser->username }} <i style="padding-left: 5px;" class="ti ti-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('dashboard', $authenticatedUser->username) }}"><i class="ti-bar-chart m-r-5"></i> Dashboard</a></li>
                            <li><a href="{{ route('blog', $authenticatedUser->username) }}"><i class="ti-layout m-r-5"></i> Blog</a></li>
                            <li><a href="{{ route('profile', $authenticatedUser->username) }}"><i class="ti-settings m-r-5"></i> Paramètres</a></li>
                            <li><a href="/logout"><i class="ti-power-off m-r-5"></i> Se déconnecter</a>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@else
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <?php $username = Route::current()->parameters()['username']; ?>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('blog', $username) }}">Accueil</a></li>
                <li><a href="{{ route('blog-articles', $username) }}">Articles</a></li>
                <li><a href="{{ route('contact', $username) }}">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="/login">Se Connecter</a></li>--}}
                {{--<li><a href="/register">S'inscrire</a></li>--}}
            </ul>
        </div>
    </div>
@endif
