@extends('components.auth.template')
@section('title', 'Register')

@section('content')
<div class="col-md-4 mx-auto">
    <div class="card">
      <div class="card-body">
        <div class="card-title fw-bold text-uppercase text-center">Sign up</div>
        <div class="card-body pb-0">
          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
              <div class="input-icon @error('name') has-error @enderror">
                <span class="input-icon-addon">
                  <i class="fa fa-user"></i>
                </span>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Full name" autofocus>
              </div>
              @error('name')
                <span class="help-block text-danger">
                  <small>{{ $message }}</small>  
                </span>
              @enderror
            </div>
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
            <div class="form-group">
              <div class="input-icon">
                <span class="input-icon-addon">
                  <i class="fa fa-lock"></i>
                </span>
                <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation">
              </div>
            </div>
            <div class="row">
              <button type="submit" class="btn btn-default mx-auto">Sign up</button>
            </div>
            <div class="row mt-3">
              <h5 class="col-sm-12">Already have an account? <a href="{{ route('login') }}" class="text-primary"> Login</a></h5>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
