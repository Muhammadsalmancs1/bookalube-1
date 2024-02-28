@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-2 page-info-div order-lg-1 order-2">
                <div class="page-info">
                  <p class="mb-0 pb-0">Vehicle</p>
                  <h3 class="mb-0 pb-0">Betsey</h3>
                </div>
              </div>
            <div class="col-lg-10 col-md-10 mx-auto order-lg-2 order-1">
                <div class="accordian-head">
                    <div class="form-number">
                        <span>5</span>/6
                    </div>
                    <h2 class="main-heading text-white text-center mb-0 pb-0">Book a Lube</h2>
                    <a href="home.html" class="text-decoration-none text-white">Home
                        <img src="assets/images/ar.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 mx-auto mt-lg-3 order-lg-3 order-3 ">
                <form action="" class="mt-3"  >

                    <div>
                    <div class="d-flex align-items-center check-div mb-3">
                        <p class="mb-0 pb-0">Engine Oil/Filter</p>
                        <div class="border mx-3"></div>
                        <div class="check--div">
                        <input type="checkbox" name="" id="" class="me-2 form-check-input">
                        <span class="mb-0 pb-0">
                            $25
                        </span>
                    </div>
                    </div>

                    <div class="d-flex align-items-center check-div mb-3">
                        <p class="mb-0 pb-0">Air Filter</p>
                        <div class="border mx-3"></div>
                        <div class="check--div">
                        <input type="checkbox" name="" id="" class="me-2 form-check-input">
                        <span class="mb-0 pb-0">
                            $10
                        </span>
                    </div>
                    </div>

                    <div class="d-flex align-items-center check-div mb-3">
                        <p class="mb-0 pb-0">Transmission Oil</p>
                        <div class="border mx-3"></div>
                        <div class="check--div">
                            <input type="checkbox" name="" id="" class="me-2 form-check-input">
                        <span class="mb-0 pb-0">
                            $2
                        </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center check-div mb-3">
                        <p class="mb-0 pb-0">Tire Rotation</p>
                        <div class="border mx-3"></div>
                        <div class="check--div">
                        <input type="checkbox" name="" id="" class="me-2 form-check-input">
                        <span class="mb-0 pb-0">
                            $25
                        </span>
                    </div>
                    </div>

                    <div class="d-flex align-items-center check-div mb-3">
                        <p class="mb-0 pb-0">Tire Charge over</p>
                        <div class="border mx-3"></div>
                        <div class="check--div">
                        <input type="checkbox" name="" id="" class="me-2 form-check-input">
                        <span class="mb-0 pb-0">
                            $25
                        </span>
                    </div>
                    </div>
                </div>

                    <div class=" d-flex align-items-center my-5 justify-content-center mx-auto flex-md-row flex-column button-div">
                        <div class="me-md-2 me-0  btn-div order-md-1 order-2">
                            <a href="step4.html" class="main-btn-blank">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L13.2929 17.7071C13.6834 18.0976 14.3166 18.0976 14.7071 17.7071C15.0976 17.3166 15.0976 16.6834 14.7071 16.2929L10.4142 12L14.7071 7.70711C15.0976 7.31658 15.0976 6.68342 14.7071 6.29289C14.3166 5.90237 13.6834 5.90237 13.2929 6.29289L8.29289 11.2929Z"
                                        />
                                </svg>

                                Back
                            </a>
                        </div>
                        <div class="btn-div order-md-2 order-1 mb-md-0 mb-3">
                            <a href="step6.html" class="main-btn2">Submit & Next</a>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
@endsection
