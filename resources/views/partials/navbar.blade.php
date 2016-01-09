<div class="navbar navbar-default" role="navigation">
    <div class="container">
        @if ($authenticatedUser && $authenticatedUser->role == 'admin')
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
        @elseif($authenticatedUser)
            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">{{ $authenticatedUser->username }} <i style="padding-left: 5px;" class="ti ti-user"></i> </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile', $authenticatedUser->username) }}"><i class="ti-settings m-r-5"></i> Paramètres</a></li>
                        <li><a href="{{ route('blog', $authenticatedUser->username) }}"><i class="ti-layout m-r-5"></i> Blog</a></li>
                        <li><a href="/logout"><i class="ti-power-off m-r-5"></i> Se déconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/login">Se Connecter</a></li>
                <li><a href="/register">S'inscrire</a></li>
            </ul>
        @endif
    </div>
</div>