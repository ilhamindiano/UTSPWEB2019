@extends("layouts.app")

@section('css')
    <link href="css/login.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Daftar</h5>
                <form class="form-signin" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-label-group">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name">Name</label>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-label-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>

                    <div class="form-label-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <label for="password">Password</label>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
    
                    <div class="form-label-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <label for="password-confirm">Confirm Password</label>
                    </div>

                  <button class="btn btn-lg btn-signin btn-block text-uppercase" type="submit">Daftar</button>

                  <hr class="my-4">
                  <p style="text-align:center">Already an User?</p>
                  <a href="{{ route('login') }}" class="btn btn-block btn-secondary text-uppercase">{{ __('Login here') }}</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection