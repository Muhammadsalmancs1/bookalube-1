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
                Forget Password
            </h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 col-md-9 mx-auto">
            <form action="#" >
                <div class="mb-3 lube-input">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <p>{{$title}}</p>
                </div>
                <div class="mb-3 lube-input">
                    <label for="exampleFormControlInput1" class="form-label">Message</label>
                    <p>{{$message}}</p>
                </div>
            </form>
        </div>
    </div>
@endsection
