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
                    <a href="/documents" class="waves-effect"><i class="ti-files"></i><span> Documents </span></a>
                </li>
                <li>
                    <a href="/gallery" class="waves-effect"><i class="ti-gallery"></i> <span> Gallerie </span> </a>
                </li>
                <li>
                    <a href="/profil" class="waves-effect"><i class="ti-user"></i><span> Profil </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>