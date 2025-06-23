<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title">Verify Your Email Address</h3>
                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">A fresh verification link has been sent to
                                your email address
                            </div>
                        @endif
                        <p>Before proceeding, please check your email for a verification link.<br>If you did not receive
                            the email, <a onclick="event.preventDefault(); document.getElementById('email-form').submit();">**{{ __('click here to request another') }}</a>.</p>
                        <form id="email-form" action="{{ route('verification.resend') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



