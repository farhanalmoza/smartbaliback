@extends('components.auth.template')
@section('title', 'Login')

@section('content')
<div class="col-md-4 mx-auto">
    <div class="card">
      <div class="card-body">
        <div class="card-title fw-bold text-uppercase text-center">Login</div>
        <div class="card-body pb-0">
          @error('auth')
            <span class="help-block text-danger">
              <small>{{ $message }}</small>  
            </span>
          @enderror
          <form action="{{ url('admin/login') }}" method="post">
            @csrf
            <div class="form-group">
              <div class="input-icon @error('email') has-error @enderror">
                <span class="input-icon-addon">
                  <i class="fa fa-envelope"></i>
                </span>
                <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}" placeholder="Email" autocomplete="email">
              </div>
              @error('email')
                <span class="help-block text-danger">
                  <small>{{ $message }}</small>  
                </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="input-icon @error('password') has-error @enderror">
                <span class="input-icon-addon">
                  <i class="fa fa-lock"></i>
                </span>
                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
              </div>
              @error('password')
                <span class="help-block text-danger">
                  <small>{{ $message }}</small>  
                </span>
              @enderror
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="form-check-sign" for="remember">Remember me</span>
              </label>
            </div>
            <div class="row">
              <button type="submit" class="btn btn-primary mx-auto">Sign in</button>
            </div>
            <div class="row mt-3">
              <h5 class="col-sm-12">Don't have an account? <a href="{{ route('register') }}" class="text-primary"> Signup now</a></h5>
              <h5 class="col-sm-12 mt--2"><a href="{{ route('password.request') }}" class="text-primary">Forgot password?</a></h5>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
