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
                <h4 class="page-title">Blogs</h4> <br>
            </div>
        </div>





        <!--Basic Toolbar-->
        <!--===================================================-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Liste des blogs</b></h4>

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
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->username }}</td>
                                <td><a href="{{route('blog', $blog->username)}}">{{route('blog', $blog->username)}}</a></td>
                                <td>{{ $blog->created_at }}</td>
                                <td><a href="{{route('articles-blog', [auth()->user()->username, $blog->id]) }}"><i class="ti-arrow-circle-right"></i></a></td>
                                <td><mark>{{ $blog->status }}</mark></td>
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