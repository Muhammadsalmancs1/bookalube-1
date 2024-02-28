@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4 ">
            <div class="col-lg-11 col-md-11 mx-auto">
                <div class="accordian-head">
                    <div class="form-number">
                        <span>6</span>/6
                    </div>
                    <h2 class="main-heading text-white text-center mb-0 pb-0">Purchase Summary</h2>
                    <a href="home.html" class="text-decoration-none text-white">Home
                        <img src="assets/images/ar.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-10 mx-auto  mt-lg-3 ">
                <div class="summary-card">
                    <div class="summary-card-heading">
                        Booking Information
                    </div>
                    <div class="summary-card-header my-3">
                        <p class="mb-0 pb-0">Vehicle Name</p>
                        <h2 class="mb-0 pb-0">Betsey</h2>
                    </div>
                    <div class="summary-card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 pb-0"><span>Date</span>5/12/2023</p>
                            <p class="mb-0 pb-0"><span>Time:</span>12:00 pm</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 pb-0">Engine Oil/Filter</p>
                            <p class="mb-0 pb-0">$25</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 pb-0">Tire Exchange</p>
                            <p class="mb-0 pb-0">$10</p>
                        </div>
                        <div class="border-new"></div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 pb-0">HST@13%</p>
                            <p class="mb-0 pb-0">$10</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center bg-gray-light">
                            <h4 class="mb-0 pb-0">Total</h4>
                            <h4 class="mb-0 pb-0">$45</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-10 mx-auto  mt-lg-3 mt-4 ">
                <div class="summary-card">
                    <div class="summary-card-heading">
                        Payment Information
                    </div>
                    <div class="summary-card-body mt-3">
                        <div class="mb-2 lube-input">
                            <label for="number" class="form-label">Card Number</label>
                            <input type="text" class="form-control ps-2" id="number" placeholder="5451215215202">
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="mb-2 lube-input">
                                <label for="number" class="form-label">MM/YY</label>
                                <input type="text" class="form-control ps-2" id="number" placeholder="05/23">
                            </div>
                            <div class="mb-2 lube-input ms-2">
                                <label for="number" class="form-label">CSV</label>
                                <input type="text" class="form-control ps-2" id="number" placeholder="133">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-start">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <p class="mb-0 pb-0 mt-3 text-start">Save card information for next payment</p>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-11">
                <div
                    class=" d-flex align-items-center my-5 justify-content-center mx-auto flex-md-row flex-column button-div">
                    <div class="me-md-2 me-0  btn-div order-md-1 order-2">
                        <a href="step5.html" class="main-btn-blank">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L13.2929 17.7071C13.6834 18.0976 14.3166 18.0976 14.7071 17.7071C15.0976 17.3166 15.0976 16.6834 14.7071 16.2929L10.4142 12L14.7071 7.70711C15.0976 7.31658 15.0976 6.68342 14.7071 6.29289C14.3166 5.90237 13.6834 5.90237 13.2929 6.29289L8.29289 11.2929Z" />
                            </svg>

                            Back
                        </a>
                    </div>
                    <div class="btn-div order-md-2 order-1 mb-md-0 mb-3">
                        <button type="button" class="main-btn2" data-bs-toggle="modal"
                                data-bs-target="#done">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="done" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered confirm-modal">
      <div class="modal-content">
        <div class="modal-body">
         <h1 class="main-heading text-center">Confirm Booking</h1>
         <div class="text texr-centerd f-16">
            You will only be billed once work is complete
              <br>  <br>

If more than 10 minutes late, your appointment will be cancelled and you will charged a
<b>$20 cancellation fee</b>.
         </div>
        </div>
     <div class="d-flex align-items-center justify-content-center  flex-md-row flex-column my-4">
        <button type="button" class="main-btn-blank order-md-1 order-2" data-bs-dismiss="modal" >Cancel</button>
        <a href="confirm.html"  class="main-btn2 ms-md-2 mb-md-0 mb-2 order-md-2 order-1" >OK</a>
     </div>
      </div>
    </div>
  </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
@endsection
