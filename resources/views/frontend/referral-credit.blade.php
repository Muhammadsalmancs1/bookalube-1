@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 mx-auto d-flex align-items-center">
                <a href="{{route('dashboard')}}" class="main-btn-blank py-4 me-2 px-3" style="width: fit-content !important;"><svg
                        class="me-2" width="25" height="25" viewBox="0 0 25 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M8.79289 11.7929C8.40237 12.1834 8.40237 12.8166 8.79289 13.2071L13.7929 18.2071C14.1834 18.5976 14.8166 18.5976 15.2071 18.2071C15.5976 17.8166 15.5976 17.1834 15.2071 16.7929L10.9142 12.5L15.2071 8.20711C15.5976 7.81658 15.5976 7.18342 15.2071 6.79289C14.8166 6.40237 14.1834 6.40237 13.7929 6.79289L8.79289 11.7929Z" />
                    </svg>
                    Home</a>

            </div>
            <div class="col-xl-9 col-lg-12 col-md-10 mx-auto mt-3 mb-4 ">

                <div class="row">
                    <div class="col-lg-4 border-rr">
                        <div class="settings-heading">Settings</div>
                        <p class="text-start text">Update and manage your account</p>
                        <ul class="settings-nav">
                            <li >
                                <a href="{{route('setting')}}">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" class="me-2"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4 2.01941C2.89543 2.01941 2 2.91484 2 4.01941V20.0194C2 21.124 2.89543 22.0194 4 22.0194H20C21.1046 22.0194 22 21.124 22 20.0194V4.01941C22 2.91484 21.1046 2.01941 20 2.01941H4ZM15 9.01941C15 10.6769 13.6575 12.0194 12 12.0194C10.3425 12.0194 9 10.6769 9 9.01941C9 7.36191 10.3425 6.01941 12 6.01941C13.6575 6.01941 15 7.36191 15 9.01941ZM6 16.6861C6 14.9127 9.9975 14.0194 12 14.0194C14.0025 14.0194 18 14.9127 18 16.6861V18.0194H6V16.6861Z" />
                                    </svg>
                                    Profile
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('password')}}">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" class="me-2"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 8.01941H17V6.01941C17 3.25941 14.76 1.01941 12 1.01941C9.24 1.01941 7 3.25941 7 6.01941V8.01941H6C4.9 8.01941 4 8.91941 4 10.0194V20.0194C4 21.1194 4.9 22.0194 6 22.0194H18C19.1 22.0194 20 21.1194 20 20.0194V10.0194C20 8.91941 19.1 8.01941 18 8.01941ZM12 17.0194C10.9 17.0194 10 16.1194 10 15.0194C10 13.9194 10.9 13.0194 12 13.0194C13.1 13.0194 14 13.9194 14 15.0194C14 16.1194 13.1 17.0194 12 17.0194ZM15.1 8.01941H8.9V6.01941C8.9 4.30941 10.29 2.91941 12 2.91941C13.71 2.91941 15.1 4.30941 15.1 6.01941V8.01941Z" />
                                    </svg>
                                    Change Password
                                </a>
                            </li>
                            <li class="active-settings-nav">
                                <a href="{{route('referral.credit')}}">

                                    <svg width="24" height="25" class="me-2" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M18.8167 5.88061L18.9146 5.969L21.6955 8.81121L21.782 8.91129C22.0727 9.29337 22.0727 9.83163 21.782 10.2137L21.6955 10.3138L21.5976 10.4022C21.2237 10.6993 20.6971 10.6993 20.3233 10.4022L20.2253 10.3138L19.2573 9.32344C19.1427 10.5393 18.7754 11.7035 18.1826 12.7508C16.7065 15.3588 13.9822 17 10.9793 17C8.39152 17 5.99809 15.7828 4.43183 13.7415C4.07753 13.2798 4.15656 12.612 4.60833 12.2498C5.06012 11.8877 5.71358 11.9684 6.06787 12.4302C7.24411 13.9632 9.03706 14.875 10.9793 14.875C13.2325 14.875 15.2748 13.6446 16.3829 11.6869C16.8053 10.9405 17.0747 10.1159 17.1738 9.25225L16.1337 10.3138L16.0358 10.4022C15.6279 10.7263 15.0382 10.6968 14.6635 10.3138C14.2888 9.93076 14.26 9.32811 14.5771 8.91129L14.6635 8.81121L17.4444 5.969L17.5424 5.88061C17.9161 5.58352 18.4428 5.58352 18.8167 5.88061ZM11.0714 0C13.6592 0 16.0526 1.2172 17.6189 3.25844C17.9732 3.72018 17.8941 4.38806 17.4424 4.75017C16.9906 5.11229 16.3372 5.03152 15.9829 4.56978C14.8066 3.03684 13.0136 2.125 11.0714 2.125C8.81827 2.125 6.77598 3.35537 5.66785 5.31318C5.40439 5.77867 5.20045 6.27462 5.0602 6.7915L5.86626 5.969L5.96419 5.88061C6.37201 5.55652 6.96168 5.58599 7.33643 5.969C7.71118 6.35201 7.74001 6.9547 7.42291 7.37152L7.33643 7.47161L4.55554 10.3138L4.45761 10.4022C4.08378 10.6993 3.55713 10.6993 3.1833 10.4022L3.08537 10.3138L0.304477 7.47161L0.217996 7.37152C-0.0726654 6.98944 -0.0726654 6.45118 0.217996 6.0691L0.304477 5.969L0.402419 5.88061C0.776251 5.58352 1.30289 5.58352 1.67672 5.88061L1.77465 5.969L2.86921 7.08815C3.03335 6.08538 3.37168 5.12625 3.86815 4.24911C5.34423 1.64123 8.06848 0 11.0714 0Z"
                                        />
                                    </svg>
                                    Referral Credit
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 mt-lg-0 mt-4">
                        <form action="{{route('update.referral.credit')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="lube-input">
                                    <label for="referral" class="form-label">Referral Credit for Employee</label>
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

                            <div class=" mt-lg-5 mt-3">
                                <!-- note: you can convert a tag to button tag anywhere with .main-btn class -->
                                <button type="submit" class="main-btn px-5" style="width: fit-content;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
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
@endsection
