<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>E-blog - Inscription</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Inscription</h3>
        </div>

        <div class="panel-body">

            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/register') }}">

                @if (session('alert'))
                    <div class="alert {{ session('class') }}">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <p>{!! session('message') !!}</p>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('hide_fields'))
                @else
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="username" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="list-unstyled">
                                <li><label class="radio-inline"><input name="type" type="radio" value="eleve">Elève</label></li>
                                <li><label class="radio-inline"><input name="type" type="radio" value="prof">Prof</label></li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="cne" required="" placeholder="CNE/CIN">
                        </div>
                    </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Mot de passe">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirmer le mot de passe">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">
                                S'inscrire
                            </button>
                        </div>
                    </div>
                @endif

            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <p>
                Vous êtes dèja inscris?<a href="/login" class="text-primary m-l-5"><b>Se Connecter</b></a>
            </p>
        </div>
    </div>

</div>

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/detect.js') }}"></script>
<script src="{{ asset('/js/fastclick.js') }}"></script>
<script src="{{ asset('/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('/js/waves.js') }}"></script>
<script src="{{ asset('/js/wow.min.js') }}"></script>
<script src="{{ asset('/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('/js/jquery.scrollTo.min.js') }}"></script>


<script src="{{ asset('/js/jquery.core.js') }}"></script>
<script src="{{ asset('/js/jquery.app.js') }}"></script>

</body>
</html>