@extends('admin.layout')


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
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Liste des étudiants</b></h4>

                    <table data-toggle="table"
                           data-search="true"
                           data-show-refresh="true"
                           data-show-toggle="true"
                           data-show-columns="true"
                           data-sort-name="id"
                           data-page-list="[5, 10, 20]"
                           data-page-size="5"
                           data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">#</th>
                            <th data-field="student" data-sortable="true" data-formatter="dateFormatter">Etudiant</th>
                            <th data-field="blog-link" data-align="center" data-sortable="true" data-sorter="priceSorter">Lien Blog</th>
                            <th data-field="creation-date" data-align="center" data-sortable="true" data-formatter="dateFormatter">Date Création</th>
                            <th data-field="articles" data-align="center" data-sortable="true" data-formatter="statusFormatter">Articles</th>
                            <th data-field="active" data-align="center" data-sortable="true" data-formatter="statusFormatter">Statut</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->firstName . ' ' . $user->lastName  }}</td>
                                <td><a href="{{route('blog', $user->username)}}">{{route('blog', $user->username)}}</a></td>
                                <td>{{ $user->blog['created_at']}}</td>
                                <td><a href="{{route('articles-blog', [auth()->user()->username, $user->blog['id']]) }}"><i class="ti-arrow-circle-right"></i></a></td>
                                <td><mark>{{ $user->blog['status'] }}</mark></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- end row -->
    </div> <!-- container -->
@endsection


@section('scripts')
    <script src="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('/pages/jquery.bs-table.js') }}"></script>
@endsection