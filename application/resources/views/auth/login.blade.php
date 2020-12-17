@extends('layouts.login_layout')

@section('contents')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="account-card-box">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center">
                        <div class="my-3">
                            <a href="#">
                                <span><img src="{{asset($get_settings->logo)}}" style="width: 40%;"></span>
                            </a>
                        </div>
                        <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input id="email" type="email" placeholder="Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input id="password" type="password" placeholder="Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="" for="remember">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="padding-top: 0px;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-danger btn-block waves-effect waves-light" type="submit"> Log In </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <h5 class="text-muted py-2"><b>Sign in with</b></h5>

                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-facebook waves-effect font-14 waves-light mt-3">
                                    <i class="fab fa-facebook-f mr-1"></i> Facebook
                                </button>
                                <button type="button" class="btn btn-googleplus waves-effect font-14 waves-light mt-3">
                                    <i class="fab fa-google-plus-g mr-1"></i> Google+
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>

        {{-- <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="text-white-50">Don't have an account? <a href="pages-register.html" class="text-white ml-1"><b>Sign Up</b></a></p>
            </div>
        </div> --}}
        <!-- end row -->

    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection
