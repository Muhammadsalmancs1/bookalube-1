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

                    </div>
                    <h2 class="main-heading text-white text-center mb-0 pb-0">Home</h2>
                    <a href="" class="text-decoration-none text-white">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-10 mx-auto mt-3">
                    <div class="information-row mb-3 ">
                        <p class=" mb-0 pb-0">Betsey</p>
                        <a href="{{route('booking')}}" class="main-btn2 px-3" style="width: fit-content; ">BookaLube</a>
                    </div>
                <div class="information-row mb-3">
                    <p class=" mb-0 pb-0">Honda</p>
                    <div class="d-flex flex-md-row flex-column justify-content-end w-100">
                        <a href="upcoming-service.html" class="main-btn-blank px-3" style="width: fit-content; ">Upcoming Service</a>
                        <a href="service-history.html" class="main-btn-blank px-3 mx-md-3" style="width: fit-content; ">Service History</a>
                        <a href="{{route('booking')}}" class="main-btn2 px-3" style="width: fit-content; ">BookaLube</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 mb-4">
                    <a href="{{route('addvechiles')}}" class="main-btn2 px-3 mt-lg-5 ">+ Add Vehicle</a>
                </div>
            </div>
        </div>
    </div>

@endsection
