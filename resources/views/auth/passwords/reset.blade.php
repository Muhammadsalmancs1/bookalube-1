@extends('auth.app')
@section('page_title', 'Forget Password')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <div class="d-flex justify-content-center">
                <div class="logo-image">
                    <img src="{{asset('auth/assets/images/Asset 1.png')}}" alt="" class="">
                </div>
            </div>
            <h1 class="main-heading text-center mt-4">
                Forget Password
            </h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 col-md-9 mx-auto">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-6 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
