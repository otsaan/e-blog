@extends('layout')


@section('title', 'Profile')

@section('styles')
        <!-- X-editable css -->
<link type="text/css" href="{{ asset('/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Profil</h4> <br>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <form class="form-horizontal" method="post">

                            {{ csrf_field() }}

                            <input name="id" type="hidden" value="{{ auth()->user()->id }}"/>

                            <div class="col-lg-8">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Informations personnelles</b></h4>
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
                                    <label class="col-sm-5 control-label">Sexe</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" name="sex" value="{{ auth()->user()->sex }}" placeholder="Nom" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Date de naissance</label>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="date" name="dob" value="{{ auth()->user()->dob }}"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Bio</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" rows="3" name="about">{{ auth()->user()->about }}</textarea>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label"></label>
                                            <div class="col-sm-7">
                                                <input class="form-control btn btn-primary" type="submit" value="Enregistrer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>




                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->


    @endsection


    @section('scripts')

            <!-- XEditable Plugin -->
    <script src=" {{ asset('/plugins/moment/moment.js')}}"></script>
    <script src=" {{ asset('/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>
    <script src=" {{ asset('/pages/jquery.xeditable.js')}}"></script>

@endsection