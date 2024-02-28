@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="accordian-head">
                    <div class="form-number">
                        <span>2</span>/6
                    </div>
                    <h2 class="main-heading text-white text-center mb-0 pb-0">Home</h2>
                    <a href="" class="text-decoration-none " style="color: #39455F;">Back
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-10 mx-auto mt-3" >
                <div class="information-row mb-3 ">
                    <div class="edit"> <a href="home.html"><img src="assets/images/edit.svg" alt="" class="img-fluid"></a></div>
                    <p class=" mb-0 pb-0">Betsey</p>
                    <a href="booking.html" class="main-btn2 px-3" style="width: fit-content; ">BookaLube</a>
                </div>
                <div class="information-row mb-3">
                    <div class="edit"> <a href="home.html"><img src="assets/images/edit.svg" alt="" class="img-fluid"></a></div>
                    <p class=" mb-0 pb-0">Honda</p>
                    <div class="d-flex flex-md-row flex-column justify-content-end w-100">
                        <a href="upcoming-service.html" class="main-btn-blank px-3"
                           style="width: fit-content; ">Upcoming Service</a>
                        <a href="service-history.html" class="main-btn-blank px-3 mx-md-3"
                           style="width: fit-content; ">Service History</a>
                        <a href="booking.html" class="main-btn2 px-3" style="width: fit-content; ">BookaLube</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-10 mx-auto ">

                    <div class=" d-flex align-items-center py-5 justify-content-center mx-auto flex-md-row flex-column button-div ">

                        <a href="step1.html" class="main-btn-blank" >
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L13.2929 17.7071C13.6834 18.0976 14.3166 18.0976 14.7071 17.7071C15.0976 17.3166 15.0976 16.6834 14.7071 16.2929L10.4142 12L14.7071 7.70711C15.0976 7.31658 15.0976 6.68342 14.7071 6.29289C14.3166 5.90237 13.6834 5.90237 13.2929 6.29289L8.29289 11.2929Z" />
                            </svg>

                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
