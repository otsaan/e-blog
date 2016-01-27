<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog">
    <meta name="author" content="E-Blog">

    <link rel="shortcut icon" href="{{ asset('/images/favicon_1.ico"')}}">

    <title>E-Blog - {{ $user->firstName . ' ' . $user->lastName }}</title>


    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/core.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/components.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/pages.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/responsive.css')}}" rel="stylesheet" type="text/css"/>

    @yield('styles')

            <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('/js/modernizr.min.js') }}"></script>

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Button mobile view to collapse sidebar menu -->
        @include('partials.blog-navbar')
    </div>
    <!-- Top Bar End -->

    <!-- Start content -->
    <div class="content">
        <div class="wraper container-fluid">
            <br><br><br><br>

            <div class="row">

                @include('partials.blog-sidebar')

                <div class="col-md-8">

                    <div class="card-box m-t-20">
                        <h4 class="m-t-0 header-title"><b>Contactez moi</b></h4>
                        <br>
                        <form action="" method="post">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="name" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse Email </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="subject">Sujet</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" rows="7" id="message" name="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Envoyer</button>
                        </form>
                    </div>

                </div>


            </div>

            <div class="row">

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

@yield('scripts')


</body>
</html>
