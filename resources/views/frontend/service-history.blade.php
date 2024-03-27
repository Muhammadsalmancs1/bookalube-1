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

                    <h2 class="main-heading text-white text-center mb-0 pb-0">Service History</h2>
                    <a href="{{route('dashboard')}}"
                       class="text-decoration-none text-white d-flex align-items-center back-sm">
                        Home <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="" class="ms-2">
                    </a>
                </div>
            </div>
            <div class="col-12   mx-auto mt-3 mb-4 ">
                @foreach($bookingInfos as $bookingInfo)
                    <div class="row">

                        <div class="col-lg-5 mx-auto position-relative">

                            <div class="reciept-box w-100 flex-lg-grow-1">
                                <div class="reciept-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">
                                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_59_559)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M12 0C18.6275 0 24 5.3725 24 12C24 18.6275 18.6275 24 12 24C5.3725 24 0 18.6275 0 12C0 5.3725 5.3725 0 12 0ZM6.691 12.3193C6.852 11.3857 7.9175 10.866 8.75825 11.3717C8.8345 11.4172 8.90725 11.4712 8.975 11.5332L8.9815 11.5395C9.35875 11.901 9.7815 12.2773 10.2005 12.6503L10.56 12.973L14.8258 8.4985C15.0805 8.23175 15.2668 8.05925 15.649 7.97325C16.9578 7.6845 17.878 9.28425 16.9505 10.262L11.634 15.8415C11.1333 16.3757 10.2382 16.4245 9.7 15.9143C9.3915 15.6278 9.056 15.3363 8.71675 15.042C8.12925 14.5315 7.53 14.0107 7.0415 13.4952C6.74825 13.2022 6.62175 12.7225 6.691 12.3193Z"
                                                          fill="#6BBE66"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_59_559">
                                                        <rect width="24" height="24" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>

                                        <h2 class="mb-0 pb-0">{{$bookingInfo->vechile->car_name}}</h2>
                                    </div>
                                    <div>
                                        <h4 class="mb-0 pb-0">{{$bookingInfo->booking_status}}</h4>
                                    </div>
                                </div>
                                <div class="border-r"></div>
                                <h2 class="text-center my-3">Vehicle Information</h2>
                                <div class="d-flex justify-content-between align-items-center px-lg-3">
                                    <div>
                                        <p class="mb-0 pb-0">Year</p>
                                        <h4>{{$bookingInfo->vechile->carYear[0]->year}}</h4>
                                    </div>
                                    <div>
                                        <p class="mb-0 pb-0">Make</p>
                                        <h4>{{$bookingInfo->vechile->carModel[0]->name}}</h4>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center px-lg-3">
                                    <div>
                                        <p class="mb-0 pb-0">Engine</p>
                                        <h4>{{$bookingInfo->vechile->carBrand[0]->name}}</h4>
                                    </div>
                                    <div>
                                        <p class="mb-0 pb-0">Model</p>
                                        <h4>{{$bookingInfo->vechile->carModel[0]->name}}</h4>
                                    </div>
                                </div>
                                <div class="border-r my-2"></div>
                                <div>
                                    <h2 class="text-center my-3">Service Information</h2>
                                    <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                        <h4>Date</h4>
                                        <h4>{{$bookingInfo->booking_date}}</h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                        <h4>Time</h4>
                                        <h4>{{$bookingInfo->bayTimeSlot->start_time}}
                                            - {{$bookingInfo->bayTimeSlot->end_time}}</h4>
                                    </div>
                                    <div class="border-r my-3"></div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                        <h4>Engine Oil/Filter</h4>
                                        <h4>$10</h4>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                        <h4>Tire Exchange</h4>
                                        <h4>$20</h4>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-2 px-lg-4">
                                        <h4>HST@13%</h4>
                                        <h4>$15</h4>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-2 px-lg-4 total-div text-white">
                                        <h2 class="text-white mb-0 f-24 py-2">Total</h2>
                                        <h2 class="text-white mb-0 f-24 py-2">{{$bookingInfo->total_price}}</h2>
                                    </div>
                                </div>
                                <div class="border-r my-2"></div>
                                {{--                        <h4 class="text-center mt-2">Notes</h4>--}}
                                {{--                        <div class="reciept-note mb-3">--}}
                                {{--                            This customer car was too old and too much exhaust engine at all.--}}
                                {{--                        </div>--}}
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
@endsection
