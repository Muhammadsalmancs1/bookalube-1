@extends('auth.app')
@section('page_title', 'Forget Password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Click Link to Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                            <a href="{{$token}}"  class="btn btn-link p-0 m-0 align-baseline">{{ __('click here') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
