<div class="col-md-4">

    <div class="card-box m-t-20">
        <h4 class="m-t-0 header-title"><b>Contact</b></h4>
        <div class="p-20">
            <img src="{{ asset('/images/users/avatar-1.jpg') }}" class="thumb-lg img-circle" alt="profile-image">
            <h4 class="m-b-5"><b>{{ $user->username }}</b></h4>
            <p class="text-muted"> {{ $user->firstName . ' ' . $user->lastName }}</p>
        </div>
        <div class="p-20">
            <div class="about-info-p">
                <strong>Email</strong>
                <br>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            <div class="about-info-p m-b-0">
                <ul class="social-links list-inline m-0">
                    <li>
                        <a href="{{ $user->facebook ? $user->facebook  : '#' }}" class="tooltips" data-original-title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $user->twitter ? $user->twitter  : '#' }}" class="tooltips" data-original-title="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $user->linkedin ? $user->linkdein  : '#' }}" class="tooltips" data-original-title="LinkedIn">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:{{ $user->email }}" class="tooltips" data-original-title="Message">
                            <i class="fa fa-envelope-o"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card-box">
        <h4 class="m-t-0 header-title"><b>Bio</b></h4>

        <div class="p-20">
            <p>{{ $user->about }}</p>
        </div>
    </div>

    <br>
    @if ($authenticatedUser)
        <div class="text-center">
            <a href="#" data-toggle="modal" data-target="#modal" style="color: red"><i class="ti-flag-alt"> Signaler</i></a>
        </div>
        <br><br>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Signaler ce blog</h3>
                    </div>
                    <form action="{{ route('report', $user->blog->id) }}" method="post">

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