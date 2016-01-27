@extends('layout')


@section('title', 'Articles')

@section('styles')
    <link href="{{ asset('/css/summernote.css')}}" rel="stylesheet" />
    <link href="{{ asset('/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/selectize.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <h3 class="portlet-title text-dark text-uppercase">Articles récents</h3>
                        <br>

                        @if(session('alert') && session('update'))
                            <hr>
                            <div class="alert alert-{{ session('class') }}">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                <p>{!! session('message') !!}</p>
                            </div>
                        @endif

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
                                        <tr id="tr{{ $article->id }}">
                                            <td>{{ $article->id }}</td>
                                            <td><a href="{{ route('article', [auth()->user()->username, $article->id]) }}">{{ $article->title }}</a></td>
                                            <td>{{ str_limit($article->description, 30) }}</td>
                                            <td>{{ $article->category->name }}</td>
                                            <td><span class="label label-info">{{ $article->created_at }}</span></td>
                                            <td><a href="#" @click="loadArticle({{ $article->id }})"><i class="ti-pencil"></i></a></td>
                                            <td>
                                                <a href="#" @click="delete({{ $article->id }})"><i class="ti-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-sm-12">

                <div class="card-box">
                    <form id="form" method="POST" action="@{{ action }}" @submit="onSubmit">

                        @if(session('alert') && session('create'))
                            <hr>
                            <div class="alert alert-{{ session('class') }}">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                <p>{!! session('message') !!}</p>
                            </div>
                        @endif

                        <input type="hidden" name="id" value="@{{ article.id }}" />
                        <h4 class="m-b-30 m-t-0 header-title"><b>@{{ title }}</b></h4>

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" class="form-control" name="title" placeholder="Titre" value="@{{ article.title }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="1">@{{ article.description }}</textarea>
                        </div>
                        <input type="hidden" id="content" name="content" value="" />
                        <div class="form-group">
                            <label>Catégorie</label>
                            <select class="form-control" name="category" v-model="category">
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach

                                @if($categories->count() == 0)
                                    <option value="0" selected>No category</option>
                                @endif
                            </select>
                        </div>
                        <div id="summernote"></div>
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" id="input-tags" name="tags">
                        </div>
                        <button type="submit" class="btn btn-default btn-md">@{{ submit }}</button>
                        <button class="btn btn-lg" v-show="annuler" onClick="history.go(0)">Annuler</button>
                    </form>
                </div>
            </div>
        </div>




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

        });

    </script>

    <script src="{{ asset('/js/vue.min.js')}}"></script>
    <script src="{{ asset('/js/main.js')}}"></script>
    <script src="{{ asset('/js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('/js/selectize.js')}}"></script>
    <script>
        var $select = $('#input-tags').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            preload: true,
            persist: true,
            createOnBlur: true,
            options: {!! $tags !!},
            create: true
        });
    </script>

@endsection
