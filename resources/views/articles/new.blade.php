@extends('layout')


@section('title', 'Articles')

@section('styles')
    <link href="{{ asset('/css/summernote.css')}}" rel="stylesheet" />
@endsection

@section('content')


    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Articles</h4> <br>
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
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->category->name }}</td>
                                            <td><span class="label label-info">{{ $article->created_at }}</span></td>
                                            <td><a href="#"><i class="ti-pencil"></i></a></td>
                                            <td><a href="#"><i class="ti-close"></i></a></td>
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

        <!-- end row -->
        <div class="row">
            <div class="col-sm-12">

                <div class="card-box">
                    <form id="form" method="POST">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Nouvel Article</b></h4>

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Titre">
                        </div>
                        <input type="hidden" id="content" name="content" value="" />
                        <div class="form-group">
                            <select class="form-control">
                                <option>Catégorie</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div id="summernote"></div>
                        <button type="submit" class="btn btn-default btn-lg">Valider</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- End row -->



    </div> <!-- container -->
@endsection

@section('scripts')
    <script src="{{ asset('/js/summernote.min.js')}}"></script>

    <script>

        $(document).ready(function(){

            $('#summernote').summernote({
                height: 350,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });

            $('.inline-editor').summernote({
                airMode: true
            });

            $('#form').submit(function (e) {
                e.preventDefault();
                $('#content').val($('#summernote').summernote('code'));
                console.dir($('#content').val());
                $('form').unbind('submit').submit();
            });

        });

    </script>
@endsection
