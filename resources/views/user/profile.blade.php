@extends('layout')

@section('title', 'Profile')

@section('styles')
    <link type="text/css" href="{{ asset('/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
@endsection




@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Profil</h4><br>
            </div>
        </div>

        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('post_profile', auth()->user()->username) }}" method="post">
            {!! csrf_field() !!}

            <div class="card-box">

                @if(session('alert'))
                    <div class="alert alert-{{ session('class') }}">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <p>{!! session('message') !!}</p>
                    </div>
                    <hr>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <h4>Information personnelles</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="{{ asset('uploads').'/'. auth()->user()->photo }}"  class="img thumbnail" width="150" alt="">
                            </div>
                            <div class="col-lg-10">

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Nom</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" name="lastName" value="{{ auth()->user()->lastName }}" placeholder="Nom" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Prénom</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" name="firstName" value="{{ auth()->user()->firstName }}" placeholder="Preénom" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Photo</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control" name="photo"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Sexe</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="gender" value="{{ auth()->user()->gender }}">
                                            <option value="M" {{ auth()->user()->gender == 'M' ? 'selected="selected"' : '' }}>
                                                M
                                            </option>
                                            <option value="F" {{ auth()->user()->gender == 'F' ? 'selected="selected"' : '' }}>
                                                F
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Date de naissance</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="date" name="birthdate" value="{{ auth()->user()->birthdate }}"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Bio</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" rows="3" name="about">{{ auth()->user()->about }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h4>Quand on signale mon blog</h4><hr>
                        <input type="checkbox" name="notify_message" value="1" checked disabled> Envoyer moi un message <br>
                        <input type="checkbox" {{ auth()->user()->notify_email ? 'checked="checked"' : '' }} name="notify_mail" value="1"> Envoyer moi un email
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2 col-md-offset-10">
                        <input class="form-control btn btn-primary" type="submit" value="Enregistrer">
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
