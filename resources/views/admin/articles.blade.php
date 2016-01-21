@extends('layout')


@section('title', 'Admin')

@section('styles')
    <link href="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
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

        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Articles</b></h4>
            <div class="p-20">
                <div class="timeline-2">

                    @foreach($articles as $article)
                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">{{ $article->created_at->diffForHumans() }}</div>
                                <h3><a href="{{ route('article', [$article->blog['username'], $article->id]) }}" class="text-info">{{ $article->title }}</a> <small>dans <a href="#" class="text-success">{{ $article->category->name }}</a></small>
                                    {{--<a href="#" @click="delete({{ $article->id }})"><i class="ti-trash"></i></a>--}}
                                    <a href="#" data-toggle="modal" data-target="#modal{{$article->id}}"><i class="ti-trash"></i></a>
                                </h3>
                                <p><em>"{{ $article->description }}"</em></p>
                            </div>
                        </div>

                    {{--Modal--}}
                        <div class="modal fade" id="modal{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h3 class="modal-title">Suppression</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Voulez-vous vraiment supprimer cet article?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="/articles/{{$article->id}}" method="post">

                                            <button type="button" class="btn" data-dismiss="modal">Annuler</button>

                                            {!! csrf_field() !!}
                                            {{ method_field('delete') }}

                                            <button type="submit" class="btn btn-danger">Supprimer</button>

                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div> <!-- container -->

@endsection
