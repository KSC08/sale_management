@extends('layouts.app')

@section('content')

<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Get started</h1>
                    <p class="lead">
                        Start creating the best possible user experience for you customers.
                    </p>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <div class="m-sm-4">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label>{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Enter your name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label>{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label>{{ __('Password') }}</label>


                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label>{{ __('Confirm Password') }}</label>


                                    <input id="password-confirm" type="password" class="form-control form-control-lg" placeholder="Enter your confirm password" name="password_confirmation" required autocomplete="new-password">

                                </div>

                                <div class="mb-3 ">
                                    <label for="type">status</label>
                                    <select id="type" name="status" class="form-control">
                                        <option selected>Choose...</option>

                                        <option value="admin">admin</option>
                                        <option value="department">ฝ่าย</option>
                                        <option value="division">ส่วน</option>
                                        <option value="empolyee">พนักงาน</option>
                                    </select>
                                </div>

                                <div class="text-center mt-3">

                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('Register') }}
                                    </button>

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