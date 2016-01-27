<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog">
    <meta name="author" content="E-Blog">

    <link rel="shortcut icon" href="{{ asset('/images/favicon_1.ico"')}}">

    <title>E-Blog - Articles</title>


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


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="bg-picture text-center">
                    </div>
                </div>
                <div class="col-sm-8"></div>
            </div>

            <div class="row">

                @include('partials.blog-sidebar')

                <div class="col-lg-8 m-t-20">
                    <div class="card-box">
                        <div class="p-20">
                            @if(count($articles))
                                <h3 class="m-t-0 header-title"><b>Articles</b></h3><hr>
                                @foreach($articles as $article)

                                    <h3>
                                        <a href="{{ route('article', [$user->username, $article->id]) }}" class="text-inverse">{{ $article->title }}</a>
                                        <small>dans <a href="#" class="text-default">{{ $article->category->name }}</a></small>
                                    </h3>

                                    @if(empty($article->description))
                                        <div style="font-size:0.8em" class="text-muted">{{ $article->created_at->diffForHumans() }}</div>
                                    @else
                                        <blockquote><p style="font-size:0.85em" class="text-muted">{{ $article->description }}</p></blockquote>
                                        <div style="font-size:0.8em" class="text-muted">{{ $article->created_at->diffForHumans() }}</div>
                                    @endif


                                    <br>
                                @endforeach

                            @else
                                <h3>Aucun article publié.</h3>
                            @endif

                        </div>
                    </div>
                    {{--@endforeach--}}

                </div> <!-- container -->

            </div>

        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/js/bootstrap.js')}}"></script>
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
