@extends('layout.mainadmin')

@section('title','Admin|Forgot Password')
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
                        <h4>Forgot Password</h4>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-lg-6">
                            <img src="{{ asset('admin/assets/img/login-img.png')}}" alt="logo">
                        </div>
                        <div class="col-6 col-sm-6 col-lg-6">
                            @include('layout.errormessage')
                            <div class="card-body forgot-sec">
                                <form method="POST" action="{{ route('admin.resetpasswordemail') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email">Email</label><br>
                                        <p class="text-muted">We will send a link to reset your password</p>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                            required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Forgot Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="login-foot"></div-->
                <div class="simple-footer">
                    NxtonTv © Copyright {{ now()->year }} All rights reserved | Developed by <a
                href="https://www.arianus.in">@lang('messages.footer')</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
