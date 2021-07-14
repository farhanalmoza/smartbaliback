@extends('components.auth.template')
@section('title', 'Verify Email')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card mt-5">
      <div class="card-header pb-0">
        <h4 class="card-title text-center mb-3">Verify Your Email Address</h4>
      </div>
      <div class="card-body px-5">
        @if (session('resent'))
          <div class="card card-dark bg-primary-gradient mb-3">
            <div class="h5 fw-bold mb-0 text-center py-3">A fresh verification link has been sent to your email address.</div>
          </div>
        @endif
    
        Before proceeding, please check your email for a verification link.
        If you did not receive the email
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form>
      </div>
    </div>
</div>
@endsection
