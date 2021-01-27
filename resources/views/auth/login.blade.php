@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Welcome to Sale-Management System</h1>
                    <p class="lead">
                        Sign in to your account to continue
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <div class="text-center">
                                <img src="img/avatars/login.png" alt="Linda Miller" class="img-fluid rounded-circle" width="132" height="132" />
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- 
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                </div> -->


                                <div class="mb-3">
                                    <label for="email">{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <!-- <div class="mb-3">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                    <small>
                                        <a href="pages-reset-password.html">Forgot password?</a>
                                    </small>
                                </div> -->

                                <div class="mb-3">
                                    <label>{{ __('Password') }}</label>


                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>


                                <!-- <div>
                                    <div class="form-check align-items-center">
                                        <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                        <label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
                                    </div>
                                </div> -->

                                <div class="mb-3">

                                    <div class="form-check align-items-center">
                                        <input class="form-check-input" type="checkbox" name="remember" id="customControlInline" value="remember-me" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-small" for="customControlInline">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                </div>



                                <!-- <div class="text-center mt-3">
                                    <a href="dashboard-default.html" class="btn btn-lg btn-primary">Sign in</a>
                                     <button type="submit" class="btn btn-lg btn-primary">Sign in</button> 
                                </div> -->

                                
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            {{ __('Sign in') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                



                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection