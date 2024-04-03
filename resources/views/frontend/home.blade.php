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
                @foreach($vechiles as $vechile)
                <div class="information-row mb-3">
                    <p class=" mb-0 pb-0">{{$vechile->car_name}}</p>
                    <div class="d-flex flex-md-row flex-column justify-content-end w-100">

                        @php
                        $booking =\App\Models\Booking::with(['vechile','vechile.engine','vechile.carYear','vechile.carModel','vechile.carBrand','bay','bayTimeSlot'])
                        ->where('vechile_id',$vechile->id)->get();
                        @endphp
                        @if(count($booking) > 0)
                        <a href="{{route('upcoming-service',$vechile->id)}}" class="main-btn-blank px-3" style="width: fit-content; ">Upcoming Service</a>
                        @endif
                        @if(count($booking) > 0)
                        <a href="{{route('service-history',$vechile->id)}}" class="main-btn-blank px-3 mx-md-3" style="width: fit-content; ">Service History</a>
                        @endif
                        <a href="{{route('booking',$vechile->id)}}" class="main-btn2 px-3" style="width: fit-content; ">BookaLube</a>
                        <a href="{{route('booking.edit',$vechile->id)}}" class="px-1 mx-1 " style="width: fit-content; color: black "><i
                                class="fa fa-fw fa-edit"></i> </a>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center mt-5 mb-4">
                    <a href="{{route('addvechiles')}}" class="main-btn2 px-3 mt-lg-5 ">+ Add Vehicle</a>
                </div>
            </div>
        </div>
    </div>

@endsection
