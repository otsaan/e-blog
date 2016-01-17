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
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-picture text-center">
                        <div class="bg-picture-overlay"></div>
                        <div class="profile-info-name">
                            <img src="{{asset('/images/users/avatar-1.jpg')}}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                            <h4 class="m-b-5"><b>{{ $user->username }}</b></h4>
                            <p class="text-muted"><i class="fa fa-user"></i> {{ $user->firstName . ' ' . $user->lastName }}</p>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">

                    <div class="card-box m-t-20">
                        <h4 class="m-t-0 header-title"><b>Contact</b></h4>
                        {{--<div class="p-20">--}}
                            {{--<div class="bg-picture text-center">--}}
                            {{--<div class="profile-info-name">--}}
                            {{--<img src="{{ asset('/images/users/avatar-1.jpg') }}" class="thumb-lg img-circle" alt="profile-image">--}}
                            {{--<h4 class="m-b-5"><b>{{ $user->username }}</b></h4>--}}
                            {{--<p class="text-muted"> {{ $user->firstName . ' ' . $user->lastName }}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="p-20">
                            <div class="about-info-p">
                            <strong>Nom</strong>
                            <br>
                            <p class="text-muted">{{ $user->firstName . ' ' . $user->lastName }}</p>
                            </div>
                            <div class="about-info-p">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">(+212) 661 23 12 34</p>
                            </div>
                            <div class="about-info-p">
                                <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="about-info-p m-b-0">
                                <ul class="social-links list-inline m-0">
                                    <li>
                                        <a href="{{ $user->facebook ? $user->facebook  : '#' }}" class="tooltips" data-original-title="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $user->twitter ? $user->twitter  : '#' }}" class="tooltips" data-original-title="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $user->linkedin ? $user->linkdein  : '#' }}" class="tooltips" data-original-title="LinkedIn">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:{{ $user->email }}" class="tooltips" data-original-title="Message">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Bio</b></h4>

                        <div class="p-20">
                            <p>{{ $user->about }}</p>
                        </div>
                    </div>

                </div>


                <div class="col-md-8">

                    <div class="card-box m-t-20">
                        <h4 class="m-t-0 header-title"><b>Contactez moi</b></h4>
                        <br>
                        <form action="{{ route('mail_me') }}" method="post">

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
