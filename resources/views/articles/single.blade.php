<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog">
    <meta name="author" content="E-Blog">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{ asset('/images/favicon_1.ico"')}}">

    <title>E-Blog - {{ $article->title }}</title>


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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
                    <div class="card-box m-b-10">
                        <div class="table-box opport-box">
                            <div>
                                <h1><b>{{ $article->title }} </b></h1>
                                <p>{!! $article->content !!}</p>
                                <br>
                                @if ($authenticatedUser)
                                    <hr>
                                    <h2>
                                        <a href="#" @click="like">
                                            <i class="fa fa-heart-o" v-show="liked" style="color: red;"></i>
                                            <i class="fa fa-heart-o" v-show="!liked" style="color: black;"></i>
                                        </a> @{{ likeCount }} likes
                                    </h2>
                                @endif
                                <hr>
                                <h4>Partagez cet article avec vos amis:</h4>

                                <a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                <div class="fb-like" data-href="{{url()->current()}}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                                <br><br>
                                <div class="row">
                                    <b>Tags:
                                        @for ($i = 0; $i < count($tags); $i++)
                                            <mark>#{{$tags[$i]->name}}</mark>@if($i != count($tags)-1), @endif
                                        @endfor
                                        <div class="pull-right" style="display: inline">Catégorie:  <a href="">{{ $article->category->name }}</a></div>
                                    </b>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                </div>

            </div>

        </div>
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
<script src="{{ asset('/js/vue.min.js')}}"></script>
<script src="{{ asset('/js/vue-resource.min.js')}}"></script>
<script>
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
    new Vue({
        el: 'body',
        data: {
            likeCount: {!! $article->likeCount !!},
            liked: {!! $article->liked() !!} + ''
        },
    methods: {
            like: function() {
                if (this.liked) {
                    this.likeCount--;
                    this.liked = false;
                } else {
                    this.likeCount++;
                    this.liked = true;
                }

                this.$http.post('/like/'+ {!! $article->id !!}, {!! $article->id !!}).then(function(response) {
                    console.log(response.data);
                });
            }
        }
    });
</script>

@yield('scripts')


</body>
</html>
