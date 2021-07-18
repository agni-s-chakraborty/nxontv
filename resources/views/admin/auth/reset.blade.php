@extends('layout.mainadmin')

@section('title','Admin|Reset Password')
@section('css')
@endsection
@section('content')
<section class="section">

    <div class="container">

        <div class="row">

            <div class="col-8 col-sm-8 col-lg-8 login-sec">
                <!-- <div class="logosec">
                <img src="{{ asset('admin/assets/img/login1.png')}}" alt="bacground">
              </div> -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Reset Password</h4>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-lg-6">
                            <img src="{{ asset('admin/assets/img/login-img.png')}}" alt="logo">
                        </div>
                        <div class="col-6 col-sm-6 col-lg-6">
                            @include('layout.errormessage')
                            <div class="card-body forgot-sec">
                                <form method="POST" action="{{ route('admin.passwordreset',$token) }}" id="reset_form" name="reset_form">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Confirm Password</label>
                                        </div>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                                    </div>
                                    <div class="form-group">
                                        <button id="kt_login_forgot_submit" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Reset Password
                                        </button>
                                        <button id="kt_login_forgot_cancel" class="btn btn-primary btn-lg btn-block submitbutton" tabindex="4">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="login-foot"></div-->
                <div class="simple-footer">
                    JPS © Copyright {{ now()->year }} All rights reserved | Developed by <a href="https://www.arianus.in">Arianus
                        TechnoCraft</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#kt_login_forgot_cancel').click(function(e) {
            e.preventDefault();
            window.location.href ="{{route('admin.login')}}";
        });

        $('#reset_form').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                },
                password_confirmation: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    equalTo: "#password"
                },
            },
            submitHandler: function(form) {
                if($("form").validate().checkForm()){
                    $(".submitbutton").attr("type","button");
                    $(".submitbutton").addClass("disabled");
                    form.submit();
                }
            }
        });

    });
</script>
@endsection
