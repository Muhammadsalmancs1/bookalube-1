@extends('layouts.app')

@section('template_title')
    Booking
@endsection
@section('page-head')
    <style>
        table.dataTable {
            border: none !important;
        }

        table.dataTable tr td {
            border: none !important;
        }

        table.dataTable.stripe > tbody > tr.odd > *,
        table.dataTable.display > tbody > tr.odd > * {
            box-shadow: none !important;
        }

        table.dataTable.stripe > tbody > tr.even > *,
        table.dataTable.display > tbody > tr.even > *:hover {
            box-shadow: none !important;

        }

        .dataTables_length {
            display: none !important;
        }

        .modal-fullscreen .modal-content {
            height: fit-content !important;
        }

        .modal-fullscreen {
            width: 80vw;
            margin: 20px auto !important;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            background-clip: padding-box;
            box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
            background-color: white;
            border-radius: 3px;
            display: flex;
        }

        .tab-scroll {
            overflow-x: auto;
            display: flex;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 12px 16px;
            transition: 0.3s;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #1C315E;
            color: white;
        }

        /* Style the tab content */
        .tabcontent {
            /* display: none; */
            border-top: none;
            border: none !important;
        }

        #example_filter {
            margin-bottom: 0px !important;
            margin-top: -40px !important;
        }

        #example_filter label {
            margin: 0px 13px !important;
            width: 270px !important;
            font-size: 0px !important;
        }

        #example_filter label input {
            background-color: white;
            border: none !important;
            font-size: 14px;
        }

        @media only screen and (max-width: 767px) {
            #example_filter {
                margin-top: 0px !important;
            }

            #example_filter label {
                margin: 0px 0px !important;

            }
        }
    </style>
@endsection

@section('content')
    {{--    <div class="layout-wrapper layout-content-navbar">--}}
    {{--        <div class="layout-container">--}}
    <!-- Content wrapper -->
    <div class="content-wrapper bg-transparent">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y bg-transparent">
            <div class="tab mb-3">
                <div class="tab-scroll">
                    <button class="tablinks" data-tab="all-booking" id="defaultOpen">All Bookings</button>
                    <button class="tablinks" data-tab="ongoing-b">Ongoing Bookings</button>
                    <button class="tablinks" data-tab="no-show-b">No Show</button>
                    <button class="tablinks" data-tab="completed-b">Completed Services</button>
                    <button class="tablinks" data-tab="cancel-b">Cancel Bookings</button>
                </div>

            </div>

            <div id="all-booking" class="tabcontent ">
                <!-- Striped Rows -->
                <div class=" bg-transparent">
                    <div
                        class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column pt-2">
                        <h5 class="card-header px-2 pb-2">All Bookings</h5>
                    </div>
                    <!-- <div class=" datatable-responsive  "> -->
                    <table id="example" class="display " style="width:100%">
                        <thead>
                        <tr class="d-none">
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr class="">
                                <td class="px-0">
                                    <div class="card py-3 vehical-card" style="overflow: hidden;">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="col-lg-12 ">
                                                    <div
                                                        class="d-flex  justify-content-between align-items-end">
                                                        <h3 class="mb-0 pb-0 ">Vehicle Name</h3>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->users->email}}
                                                            </p>
                                                        </div>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->booking_date}}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ">
                                                            <input type="hidden" id="booking_id"
                                                                   value="{{$booking->id}}">
                                                            @if($booking->booking_status == 'Active')
                                                                <button class="chat-box" data-bs-toggle="modal"
                                                                        data-bs-target="#chat-modal"
                                                                        onclick="bookingId()">
                                                                    <i class="bi bi-chat-text-fill"></i>
                                                                </button>
                                                            @endif
                                                            <div
                                                                class="vehical-status ongoing">{{$booking->booking_status}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-3">
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <h4>Date & Time</h4>
                                                    <div>
                                                        <span class="vehical-label">Date</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->booking_date}}</h5>
                                                    </div>
                                                    <div class="mt-2">
                                                        <span class="vehical-label">Time</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->bayTimeSlot->start_time}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Vehical Information</h4>
                                                    <div class="accordion" id="accordionExample">

                                                        <div class="accordion-item p-0"
                                                             style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button  px-0 pt-0"
                                                                        style="width: auto; min-width: 240px;"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseTwo">
                                                                    {{$booking->vechile->car_name}}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo"
                                                                 class="accordion-collapse collapse show"
                                                                 aria-labelledby="headingTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carYear[0]->year}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carBrand[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carModel[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->engine[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-2 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Services</h4>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"> <i
                                                                            class="bi-check-circle text-success"></i>
                                                                    </span>
                                                        <p class="mb-0 pb-0 ms-2">Engine Oil/Filter </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Air Filter</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Transmission Oil </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Rotation</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Charge over</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3 ">
                                                    @if($booking->booking_status == 'Active')
                                                        <h4 class="text-center ">Actions</h4>

                                                        <div
                                                            class="d-flex align-items-center justify-content-center mt-3">
                                                            <a href="{{route('catalog.compelete.bookings',$booking->id)}}"
                                                               class="mt-ms-4 mt-1  btn-sm  btn-success  rounded-2  ">
                                                                Complete
                                                            </a>
                                                            <a href="{{route('catalog.noShow.bookings',$booking->id)}}"
                                                               class="mt-ms-4 mt-1  btn-sm btn-info  rounded-2  mx-1">
                                                                No
                                                                Show
                                                            </a>
                                                            <a href="{{route('catalog.cancel.bookings',$booking->id)}}"
                                                               class="mt-ms-4 mt-1  btn-sm  btn-danger rounded-2"  data-booking-id="{{$booking->id}}">
                                                                Cancel
                                                            </a>
                                                        </div>
                                                        <div class="d-flex justify-content-center mt-3 ">
                                                            <button
                                                                class="mt-ms-4 mt-1  bth-sm btn-primary rounded-2  px-2 py-1 mx-auto "
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#info-modal" data-booking-id="{{$booking->id}}" onclick="vechileInfo(this)">Add Vehical
                                                                Info
                                                            </button>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="col-lg-12 d-md-none d-block">
                                                    <hr class="">

                                                    <div
                                                        class=" d-flex justify-content-end mb-1  flex-md-row flex-column">

                                                        <div class="d-flex align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">abc@gmail.com
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ms-md-4">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">13/101/2023
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <!-- </div> -->
                </div>
                <!--/ Striped Rows -->
            </div>
            <div id="ongoing-b" class="tabcontent">
                <!-- Striped Rows -->
                <div class=" bg-transparent">
                    <div
                        class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column pt-2">
                        <h5 class="card-header px-2 pb-2">Ongoing Bookings</h5>

                    </div>
                    <table id="ongoing" class="display" style="width:100%">
                        <thead>
                        <tr class="d-none">
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activeBookings as $booking)
                            <tr class="">
                                <td class="px-0">
                                    <div class="card py-3 vehical-card" style="overflow: hidden;">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="col-lg-12 ">
                                                    <div
                                                        class="d-flex  justify-content-between align-items-end">
                                                        <h3 class="mb-0 pb-0 ">Vehicle Name</h3>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->users->email}}
                                                            </p>
                                                        </div>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->booking_date}}
                                                            </p>
                                                        </div>
                                                        <input type="hidden" id="booking_id"
                                                               value="{{$booking->booking_status}}">
                                                        <div class="d-flex align-items-center ">
                                                            <button class="chat-box" data-bs-toggle="modal"
                                                                    data-bs-target="#chat-modal"
                                                                    onclick="bookingId()">
                                                                <i class="bi bi-chat-text-fill"></i>
                                                            </button>
                                                            <div
                                                                class="vehical-status ongoing">{{$booking->booking_status}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-3">
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <h4>Date & Time</h4>
                                                    <div>
                                                        <span class="vehical-label">Date</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->booking_date}}</h5>
                                                    </div>
                                                    <div class="mt-2">
                                                        <span class="vehical-label">Time</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->bayTimeSlot->start_time}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Vehical Information</h4>
                                                    <div class="accordion" id="accordionExample">

                                                        <div class="accordion-item p-0"
                                                             style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button  px-0 pt-0"
                                                                        style="width: auto; min-width: 240px;"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseTwo">
                                                                    {{$booking->vechile->car_name}}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo"
                                                                 class="accordion-collapse collapse show"
                                                                 aria-labelledby="headingTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carYear[0]->year}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carBrand[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carModel[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->engine[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-2 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Services</h4>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"> <i
                                                                            class="bi-check-circle text-success"></i>
                                                                    </span>
                                                        <p class="mb-0 pb-0 ms-2">Engine Oil/Filter </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Air Filter</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Transmission Oil </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Rotation</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Charge over</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3 ">
                                                    <h4 class="text-center ">Actions</h4>
                                                    <div
                                                        class="d-flex align-items-center justify-content-center mt-3">
                                                        <a href="{{route('catalog.compelete.bookings',$booking->id)}}"
                                                           class="mt-ms-4 mt-1  btn-sm  btn-success  rounded-2  ">
                                                            Complete
                                                        </a>
                                                        <a href="{{route('catalog.noShow.bookings',$booking->id)}}"
                                                           class="mt-ms-4 mt-1  btn-sm btn-info  rounded-2  mx-1">
                                                            No
                                                            Show
                                                        </a>
                                                        <a href="{{route('catalog.cancel.bookings',$booking->id)}}"
                                                           class="mt-ms-4 mt-1  btn-sm  btn-danger rounded-2"  data-booking-id="{{$booking->id}}">
                                                            Cancel
                                                        </a>
                                                    </div>
                                                    <div class="d-flex justify-content-center mt-3 ">
                                                        <button
                                                            class="mt-ms-4 mt-1  bth-sm btn-primary rounded-2  px-2 py-1 mx-auto "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#info-modal"  data-booking-id="{{$booking->id}}" onclick="vechileInfo(this)">Add Vehical
                                                            Info
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 d-md-none d-block">
                                                    <hr class="">

                                                    <div
                                                        class=" d-flex justify-content-end mb-1  flex-md-row flex-column">

                                                        <div class="d-flex align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">abc@gmail.com
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ms-md-4">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">13/101/2023
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!--/ Striped Rows -->
            </div>

            <div id="no-show-b" class="tabcontent">
                <!-- Striped Rows -->
                <div class=" bg-transparent">
                    <div
                        class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column pt-2">
                        <h5 class="card-header px-2 pb-2">No Show</h5>

                    </div>
                    <table id="completed" class="display" style="width:100%">
                        <thead>
                        <tr class="d-none">
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($noShowBookings as $booking)
                            <tr class="">
                                <td class="px-0">
                                    <div class="card py-3 vehical-card" style="overflow: hidden;">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="col-lg-12 ">
                                                    <div
                                                        class="d-flex  justify-content-between align-items-end">
                                                        <h3 class="mb-0 pb-0 ">Vehicle Name</h3>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->users->email}}
                                                            </p>
                                                        </div>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->booking_date}}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ">
                                                            <div
                                                                class="vehical-status ongoing">{{$booking->booking_status}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-3">
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <h4>Date & Time</h4>
                                                    <div>
                                                        <span class="vehical-label">Date</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->booking_date}}</h5>
                                                    </div>
                                                    <div class="mt-2">
                                                        <span class="vehical-label">Time</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->bayTimeSlot->start_time}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Vehical Information</h4>
                                                    <div class="accordion" id="accordionExample">

                                                        <div class="accordion-item p-0"
                                                             style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button  px-0 pt-0"
                                                                        style="width: auto; min-width: 240px;"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseTwo">
                                                                    {{$booking->vechile->car_name}}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo"
                                                                 class="accordion-collapse collapse show"
                                                                 aria-labelledby="headingTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carYear[0]->year}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carBrand[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carModel[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->engine[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-2 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Services</h4>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"> <i
                                                                            class="bi-check-circle text-success"></i>
                                                                    </span>
                                                        <p class="mb-0 pb-0 ms-2">Engine Oil/Filter </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Air Filter</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Transmission Oil </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Rotation</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Charge over</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3 ">
                                                    <h4 class="text-center ">Actions</h4>

                                                <div
                                                class="d-flex align-items-center justify-content-center mt-3">
                                                <a href="{{route('catalog.compelete.bookings',$booking->id)}}"
                                                   class="mt-ms-4 mt-1  btn-sm  btn-success  rounded-2  ">
                                                    Complete
                                                </a>
                                                <a href="{{route('catalog.cancel.bookings',$booking->id)}}"
                                                   class="mt-ms-4 mt-1  btn-sm  btn-danger rounded-2"  data-booking-id="{{$booking->id}}">
                                                    Cancel
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-center mt-3 ">
                                                <button
                                                    class="mt-ms-4 mt-1  bth-sm btn-primary rounded-2  px-2 py-1 mx-auto "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#info-modal" data-booking-id="{{$booking->id}}" onclick="vechileInfo(this)">Add Vehical
                                                    Info
                                                </button>
                                            </div>

                                        
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach

                        </tbody>

                    </table>
                </div>
                <!--/ Striped Rows -->
            </div>

            <div id="completed-b" class="tabcontent">
                <!-- Striped Rows -->
                <div class=" bg-transparent">
                    <div
                        class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column pt-2">
                        <h5 class="card-header px-2 pb-2">Complete Bookings</h5>

                    </div>
                    <table id="completed" class="display" style="width:100%">
                        <thead>
                        <tr class="d-none">
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($completeBookings as $booking)
                            <tr class="">
                                <td class="px-0">
                                    <div class="card py-3 vehical-card" style="overflow: hidden;">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="col-lg-12 ">
                                                    <div
                                                        class="d-flex  justify-content-between align-items-end">
                                                        <h3 class="mb-0 pb-0 ">Vehicle Name</h3>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->users->email}}
                                                            </p>
                                                        </div>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->booking_date}}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ">
                                                            <div
                                                                class="vehical-status ongoing">{{$booking->booking_status}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-3">
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <h4>Date & Time</h4>
                                                    <div>
                                                        <span class="vehical-label">Date</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->booking_date}}</h5>
                                                    </div>
                                                    <div class="mt-2">
                                                        <span class="vehical-label">Time</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->bayTimeSlot->start_time}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Vehical Information</h4>
                                                    <div class="accordion" id="accordionExample">

                                                        <div class="accordion-item p-0"
                                                             style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button  px-0 pt-0"
                                                                        style="width: auto; min-width: 240px;"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseTwo">
                                                                    {{$booking->vechile->car_name}}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo"
                                                                 class="accordion-collapse collapse show"
                                                                 aria-labelledby="headingTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carYear[0]->year}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carBrand[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carModel[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->engine[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="accordion-item p-0"
                                                            style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button
                                                                    class="accordion-button collapsed px-0 pt-0"
                                                                    style="width: auto; min-width: 240px;"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseThree">
                                                                    Vehical #2
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">2024</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">Lorem,
                                                                            ipsum dolor.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">Lorem,
                                                                            ipsum dolor.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">Lorem,
                                                                            ipsum dolor.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                </div>
                                                <div class="col-lg-2 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Services</h4>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"> <i
                                                                            class="bi-check-circle text-success"></i>
                                                                    </span>
                                                        <p class="mb-0 pb-0 ms-2">Engine Oil/Filter </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Air Filter</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Transmission Oil </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Rotation</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Charge over</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3 ">
                                                    <h4 class="text-center ">Actions</h4>
                                                    <div class="d-flex justify-content-center mt-3 ">
                                                        <button
                                                            class="mt-ms-4 mt-1  bth-sm btn-primary rounded-2  px-2 py-1 mx-auto "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#info-modal">Add Vehical
                                                            Info
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 d-md-none d-block">
                                                    <hr class="">

                                                    <div
                                                        class=" d-flex justify-content-end mb-1  flex-md-row flex-column">

                                                        <div class="d-flex align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">abc@gmail.com
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ms-md-4">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">13/101/2023
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
                <!--/ Striped Rows -->
            </div>

            <div id="cancel-b" class="tabcontent">
                <!-- Striped Rows -->
                <div class=" bg-transparent">
                    <div
                        class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column pt-2">
                        <h5 class="card-header px-2 pb-2">Cancel Bookings</h5>

                    </div>
                    <table id="completed" class="display" style="width:100%">
                        <thead>
                        <tr class="d-none">
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cancelBookings as $booking)
                            <tr class="">
                                <td class="px-0">
                                    <div class="card py-3 vehical-card" style="overflow: hidden;">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="col-lg-12 ">
                                                    <div
                                                        class="d-flex  justify-content-between align-items-end">
                                                        <h3 class="mb-0 pb-0 ">Vehicle Name</h3>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->users->email}}
                                                            </p>
                                                        </div>
                                                        <div class="d-md-flex d-none align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">{{$booking->booking_date}}
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ">
                                                            <div
                                                                class="vehical-status ongoing">{{$booking->booking_status}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-3">
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <h4>Date & Time</h4>
                                                    <div>
                                                        <span class="vehical-label">Date</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->booking_date}}</h5>
                                                    </div>
                                                    <div class="mt-2">
                                                        <span class="vehical-label">Time</span>
                                                        <h5 class="mb-0 pb-0">{{$booking->bayTimeSlot->start_time}}</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Vehical Information</h4>
                                                    <div class="accordion" id="accordionExample">

                                                        <div class="accordion-item p-0"
                                                             style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button  px-0 pt-0"
                                                                        style="width: auto; min-width: 240px;"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwo"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseTwo">
                                                                    {{$booking->vechile->car_name}}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo"
                                                                 class="accordion-collapse collapse show"
                                                                 aria-labelledby="headingTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carYear[0]->year}}</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carBrand[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->carModel[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                                    <span class="vehical-label"
                                                                                          style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">{{$booking->vechile->engine[0]->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="accordion-item p-0"
                                                            style="box-shadow: none !important;">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button
                                                                    class="accordion-button collapsed px-0 pt-0"
                                                                    style="width: auto; min-width: 240px;"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseThree">
                                                                    Vehical #2
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body px-2">

                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Year:</span>
                                                                        <p class="mb-0 pb-0 ms-2">2024</p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Make:</span>
                                                                        <p class="mb-0 pb-0 ms-2">Lorem,
                                                                            ipsum dolor.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Modal:</span>
                                                                        <p class="mb-0 pb-0 ms-2">Lorem,
                                                                            ipsum dolor.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mb-1">
                                                                        <span class="vehical-label"
                                                                            style="min-width: 50px;">Engine:</span>
                                                                        <p class="mb-0 pb-0 ms-2">Lorem,
                                                                            ipsum dolor.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                </div>
                                                <div class="col-lg-2 col-md-6 mt-lg-0 mt-3">
                                                    <h4>Services</h4>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"> <i
                                                                            class="bi-check-circle text-success"></i>
                                                                    </span>
                                                        <p class="mb-0 pb-0 ms-2">Engine Oil/Filter </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Air Filter</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Transmission Oil </p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Rotation</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                                    <span class="vehical-label"
                                                                          style="min-width: 20px;"><i
                                                                            class="bi-check-circle text-success"></i></span>
                                                        <p class="mb-0 pb-0 ms-2">Tire Charge over</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 mt-lg-0 mt-3 ">
                                                    <h4 class="text-center ">Actions</h4>
                                                    <div class="d-flex justify-content-center mt-3 ">
                                                        <button
                                                            class="mt-ms-4 mt-1  bth-sm btn-primary rounded-2  px-2 py-1 mx-auto "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#info-modal">Add Vehical
                                                            Info
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 d-md-none d-block">
                                                    <hr class="">

                                                    <div
                                                        class=" d-flex justify-content-end mb-1  flex-md-row flex-column">

                                                        <div class="d-flex align-items-center ">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Email:</span>
                                                            <p class="mb-0 pb-0 ms-2">abc@gmail.com
                                                            </p>
                                                        </div>
                                                        <div class="d-flex align-items-center ms-md-4">
                                                                        <span class="vehical-label"
                                                                              style="min-width: 50px;">Booking
                                                                            Date:</span>
                                                            <p class="mb-0 pb-0 ms-2">13/101/2023
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!--/ Striped Rows -->
            </div>
            <!-- Modal -->
            <div class="modal fade" id="info-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                    <form method="POST" action="{{route('catalog.update.vechicle')}}">
                        @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control"  name="vid" id="vid"
                                               aria-describedby="helpId" placeholder="" readonly="readonly"/>
                                        <label for="" class="form-label">Year</label>
                                        <input type="text" class="form-control"  name="year" id="year"
                                               aria-describedby="helpId" placeholder="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Make</label>
                                        <input type="text" class="form-control" name="make" id="make"
                                               aria-describedby="helpId" placeholder="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Modal</label>
                                        <input type="text" class="form-control" name="modal" id="modal"
                                               aria-describedby="helpId" placeholder="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Engine</label>
                                        <input type="text" class="form-control" name="engine" id="engine"
                                               aria-describedby="helpId" placeholder="" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Engine Oil</label>
                                        <select id="engine_oil" name="engine_oil" class="form-select"
                                                aria-label="Default select example">
                                            <option selected>Select Engine Oil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Air Filter</label>
                                        <select id="air_filter" name="air_filter" class="form-select"
                                                aria-label="Default select example">
                                            <option selected>Select Filter</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kilometer at Service</label>
                                        <input type="text"  class="form-control" name="kilometer" id="kilometer"
                                               aria-describedby="helpId" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit"
                                    class="btn btn-primary bg-success border-0">Submit
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- / Layout wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Transmission Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                   placeholder="Edit Transmission FilterName" value=""/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="edit-price">Price</label>
                            <input type="text" class="form-control" id="edit-price"
                                   placeholder="Edit Transmission FilterPrice" value=""/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="chat-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary ">
                    <h5 class="modal-title mb-3 text-white " id="exampleModalLabel">Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{route('catalog.booking_note.bookings')}}">
                                @csrf
                                <input type="hidden" name="book_id" id="booking_idd" value="">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Title</label>
                                    <input type="text" name="title" class="form-control"
                                           id="basic-default-fullname"
                                           placeholder="Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Title</label><br>
                                    <textarea name="message" id="" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary bg-success border-0">Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="content-backdrop fade"></div>
    </div>

@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
            // Initialize DataTable with your options
            var dataTable = $('#myTable').DataTable({
                // Your DataTable configuration options go here
            });

            // Add a placeholder to the DataTable search input
            $('.dataTables_filter input').attr('placeholder', 'Search...');
        });
        // document.getElementById("defaultOpen").click();
        $(document).ready(function () {
            // Click event for tab buttons
            $(".tablinks").click(function () {
                var tabName = $(this).data("tab");

                // Remove the "active" class from all tab buttons
                $(".tablinks").removeClass("active");

                // Hide all tab content
                $(".tabcontent").hide();

                // Show the selected tab content
                $("#" + tabName).show();

                // Add the "active" class to the clicked tab button
                $(this).addClass("active");
            });


            // Trigger the default tab to open
            $("#defaultOpen").click();
        });
        document.getElementById("defaultOpen").click();

        function bookingId() {
            var bookingId = document.getElementById('booking_id').value
            document.getElementById('booking_idd').value = bookingId
        }

        function vechileInfo(data)
        {
            var id = data.dataset.bookingId;
            fetch(`/catalog/get-vechiles/${id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                     document.getElementById('year').value = data?.booking?.vechile?.car_year[0].year
                     document.getElementById('make').value = data?.booking?.vechile?.car_brand[0].name
                     document.getElementById('modal').value = data?.booking?.vechile?.car_model[0].name
                     document.getElementById('engine').value = data?.booking?.vechile?.engine[0].name
                     document.getElementById('kilometer').value = data?.booking?.vechile?.kilometer

                     document.getElementById('vid').value = data?.booking?.vechile?.id
                    var engineoil = document.getElementById('engine_oil')
                    var air_filter = document.getElementById('air_filter')
                    engineoil.innerHTML = '<option selected>Select Engine Oil</option>'; // Reset
                    data.engineOil.forEach(function (brand) {
                        $('#engine_oil').append('<option value="' + brand.id + '">' + brand.name + '</option>');
                    });

                    air_filter.innerHTML = '<option selected>Select Brand</option>'; // Reset
                    data.airFilter.forEach(function (brand) {
                        $('#air_filter').append('<option value="' + brand.id + '">' + brand.name + '</option>');
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
