<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog">
    <meta name="author" content="E-Blog">

    <link rel="shortcut icon" href="{{ asset('/images/favicon_1.ico"')}}">

    <title>E-Blog - Accueil</title>


    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/core.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/components.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/pages.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/responsive.css')}}" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('/js/modernizr.min.js') }}"></script>

</head>

<body>


<div class="fixed">

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar">
                <div class="text-center">
                    <a href="/" class="logo"></a>
                </div>
            </div>

            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <ul class="nav navbar-nav navbar-right pull-right">
                        @if ($authenticatedUser)
                            <li><a href="/dashboard"><i class="ti-bar-chart m-r-5"></i> Dashboard</a></li>
                            <li><a href="/logout"><i class="ti-power-off m-r-5"></i> Se déconnecter</a></li>
                        @else
                            <li><a href="/login"><i class="ti-user m-r-5"></i> Se connecter</a></li>
                            <li><a href="/register"><i class="ti-star m-r-5"></i> Créer un blog</a></li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>



<div class="content">
    <img width="100%" src="{{ asset('/images/bg.jpg') }}" alt="">
    <br><br>
    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-sm-6 col-lg-4">
                    <div class="card-box">
                        <div class="contact-card">
                            <a class="pull-left" href="#">
                                <img class="img-circle" src="{{ asset('uploads').'/'. $user->photo }}" alt="">
                            </a>
                            <div class="member-info">
                                <h4 class="m-t-0 m-b-5 header-title"><b>{{ $user->fullName }}</b></h4>
                                <p class="text-muted"><a href="{{ $user->blogUrl }}">{{ $user->blogUrl }}</a></p>
                                @if($user->about)
                                    <p class="text-dark"><small>{{ $user->about }}</small></p>
                                @else
                                    <p class="text-dark"><br></p>
                                @endif
                            </div>

                        </div>
                    </div>

                </div> <!-- end col -->
            @endforeach
        </div>

    </div> <!-- container -->
</div>

</div>



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('/js/jquery.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/js/detect.js')}}"></script>
<script src="{{ asset('/js/fastclick.js')}}"></script>
<script src="{{ asset('/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('/js/waves.js')}}"></script>
<script src="{{ asset('/js/wow.min.js')}}"></script>
<script src="{{ asset('/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('/js/jquery.scrollTo.min.js')}}"></script>

<script src="{{ asset('/js/jquery.core.js')}}"></script>
<script src="{{ asset('/js/jquery.app.js')}}"></script>
</body>
</html>