@extends('auth.app')
@section('page_title', 'Register')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <div class="d-flex justify-content-center">
                <div class="logo-image">
                    <img src="{{asset('auth/assets/images/Asset 1.png')}}" alt="">
                </div>
            </div>
            <h1 class="main-heading text-center mt-4">
                Sign Up
            </h1>
            <p class="text text-center">
                Creating an account will help is efficiently prepare for your visit and build a service history for
                your vehicle
            </p>

        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 col-md-9 mx-auto">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-3 lube-input">
                    <label for="exampleFormControlInput1" class="form-label">Enter Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                           placeholder="Enter Name">
                    <img src="{{asset('auth/assets/images/email.svg')}}" alt="">
                </div>

                <div class="mb-3 lube-input">
                    <label for="exampleFormControlInput1" class="form-label">Enter Email Addresss</label>
                    <input type="email"name="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">
                    <img src="{{asset('auth/assets/images/email.svg')}}" alt="">
                </div>
                <div class="mb-3 lube-input">
                    <label for="id_password" class="form-label">Create Password</label>
                    <input type="password" name="password" class="form-control" id="id_password" placeholder="*******">
                    <i class="far fa-eye"  id="togglePassword"></i>
                    <img src="{{asset('auth/assets/images/password.svg')}}" alt="">
                </div>
                <div class="mb-3 lube-input">
                    <label for="id_password2" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="id_password2" placeholder="*******">
                    <i class="far fa-eye" id="togglePassword2"></i>
                    <img src="{{asset('auth/assets/images/password.svg')}}" alt="">
                </div>

                <div class="mb-3">
                    <div class="lube-input">
                        <label for="referral" class="form-label">Did an employee refer you to BookaLube?</label>
                    </div>
                    <div class="d-flex align-items-center mt-1 w-100">
                        <div class="form-check form-check-inline d-flex align-items-center ">
                            <input class="form-check-input me-1" style="height: 16px !important; width: 16px !important;" type="radio" id="yes" value="yes" name="referral" />
                            <label class="form-check-label text" for="yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline d-flex align-items-center ms-1">
                            <input class="form-check-input me-1" style="height: 16px !important; width: 16px !important;" type="radio" id="no" value="no" name="referral"  />
                            <label class="form-check-label text" for="no">No</label>
                        </div>
                    </div>
                </div>
                <div class="referral-fields">
                    <div class="mb-3 lube-input">
                        <label for="exampleFormControlInput1" class="form-label">Enter Employee Name</label>
                        <input type="text" name="employee_name" class="form-control" id="exampleFormControlInput1"
                               placeholder="Name">
                        <img src="{{asset('auth/assets/images/Group 38855.png')}}" alt="">
                    </div>
                    <p class="text my-3 pb-0"><b>or</b></p>
                    <div class="mb-3 lube-input">
                        <label for="exampleFormControlInput1" class="form-label">Enter Employee Number </label>
                        <input type="text" name="employee_number" class="form-control" id="exampleFormControlInput1"
                               placeholder="Number">
                        <img src="{{asset('auth/assets/images/phone.svg')}}" alt="">
                    </div>
                </div>
                <div class="mb-3 mt-4">
{{--                    <button type="button" class="main-btn" data-bs-toggle="modal"--}}
{{--                            data-bs-target="#registered">Submit</button>--}}
                    <button type="submit" class="main-btn" >Submit</button>
                    <p class="text mt-4">Have an account? <a href="{{route('login')}}">Sign In</a></p>
                </div>

            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var yesRadioButton = document.getElementById('yes');
        var noRadioButton = document.getElementById('no');
        var referralFields = document.querySelector('.referral-fields');

        function updateReferralFields() {
            referralFields.style.display = yesRadioButton.checked ? 'block' : 'none';
        }

        yesRadioButton.addEventListener('change', updateReferralFields);
        noRadioButton.addEventListener('change', updateReferralFields);

        // Initial check to set the initial state
        updateReferralFields();
    });
</script>
