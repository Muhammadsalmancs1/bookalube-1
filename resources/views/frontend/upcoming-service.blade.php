@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-10 col-md-12 mx-auto position-relative back-btn-row">
                <div class="back-btn">
                    <a href="{{route('dashboard')}}" class="main-btn-blank h-100 me-2 px-3 "
                       style="width: fit-content !important;">
                        <svg class="me-2"
                             width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.79289 11.7929C8.40237 12.1834 8.40237 12.8166 8.79289 13.2071L13.7929 18.2071C14.1834 18.5976 14.8166 18.5976 15.2071 18.2071C15.5976 17.8166 15.5976 17.1834 15.2071 16.7929L10.9142 12.5L15.2071 8.20711C15.5976 7.81658 15.5976 7.18342 15.2071 6.79289C14.8166 6.40237 14.1834 6.40237 13.7929 6.79289L8.79289 11.7929Z"
                            />
                        </svg>
                        Home
                    </a>
                </div>
                <div class="accordian-head justify-content-lg-center">

                    <h2 class="main-heading text-white text-center mb-0 pb-0">Upcoming Service</h2>
                    <a href="{{asset('dashboard')}}"
                       class="text-decoration-none text-white d-flex align-items-center back-sm">
                        Home <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="" class="ms-2">
                    </a>
                </div>
            </div>
            <div class="col-12   mx-auto mt-3 mb-4 ">
                <div class="row">
                    <div class="col-lg-5 mx-auto position-relative">
                        <div class="reciept-box w-100 flex-lg-grow-1">
                            <div class="reciept-header d-flex justify-content-center align-items-center">
                                <div class="d-flex align-items-center">

                                    <h2 class="mb-0 pb-0">{{$bookingInfo->vechile->car_name}}</h2>
                                </div>
                            </div>
                            <div class="border-r"></div>
                            <h2 class="text-center my-3">Service Information</h2>
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                    <h4>Date</h4>
                                    <h4>{{$bookingInfo->booking_date}}</h4>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                    <h4>Time</h4>
                                    <h4>{{$bookingInfo->bayTimeSlot->start_time}}</h4>
                                </div>
                                <!-- <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                    <h4>Kilometer at Serviced</h4>
                                    <h4>12,2571 Km</h4>
                                </div> -->
                                <div class="border-r my-2"></div>
                                <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                    <h4>Engine Oil/Filter</h4>
                                    <h4>-</h4>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                    <h4>Tire Exchange</h4>
                                    <h4>-</h4>
                                </div>


                            </div>

                        </div>
                        @if((\Carbon\Carbon::parse($bookingInfo->created_at)->diffInMinutes(\Carbon\Carbon::now()) <= 15) && $bookingInfo->booking_status  == 'Active' )
                            <form action="{{route('change.status',$bookingInfo->id)}}" method="POST">
                                @csrf
                                <button class="main-btn-blank print-btn px-2 ms-3 mt-lg-0 mt-3"
                                        style="width: fit-content !important;">
                                    Cancel Booking
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
