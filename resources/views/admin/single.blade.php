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
            <h1><b>{{ $article->title }} </b></h1>
            <p>{!! $article->content !!}</p>

            <br><br>
            <div class="row">
                <b>Tags:
                    @for ($i = 0; $i < count($tags); $i++)
                        <mark>#{{$tags[$i]->name}}</mark>@if($i != count($tags)-1), @endif
                    @endfor
                    <div class="pull-right" style="display: inline">Catégorie:  <a href="">{{ $article->category->name }}</a></div>
                </b>
            </div>
        </div>
    </div>

@endsection
