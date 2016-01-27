<div class="col-md-4">

    <div class="card-box m-t-20">
        <div class="p-20">
            <img src="{{ asset('uploads').'/'.$user->photo }}" class="thumb-lg thumbnail" alt="profile-image">
            <h3><b>{{ $user->firstName . ' ' . $user->lastName }}</b>
                <small><p class="text-muted">{{ $user->username }}</p></small>
            </h3>
        </div>

        <div class="p-20">
            <div class="about-info-p">
                <strong>Email</strong>
                <br>
                <p class="text-muted">{{ $user->email }}</p>
                <hr>
                <strong>Status</strong>
                <br>

                @if($user->role == 'eleve')
                    <p class="text-muted">Elève</p>
                @endif

                @if($user->role == 'prof')
                    <p class="text-muted">Prof</p>
                @endif

                @if($user->role == 'eleve' && !empty($user->level))
                    <hr>
                    <p><span class="label label-inverse">{{ $user->level }}</span></p>
                @endif
                <hr>

                <ul class="social-links list-inline m-0">
                    <li>
                        <a href="{{ $user->facebook ? $user->facebook  : '#' }}" class="tooltips" data-original-title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $user->linkedin ? $user->linkedin  : '#' }}" class="tooltips" data-original-title="LinkedIn">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $user->email }}" class="tooltips" data-original-title="Message">
                            <i class="fa fa-envelope-o"></i>
                        </a>
                    </li>
                </ul>

                @if ($authenticatedUser && $authenticatedUser->username != auth()->user()->username)
                    <hr>
                    <p style="font-size:0.9em"><a data-toggle="modal" data-target="#modal" href="#"><span class="text-danger"><i class="fa fa-minus-circle"></i>  Signaler un abus</span></a></p>
                @endif
            </div>

        </div>
    </div>

    @if(!empty($user->about))
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Bio</b></h4>

            <div class="p-20">
                <p>{{ $user->about }}</p>
            </div>
        </div>
    @endif

    @if ($authenticatedUser && $authenticatedUser->username != auth()->user()->username)
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Signaler ce blog</h3>
                    </div>
                    <form action="{{ route('report', $user->blog['id']) }}" method="post">

                        <div class="modal-body">
                            <h4>Pourquoi voulez-vous signaler ce blog?</h4>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Note" name="note" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Annuler</button>

                            <input type="hidden" name="from" value="{{ $authenticatedUser->id }}" />

                            {!! csrf_field() !!}

                            <button type="submit" class="btn btn-danger">Signaler</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endif

</div>