<div class="left side-menu side-menu-sm">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="/dashboard" class="waves-effect"><i class="ti-home"></i> <span> Accueil </span> </a>
                </li>
                <li>
                    <a href="{{route('articles', auth()->user()->username)}}" class="waves-effect"><i class="ti-pencil-alt"></i><span> Articles </span></a>
                </li>
                <li>
                    <a href="{{route('profile', auth()->user()->username)}}" class="waves-effect"><i class="ti-user"></i><span> Profil </span></a>
                </li>
                <li>
                    <a href="{{route('messages', auth()->user()->username)}}" class="waves-effect"><i class="ti-email"></i><span> Messages </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>