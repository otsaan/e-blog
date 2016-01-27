<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('/images/favicon_1.ico') }}">

    <title>E-blog - Login</title>

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

    <script src="{{ asset('/js/modernizr.min.js') }}"></script>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Connexion</h3>
        </div>

        <div class="panel-body">
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                @if (session('alert'))
                    <div class="alert alert-{{ session('class') }}">
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

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="email" required="" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Mot de passe">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" name="remember" type="checkbox">
                            <label for="checkbox-signup">
                                Garder ma session active
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Se Connecter</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ url('/password/reset') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Mot de passe oublié?</a>
                    </div>
                </div>

            </form>


        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>Vous n'êtes pas inscrit? <a href="/register" class="text-primary m-l-5"><b>S'inscrire</b></a></p>

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
<script src="{{ asset('/js/jquery.app.js') }}}"></script>

</body>
</html>