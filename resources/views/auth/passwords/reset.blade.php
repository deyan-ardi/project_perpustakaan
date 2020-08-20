@extends('layouts.app')
@section('title')
    Reset Password Admin
@endsection
@section('body')
    class="bg-gradient-primary"
@endsection
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Reset Your Password!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('password.update') }}">
                 @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                 <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                 <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Input Your New Password...">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Password...">
                </div>
                    <button type="submit" class="btn btn-primary  btn-user btn-block">
                         {{ __('Reset Password') }}
                    </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
