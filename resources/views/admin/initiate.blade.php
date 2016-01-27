@extends('layout')

@section('title', 'Initier la base de données')

@section('styles')
    <link href="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Importation des données</h4> <br>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('alert'))
                                <div class="alert alert-{{ session('class') }}">
                                    <a class="close" data-dismiss="alert" href="#">×</a>
                                    <p>{!! session('message') !!}</p>
                                </div>
                                <hr>
                            @endif
                            <form method="post" action="/admin/initiate" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <ul class="list-unstyled">
                                    <h3>Uploader le fichier CSV</h3>
                                    <hr>
                                    <div class="form-group">
                                        <li>
                                            <label class="radio-inline">
                                                <input name="type" value="eleve" checked="" type="radio"> <p style="display: inline">Elèves</p> <label class="label label-warning">CNE, EMAIL</label>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="radio-inline">
                                                <input name="type" value="prof" type="radio"> <p style="display: inline">Profs</p> <label class="label label-warning">CIN, EMAIL</label>
                                            </label>
                                        </li>
                                    </div>
                                </ul>
                                <div class="form-group">
                                    <input type="file" name="csv" class="filestyle" accept="text/csv" data-iconname="fa fa-cloud-upload" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Importer CSV">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if($users)
                    <div class="card-box">
                        <div class="row">
                            <h3>Utilisateurs autorisés</h3>
                            <hr>
                            <div class="col-md-12">

                                <table class="table table-striped m-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>EMAIL</th>
                                        <th>CNE</th>
                                        <th>CIN</th>
                                        <th>TYPE</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        @if($user->type == 'prof')
                                            <tr class="warning">
                                        @elseif($user->type == 'eleve')
                                            <tr class="active">
                                        @else
                                            <tr>
                                        @endif
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->cne ? $user->cne : 'null' }}</td>
                                            <td>{{ $user->cin ? $user->cin : 'null' }}</td>
                                            <td>{{ $user->type }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card-box">

                    <h3>Exemple de fichiers CSV</h3>
                    <hr>
                    <p>Elève</p>

<pre style="font-size:0.8em">
    cne,email
    123245,ahmed@gmail.com
    432345,yassine@gmail.com
    1232432,nawfal@yahoo.fr
</pre>

                    <hr>
                    <p>Prof</p>
<pre style="font-size:0.8em">
    cin,email
    AB221,mohammed@gmail.com
    4EF345,driss@gmail.com
    IF2432,hassan@yahoo.fr
</pre>
                </div>
            </div>
        </div>

        <!-- end row -->
    </div> <!-- container -->
@endsection

@section('scripts')

    <script src="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('/pages/jquery.bs-table.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>

    <script>

        jQuery(document).ready(function() {
            $(":file").filestyle({input: false});
        });

    </script>

@endsection