@extends('layouts.app')

@section('content')

<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">สมัครสมาชิก</h1>
                    <!-- <p class="lead">
                        Start creating the best possible user experience for you customers.
                    </p> -->
                </div>
                <div class="card">
                    <div class="card-header"></div>
                    <div class="text-center">
                        <img src="img/avatars/login.png" alt="Linda Miller" class="img-fluid rounded-circle" width="132" height="132" />
                    </div>
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
                                    <label for="role">role</label>
                                    <select id="role" name="role" class="form-control" id="role" onchange="rolechang();" required>
                                        <option selected>Choose...</option>
                                        <option value="admin">admin</option>
                                        <option value="sector">ฝ่าย</option>
                                        <option value="department">ส่วน</option>
                                        <option value="user">พนักงาน</option>
                                    </select>
                                </div>
                                <?php

                                ?>
                                <div class="mb-3 " id="department" style="display:none">
                                    <label for="department">depastment</label>
                                    <select id="department" name="department" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($department as $data)
                                        <option value="{{$data->id}}">{{$data->fname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 " id="sector" style="display:none">
                                    <label for="sector">sector</label>
                                    <select id="sector" name="sector" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($sector as $data)
                                        <option value="{{$data->id}}">{{$data->sname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-center mt-3">

                                    <button type="submit" class="btn btn-primary">
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
<script>
    (function() {
        $('#sector').hide();
        $('#department').hide();
    })();


    function rolechang() {
        var value = document.getElementById('role').value;
        if (value == 'sector') {
            $('#sector').show();
            $('#department').hide();
        } else if (value == 'admin') {
            $('#sector').hide();
            $('#department').hide();
        } else {
            $('#sector').hide();
            $('#department').show();
        }
    }
</script>


@endsection