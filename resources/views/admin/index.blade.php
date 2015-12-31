@extends('admin.layout')


@section('title', 'Admin')

@section('styles')
    <link href="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Tableau de bord d'administration</h4> <br>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-info">
                                    <i class="ti-user"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>120</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Etudiants</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-custom">
                                    <i class="ti-id-badge"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>20</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Blogs</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-danger">
                                    <i class="ti-menu"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b>200</b></h4>
                                <p class="text-muted m-b-0 m-t-0">Articles</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- end row -->


        <!--Basic Toolbar-->
        <!--===================================================-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Liste des étudiants</b></h4>

                    <table data-toggle="table"
                           data-search="true"
                           data-show-refresh="true"
                           data-show-toggle="true"
                           data-show-columns="true"
                           data-sort-name="id"
                           data-page-list="[5, 10, 20]"
                           data-page-size="5"
                           data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                        <thead>
                        <tr>
                            <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">#</th>
                            <th data-field="student" data-sortable="true" data-formatter="dateFormatter">Etudiant</th>
                            <th data-field="blog-link" data-align="center" data-sortable="true" data-sorter="priceSorter">Lien Blog</th>
                            <th data-field="creation-date" data-align="center" data-sortable="true" data-formatter="dateFormatter">Date Création</th>
                            <th data-field="active" data-align="center" data-sortable="true" data-formatter="statusFormatter">Active</th>
                        </tr>
                        </thead>


                        <tbody>
                        <tr>
                            <td>19</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Inactif</td>
                        </tr>

                        <tr>
                            <td>11</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>12</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Inactif</td>
                        </tr>

                        <tr>
                            <td>13</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Inactif</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Inactif</td>
                        </tr>

                        <tr>
                            <td>15</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>16</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>17</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Inactif</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Inactif</td>
                        </tr>

                        <tr>
                            <td>19</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>11</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>13</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>

                        <tr>
                            <td>14</td>
                            <td>Anwar ZIANI</td>
                            <td><a href="http://zianwar.localhost">zianwar.localhost</a></td>
                            <td>01/12/2015</td>
                            <td>Active</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- end row -->
    </div> <!-- container -->
@endsection


@section('scripts')
    <script src="{{ asset('/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('/pages/jquery.bs-table.js') }}"></script>
@endsection