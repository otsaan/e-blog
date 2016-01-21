@extends('layout')

@section('content')

    <div class="row">

        <!-- Left sidebar -->
        <div class="col-lg-3 col-md-4">

            <div class="p-20">
                <a href="{{ route('new_message', auth()->user()->username ) }}" class="btn btn-danger btn-rounded btn-custom btn-block waves-effect waves-light">Nouveau Message</a>
                <div class="list-group mail-list  m-t-20">
                    <a href="{{ route('messages', auth()->user()->username ) }}" class="list-group-item b-0 active"><i class="fa fa-download m-r-10"></i>Boite de reception <b>{{ $unreadMessagesCount == 0 ? '' : '('.$unreadMessagesCount.')' }}</b></a>
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

                        <div class="media m-b-30 ">
                            <div class="media-body">
                                <span class="media-meta pull-right">{{ $message->created_at->diffForHumans() }}</span>
                                <h4 class="text-primary m-0">{{ $message->from->username }}</h4>
                                <small class="text-muted">Depuis: {{ $message->from->email }}</small>
                            </div>
                        </div>
                        <hr/>

                        <p>{{ $message->content }}</p>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <form method="post" action="{{ route('reply_message', [auth()->user()->username, $message->id] ) }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="to_user_id" value="{{ $message->from->id }}">
                        <div class="form-group">
                            <textarea name="content" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md m-b-30">Repondre</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        </div> <!-- end Col-9 -->

    </div><!-- End row -->

@endsection