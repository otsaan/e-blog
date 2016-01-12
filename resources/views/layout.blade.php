<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog">
    <meta name="author" content="E-Blog">

    <link rel="shortcut icon" href="{{ asset('/images/favicon_1.ico"')}}">

    <title>E-Blog - @yield('title')</title>

    @yield('top-styles')

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

        <!-- LOGO -->
        <div class="topbar-left topbar-left-sm">
            <div class="text-center">
                <a href="/" class="logo"><span class="icon-plus icon-c-logo">E-B</span><span>BL<i
                                class="md md-album"></i>G</span></a>
            </div>
        </div>

        @include('partials.navbar')
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('partials.sidebar')
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            @yield('content')

        </div>

        <footer class="footer text-right">
            2015 © E-Blog.
        </footer>
    </div>

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


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

@yield('middle-scripts')

<script src="{{ asset('/js/jquery.core.js')}}"></script>
<script src="{{ asset('/js/jquery.app.js')}}"></script>

@yield('scripts')


</body>
</html>
