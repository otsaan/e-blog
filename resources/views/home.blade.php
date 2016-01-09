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
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><i class="ti ti-more-alt"></i> </a>
                            <ul class="dropdown-menu">
                                <li><a href="/create"><i class="ti-star m-r-5"></i> Créer un blog</a></li>
                            </ul>
                        </li>
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
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <form role="form">
                    <div class="form-group contact-search m-b-30">
                        <input type="text" id="search" class="form-control" placeholder="Rechercher...">
                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                    </div> <!-- form-group -->
                </form>
            </div>
            <div class="col-sm-4">
                <a href="#custom-modal" class="btn btn-default btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add Contact</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-2.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->



            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-3.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->



            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-4.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->


            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-5.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->


            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-6.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->



            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-7.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->


            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-8.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->

            <div class="col-sm-6 col-lg-4">
                <div class="card-box">
                    <div class="contact-card">
                        <a class="pull-left" href="#">
                            <img class="img-circle" src="{{ asset('/images/users/avatar-9.jpg') }}" alt="">
                        </a>
                        <div class="member-info">
                            <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                            <p class="text-muted">Branch manager</p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                            <div class="contact-action">
                                <a href="#" class="btn btn-success btn-sm"><i class="md md-mode-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                            </div>
                        </div>

                        <ul class="social-links list-inline m-0">
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                            <li>
                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Message"><i class="fa fa-envelope-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div> <!-- end col -->

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