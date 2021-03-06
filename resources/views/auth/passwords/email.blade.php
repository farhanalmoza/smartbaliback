@extends('components.auth.template')
@section('title', 'Reset Password')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header pb-0">
            <h4 class="card-title text-center mb-3">{{ __('Reset Password') }}</h4>
        </div>

        <div class="card-body px-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert" data-background-color="dark">
                    <span data-notify="title" class="mb-0">{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
