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


        <div class="card-box">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('import_csv', 'admin') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label">Le fichier CSV doit contenir deux colonnes :</label>
                            <p>
                                <ul>
                                    <li>Email</li>
                                    <li>CNE</li>
                                </ul>
                            </p>
                            <input type="file" name="csv" class="filestyle" data-iconname="fa fa-cloud-upload">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Importer">
                        </div>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>

        @if($users)
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="m-t-0 header-title"><b>Liste des étudiants chargés</b></h4>
                        <hr>
                            <form action=""></form>
                        <hr>

                        <table data-toggle="table"
                               data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="true"
                               data-sort-name="id"
                               data-page-list="[5, 10, 20]"
                               data-page-size="10"
                               data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                            <thead>
                            <tr>
                                <th data-field="cne" data-sortable="true" data-formatter="dateFormatter">CNE</th>
                                <th data-field="email" data-sortable="true" data-formatter="dateFormatter">EMAIL</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user['cne'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

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