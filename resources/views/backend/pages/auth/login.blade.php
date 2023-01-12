@extends('backend.layouts.login_master')
@section('title') Login  @endsection
@section('custome_css')
@endsection
@section('content')
<div class="login-area ">
    <div class="container bg-secondary">
        <div class="login-box ptb--100 shadow-lg">


            <form action="{{ route('admin.login') }}" method="POST">
                @csrf

                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Admin Portal</p>
                </div>
                @if(Session::has('error'))

                <div class="alert alert-warning alert-dismissible text-center" role="alert">
                    <strong>{{ Session::get('error') }} !!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                @endif
                @if(Session::has('success'))

                <div class="alert alert-success alert-dismissible text-center" role="alert">
                    <strong>{{ Session::get('success') }} !!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                @endif
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
