@extends('layout.mainadmin')

@section('title','Login')
@section('css')
@endsection
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-8 col-sm-8 col-lg-8 login-sec">
                <!--div class="logosec">
                <img src="{{ asset('admin/assets/img/login1.png')}}" alt="bacground">
              </div-->
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Working <strong>Sign In</strong> </h4>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-lg-6">
                            <img src="{{ asset('admin/assets/img/login-img.png')}}" alt="logo">
                        </div>
                        <div class="col-6 col-sm-6 col-lg-6">
                            @include('layout.errormessage')
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login.submit') }}" class="needs-validation" novalidate="" id="login_form">
                                  {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="id">User ID</label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" required>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                            tabindex="3" id="remember-me">
                                            <div class="float-right">
                                                <a href="{{ route('admin.forgotpassword') }}" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button id="kt_login_signin_submit" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"> Login </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="login-foot"></div-->
                <!-- <div class="simple-footer">
                    NxtonTv © Copyright {{ now()->year }} All rights reserved | Developed by <a
                href="https://www.arianus.in">@lang('messages.footer')</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#login_form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                },
            },
            submitHandler: function (form) {
                if ($("#login_form").validate().checkForm()) {
                    $('#kt_login_signin_submit').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                    $(".cancelbutton").attr("type", "button");
                    $(".cancelbutton").addClass("disabled");
                    form.submit();
                }
            }
        });
    });
</script>
@endsection

