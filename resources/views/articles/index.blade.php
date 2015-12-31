@extends('layout')


@section('title', 'Articles')

@section('content')


    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Articles</h4> <br>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-info">
                                    <i class="ti-write"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>8</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Articles</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-custom">
                                    <i class="ti-eye"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>19</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Vues</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-danger">
                                    <i class="ti-menu"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>12</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Catégories</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-danger">
                                    <i class="ti-files"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>20</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Fichiers</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->

        <div class="row">

            <div class="col-lg-12">

                <div class="portlet"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Articles récents
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet2" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Catégorie</th>
                                        <th>Publié</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tutoriel Java</td>
                                        <td>Commment créer une application Java avec la base de données...</td>
                                        <td>Programmation</td>
                                        <td><span class="label label-info">01/12/2015</span></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->


        </div>

        <!-- end row -->




    </div> <!-- container -->


@endsection
