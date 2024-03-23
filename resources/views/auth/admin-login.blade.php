@extends('auth.app')
@section('page_title', 'Login')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <div class="d-flex justify-content-center">
                <div class="logo-image">
                    <img src="{{asset('auth/assets/images/Asset 1.png')}}" alt="" class="">
                </div>
            </div>
            <h1 class="main-heading text-center mt-4">
                Admin Login
            </h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 col-md-9 mx-auto">
            <form action="{{route('admin.login.store')}}" method="POST">
                @csrf
                <div class="mb-3 lube-input">
                    <label for="exampleFormControlInput1" class="form-label">Enter Email Addresss</label>
                    <input type="email"  name="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">
                    <img src="{{asset('auth/assets/images/email.svg')}}" alt="">
                </div>
                <div class="mb-2 lube-input">
                    <label for="id_password" class="form-label">Enter Password</label>
                    <input type="password" name="password" class="form-control" id="id_password"  placeholder="*******">
                    <i class="far fa-eye" id="togglePassword"></i>
                    <img src="{{asset('auth/assets/images/password.svg')}}" alt="">
                </div>
{{--                <div class="mb-3">--}}
{{--                    <p class="text text-end">--}}
{{--                        <a href="{{route('password.request')}}">Forgot Passsword?</a>--}}
{{--                    </p>--}}
{{--                </div>--}}

                <div class="mb-3 mt-4">
                    <!-- note: you can convert a tag to button tag anywhere with .main-btn class -->
                    <button type="submit" class="main-btn" >Submit</button>
{{--                    <p class="text mt-3">Don’t have an account? <a href="{{route('register')}}">Sign Up</a></p>--}}
                </div>
            </form>
        </div>
    </div>
@endsection
