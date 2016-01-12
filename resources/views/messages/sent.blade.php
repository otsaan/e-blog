@extends('layout')

@section('content')

    <div class="row">

        <!-- Left sidebar -->
        <div class="col-lg-3 col-md-4">

            <div class="p-20">
                <a href="{{ route('new_message', auth()->user()->username ) }}" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light">Nouveau Message</a>
                <div class="list-group mail-list  m-t-20">
                    <a href="{{ route('messages', auth()->user()->username ) }}" class="list-group-item b-0"><i class="fa fa-download m-r-10"></i>Boite de reception <b>{{ $unreadMessagesCount == 0 ? '' : '('.$unreadMessagesCount.')' }}</b></a>
                    <a href="{{ route('sent_messages', auth()->user()->username ) }}" class="list-group-item b-0 active"><i class="fa fa-paper-plane-o m-r-10"></i>Envoyés</a>
                </div>
            </div>

        </div>
        <!-- End Left sidebar -->

        <!-- Right Sidebar -->
        <div class="col-lg-9 col-md-8">
            <div class="panel panel-default m-t-20">
                <div class="panel-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mails m-0">
                            <tbody>
                            @if (!$sentMessages)
                                <tr class="read">
                                    <td></td>
                                    <td ><p>Aucun message</p></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @else

                                @foreach($sentMessages as $message)
                                    <tr class="{{ $message->read ? 'read' : 'unread' }}">
                                        <td class="mail-select" style="width: 20px">
                                            <div class="checkbox checkbox-primary m-r-15">
                                                <input id="checkbox1" type="checkbox">
                                                <label for="checkbox1"></label>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{ route('show_sent_messages', [auth()->user()->username, $message->id]) }}" class="email-name">{{ $message->to->username }}</a>
                                        </td>

                                        <td>
                                            <a href="{{ route('show_sent_messages', [auth()->user()->username, $message->id]) }}" class="email-msg">{{ str_limit($message->content, 50) }}</a>
                                        </td>
                                        <td class="text-right" style="width: 140px">
                                            {{ $message->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>

                </div> <!-- panel body -->
            </div> <!-- panel -->

            



        </div> <!-- end Col-9 -->

    </div><!-- End row -->

@endsection