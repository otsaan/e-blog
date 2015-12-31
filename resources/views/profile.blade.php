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
                <h4 class="page-title">Profile</h4> <br>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="m-b-30 m-t-0 header-title"><b>Information personnelles</b></h4>
                            <form action="#" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Nom</label>
                                    <div class="col-sm-7">
                                        <a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Nom">ZIANI</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Prénom</label>
                                    <div class="col-sm-7">
                                        <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-title="Prenom">Anwar</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Sexe</label>
                                    <div class="col-sm-7">
                                        <a href="#" id="inline-sex" data-type="select" data-pk="1" data-value="" data-title="Sexe"></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Date de naissance</label>
                                    <div class="col-sm-7">
                                        <a href="#" id="inline-dob" data-type="combodate" data-value="2015-09-24" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Date de naissance"></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Bio</label>
                                    <div class="col-sm-7">
                                        <a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Bio" data-title="Ecrire votre biographie">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet architecto, aut culpa debitis delectus deleniti iure libero molestiae odio optio perspiciatis provident quam qui sed, sequi similique suscipit, velit.</a>
                                    </div>
                                </div>



                            </form>
                        </div>
                        <div class="col-lg-4"></div>

                        <div class="pull-right">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Enregistrer">
                            </div>
                        </div>
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