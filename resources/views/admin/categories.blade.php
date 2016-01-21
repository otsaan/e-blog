@extends('admin.layout')


@section('title', 'Admin')

@section('styles')
    <link href="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/jquery-datatables-editable/datatables.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')


    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Catégories</h4> <br>
            </div>
        </div>


        <div class="panel" id="cats">

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <button id="addToTable" class="btn btn-default waves-effect waves-light">Ajouter <i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <table class="table table-striped table-bordered" id="datatable-editable">
                    <thead>
                    <tr>
                        <th class="col-sm-6">Nom</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr id="tr{{$category->id}}">
                            <td class="col-sm-4" data-id="{{$category->id}}">{{ $category->name }}</td>
                            <td class="actions col-sm-2">
                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end: page -->

    </div>

    </div> <!-- container -->
@endsection


@section('scripts')
    <script src="{{ asset('/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/plugins/jquery-datatables-editable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/pages/datatables.editable.init.js') }}"></script>
    <script src="{{ asset('/pages/jquery.bs-table.js') }}"></script>
@endsection