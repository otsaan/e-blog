@extends('layout')


@section('title', 'Admin')

@section('styles')
    <link href="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Tableau de bord d'administration</h4> <br>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-info">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>{{ \App\User::count() }}</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Etudiants</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-custom">
                                    <i class="ti-id-badge"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>{{ \App\Blog::count() }}</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Blogs</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-danger">
                                    <i class="ti-menu"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>{{ \App\Article::count() }}</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Articles</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- end row -->


        <!--Basic Toolbar-->
        <!--===================================================-->
        {{--<div class="row">--}}
            {{--<div class="col-sm-12">--}}
                {{--<div class="card-box">--}}
                    {{----}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        <!-- end row -->
    </div> <!-- container -->
@endsection


@section('scripts')
    <script src="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('/pages/jquery.bs-table.js') }}"></script>
@endsection