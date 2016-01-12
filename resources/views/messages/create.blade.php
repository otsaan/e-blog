@extends('layout')


@section('top-styles')
    <link href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/select2/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="row">

        <!-- Left sidebar -->
        <div class="col-lg-3 col-md-4">

            <div class="p-20">
                <a href="{{ route('new_message', auth()->user()->username ) }}" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light">Nouveau Message</a>
                <div class="list-group mail-list  m-t-20">
                    <a href="{{ route('messages', auth()->user()->username ) }}" class="list-group-item b-0"><i class="fa fa-download m-r-10"></i>Boite de reception <b>{{ $unreadMessagesCount == 0 ? '' : '('.$unreadMessagesCount.')' }}</b></a>
                    <a href="{{ route('sent_messages', auth()->user()->username ) }}" class="list-group-item b-0"><i class="fa fa-paper-plane-o m-r-10"></i>Envoyés</a>
                </div>
            </div>

        </div>
        <!-- End Left sidebar -->

        <!-- Right Sidebar -->
        <div class="col-lg-9 col-md-8">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box m-t-20">
                        <div class="p-20">
                            <form role="form" method="post" action="{{ route('post_message', auth()->user()->username) }}">
                                {!! csrf_field() !!}
                                <div class="form-group">

                                    <select name="emails[]" class="select2 select2-multiple" multiple="multiple" data-placeholder="À ..." multiple>
                                        @foreach($emails as $email)
                                            <option value="{{ $email['email'] }}">{{ $email['name'].' ' . '<'.$email['email'].'>' }} </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <textarea name="content" rows="10" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input name="sendEmail" id="sendEmail" type="checkbox">
                                        <label for="sendEmail">
                                            Envoyer un email
                                        </label>
                                    </div>
                                </div>

                                <div class="btn-toolbar form-group m-b-0">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> <span>Envoyer</span> <i class="fa fa-send m-l-10"></i> </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- End row -->


        </div> <!-- end Col-9 -->

    </div><!-- End row -->

@endsection

@section('middle-scripts')
    <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('plugins/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('plugins/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
@endsection

@section('scripts')

    <script>
        jQuery(document).ready(function() {

            //advance multiselect start
            $('#my_multi_select3').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                afterInit: function (ms) {
                    var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

            // Select2
            $(".select2").select2();

            $(".select2-limiting").select2({
                maximumSelectionLength: 2
            });

            $('.selectpicker').selectpicker();
            $(":file").filestyle({input: false});
        });

        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ion-plus-round',
            verticaldownclass: 'ion-minus-round'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }

        $("input[name='demo1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='demo2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='demo3']").TouchSpin();
        $("input[name='demo3_21']").TouchSpin({
            initval: 40
        });
        $("input[name='demo3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='demo5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        $("input[name='demo0']").TouchSpin({});


        //Bootstrap-MaxLength
        $('input#defaultconfig').maxlength()

        $('input#thresholdconfig').maxlength({
            threshold: 20
        });

        $('input#moreoptions').maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger"
        });

        $('input#alloptions').maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            separator: ' out of ',
            preText: 'You typed ',
            postText: ' chars available.',
            validate: true
        });

        $('textarea#textarea').maxlength({
            alwaysShow: true
        });

        $('input#placement') .maxlength({
            alwaysShow: true,
            placement: 'top-left'
        });
    </script>
@endsection