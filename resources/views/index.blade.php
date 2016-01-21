@extends('layout')


@section('title', 'Accueil')

@section('content')


    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Tableau de bord</h4>
                <p class="text-muted page-title-alt">Statistiques générales sur votre blog</p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-info">
                                    <i class="ti-write"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>{{ $articles->count() }}</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Articles</p>
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
                                <h4 class="m-t-0 m-b-5"><b>12</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Catégories</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td><a href="{{ route('article', [auth()->user()->username, $article->id]) }}">{{ $article->title }}</a></td>
                                            <td>{{ str_limit($article->description, 30) }}</td>
                                            <td><mark>{{ $article->category->name }}</mark></td>
                                            <td>{{ $article->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->


        </div>

    </div> <!-- container -->


@endsection

@section('scripts')
    <!-- Notifications -->
    <script src="{{ asset('/plugins/notifyjs/dist/notify.min.js') }}"></script>
    <script src="{{ asset('/plugins/notifications/notify-metro.js') }}"></script>
    <script>

        jQuery(document).ready(function(){

            if ('{{ session('notif') }}' === '1') {
                $.Notification.notify('{{ session('type') }}','{{ session('position') }}','{{ session('title') }}', '{{ session('body') }}')
            }

        });

    </script>
@endsection