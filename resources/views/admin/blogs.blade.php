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
                           data-page-size="20"
                           data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">#</th>
                            <th data-field="student" data-sortable="true" data-formatter="dateFormatter">Etudiant</th>
                            <th data-field="blog-link" data-align="center" data-sortable="true" data-sorter="priceSorter">Lien Blog</th>
                            <th data-field="creation-date" data-align="center" data-sortable="true" data-formatter="dateFormatter">Date Création</th>
                            <th data-field="articles" data-align="center" data-sortable="true" data-formatter="statusFormatter">Articles</th>
                            <th data-field="active" data-align="center" data-sortable="true" data-formatter="statusFormatter">Action</th>
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
                                <td>
                                    @if($blog->status != 'active')
                                        <button data-toggle="modal" data-target="#activer{{$blog->id}}" class="btn btn-sm btn-primary waves-effect waves-light">
                                            Activer
                                        </button>
                                    @else
                                        <button data-toggle="modal" data-target="#modal{{$blog->id}}" class="btn btn-sm btn-danger waves-effect waves-light">
                                            Désactiver
                                        </button>
                                    @endif
                                </td>

                                <div class="modal fade" id="modal{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title">Désactivation</h3>
                                            </div>
                                            <form action="{{ route('activate', $blog->id) }}" method="post">

                                            <div class="modal-body">
                                                <h4>Voulez-vous vraiment désactiver ce blog?</h4>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Note" name="note" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn" data-dismiss="modal">Annuler</button>

                                                    {!! csrf_field() !!}
                                                    {{ method_field('put') }}

                                                    <button type="submit" class="btn btn-danger">Désactiver</button>

                                            </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>

                                <div class="modal fade" id="activer{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title">Activation</h3>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Voulez-vous vraiment activer ce blog?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('activate',$blog->id) }}" method="post">

                                                    <button type="button" class="btn" data-dismiss="modal">Annuler</button>

                                                    {!! csrf_field() !!}
                                                    {{ method_field('put') }}

                                                    <button type="submit" class="btn btn-primary">Activer</button>

                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
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