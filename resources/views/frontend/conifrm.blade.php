@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')

    <div class="container">
    <div class="row mt-4">

        <div class="col-lg-10 col-md-10 mx-auto">
            <div class="accordian-head justify-content-center">

                <h2 class="main-heading text-white text-center mb-0 pb-0">&nbsp;</h2>

            </div>
        </div>
        <div class="col-lg-10 col-md-10 mx-auto ">
            <div class=" d-flex flex-column align-items-center my-5 justify-content-center mx-auto  flex-column">
                <div>
                    <p class="mb-0 pb-0 f-18 w-500">
                        Booking has been confirmed
                    </p>
                </div>

                <div class="my-4">
                    <img src="{{asset('frontend/assets/images/thanks.svg')}}" alt="">
                </div>
                <div class="text texr-centerd f-16">
                    You will only be billed once work is complete
                    <br> <br>

                    If more than 15 minutes late, your appointment will be cancelled and you will charged a
                    <b>$20 cancellation fee</b>.
                </div>
                <div class="btn-div mt-4">
                    <a href="{{route('dashboard')}}" class="main-btn2">Home</a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
