@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection
<style>
    /* Hide all steps by default: */
    .multi-tab{
            display: none;
            min-height: 65vh;
        }
</style>

@section('content')
    <form id="regForm" action="{{route('booking.store')}}" method="POST">
        @csrf
        <div class="multi-tab">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-2 page-info-div order-lg-1 order-2">
                        <div class=" page-info">
                            <p cla
                               ss="mb-0 pb-0">Vehicle</p>
                            <h3 class="mb-0 pb-0">{{$vechiles->car_name}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 mx-auto order-lg-2 order-1">
                        <div class="accordian-head">
                            <div class="form-number">
                                <span>3</span>/6
                            </div>
                            <h2 class="main-heading text-white text-center mb-0 pb-0">Book a Date</h2>
                            <a href="{{route('dashboard')}}" class="text-decoration-none text-white">Home
                                <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-10 mx-auto order-lg-3 order-3">
                        <div class="Scriptcontent">
                            <!-- DEMO HTML -->
                            <div class="calendar-wrapper">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Select Date</label>
                                    <input type="text" name="date" id="datepicker" required="required" class="date-picker-input">

                                </div>
                            </div>
                            <!-- END DEMO HTML -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="multi-tab">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-2 page-info-div order-lg-1 order-2">
                        <div class="page-info">
                            <p class="mb-0 pb-0">Vehicle</p>
                            <h3 class="mb-0 pb-0">{{$vechiles->car_name}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 mx-auto order-lg-2 order-1 mb-lg-3">
                        <div class="accordian-head">
                            <div class="form-number"><span>4</span>/6</div>
                            <h2 class="main-heading text-white text-center  mb-0 pb-0">
                                Book a Time
                            </h2>
                            <a href="{{route('dashboard')}}" class="text-decoration-none text-white">Home
                                <img src="{{asset('frontend/assets/images/ar.svg')}}" alt=""/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 mx-auto order-lg-3 order-3">
                        <div class="container">
                            <div class="row d-flex mt-2">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
{{--                                        <table class="table date-table">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}

{{--                                                @foreach($bays as $bay)--}}
{{--                                                    <th>--}}
{{--                                                        <h3 class="table-head"><input type="radio" name="bay_id" value="{{ $bay->id }}"> {{ $bay->name }}</h3>--}}
{{--                                                    </th>--}}
{{--                                                @endforeach--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            @foreach ($timeslots as $timeslot)--}}
{{--                                                <tr>--}}
{{--                                                @foreach($bays as $bay)--}}
{{--                                                    @php--}}
{{--                                                        $bayTimeslots = $bay->bayTimeSlot->where('bay_id', $bay->id);--}}
{{--                                                    @endphp--}}
{{--                                                    @if($bayTimeslots->isEmpty())--}}
{{--                                                        <tr>--}}
{{--                                                            <td>Not Available</td>--}}
{{--                                                        </tr>--}}
{{--                                                    @else--}}
{{--                                                        @foreach ($bayTimeslots as $timeslot)--}}
{{--                                                                <td class="text-center">--}}
{{--                                                                    <input type="text" readonly="readonly" value="{{$timeslot->id}}"> Available--}}
{{--                                                                    <span>{{ \Carbon\Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('g:i A') }}</span>--}}
{{--                                                                </td>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
                                        <table class="table date-table">
                                            @foreach($bays as $bay)
                                                <tr>
                                                    <td colspan="2"><input type="radio" name="bay_id" value="{{ $bay->id }}"> {{ $bay->name }}</td>
                                                </tr>
                                                @php
                                                    $bayTimeslots = $bay->bayTimeSlot->where('bay_id', $bay->id);
                                                @endphp
                                                @if ($bayTimeslots->isEmpty())
                                                    <tr>
                                                        <td colspan="2" class="text-center">Not Slot Available</td>
                                                    </tr>
                                                @else
                                                    @foreach ($bayTimeslots as $timeslot)
                                                        <tr>
                                                            <td class="text-center">
                                                                <input type="radio" name="time_slot" value="{{$timeslot->id}}"> Available
                                                            </td>
                                                            <td>
                                                                <span>{{ \Carbon\Carbon::createFromFormat('H:i:s', $timeslot->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $timeslot->end_time)->format('g:i A') }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="multi-tab">

            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-2 page-info-div order-lg-1 order-2">
                        <div class="page-info">
                            <p class="mb-0 pb-0">Vehicle</p>
                            <h3 class="mb-0 pb-0">{{$vechiles->car_name}}</h3>
                            <input type="hidden" name="vechile_id" value="{{$vechiles->id}}">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 mx-auto order-lg-2 order-1">
                        <div class="accordian-head">
                            <div class="form-number">
                                <span>5</span>/6
                            </div>
                            <h2 class="main-heading text-white text-center mb-0 pb-0">Book a Lube</h2>
                            <a href="{{route('dashboard')}}" class="text-decoration-none text-white">Home
                                <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10 mx-auto mt-lg-3 order-lg-3 order-3 ">
                            <div>
                                @foreach($incomingSerives as $serivce)
                                <div class="d-flex align-items-center check-div mb-3">
                                    <p class="mb-0 pb-0">{{$serivce->incomingService->service->name}}</p>
                                    <div class="border mx-3"></div>
                                    <div class="check--div">
                                        <input type="checkbox" name="extra_services[]" value="25" id="" class="me-2 form-check-input">
                                        <span class="mb-0 pb-0">
                                            {{$serivce->total_cost}}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="multi-tab">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-11 col-md-11 mx-auto">
                        <div class="accordian-head">
                            <div class="form-number">
                                <span>6</span>/6
                            </div>
                            <h2 class="main-heading text-white text-center mb-0 pb-0">Purchase Summary</h2>
                            <a href="{{route('dashboard')}}" class="text-decoration-none text-white">Home
                                <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="">
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
                                <h3 class="mb-0 pb-0">{{$vechiles->car_name}}</h3>
                            </div>
                            <div class="summary-card-body">

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
                                    <input type="text" class="form-control ps-2" id="number"
                                           placeholder="5451215215202">
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

                </div>
            </div>

        </div>

        <div style="overflow:auto;" class="form-buttons">

            <div class=" d-flex align-items-center my-5 justify-content-center mx-auto flex-md-row flex-column ">
                <div class="me-md-2 me-0  btn-div order-md-1 order-2">
                    <button type="button" class="main-btn-blank" onclick="nextPrev(-1)" id="prevBtn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M8.29289 11.2929C7.90237 11.6834 7.90237 12.3166 8.29289 12.7071L13.2929 17.7071C13.6834 18.0976 14.3166 18.0976 14.7071 17.7071C15.0976 17.3166 15.0976 16.6834 14.7071 16.2929L10.4142 12L14.7071 7.70711C15.0976 7.31658 15.0976 6.68342 14.7071 6.29289C14.3166 5.90237 13.6834 5.90237 13.2929 6.29289L8.29289 11.2929Z"/>
                        </svg>
                        Back
                    </button>
                </div>
                <div class="btn-div order-md-2 order-1 mb-md-0 mb-3">

                    <button type="button" class="main-btn2" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button type="submit" id="submitForm" style="display: none;">Submit</button>
                </div>
            </div>
        </div>

    </form>

    <!-- Modal -->
    <div class="modal fade modal-done" id="done" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered confirm-modal">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="main-heading text-center">Confirm Booking</h1>
                    <div class="text texr-centerd f-16">
                        You will only be billed once work is complete
                        <br> <br>

                        If more than 10 minutes late, your appointment will be cancelled and you will charged a
                        <b>$20 cancellation fee</b>.
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center  flex-md-row flex-column my-4">
                    <a href="{{route('dashboard')}}" class="main-btn-blank order-md-1 order-2">Cancel</a>
                    <a href="{{route('dashboard')}}" class="main-btn2 ms-md-2 mb-md-0 mb-2 order-md-2 order-1">OK</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            var x = document.getElementsByClassName("multi-tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("multi-tab");
            // Hide the current tab
            x[currentTab].style.display = "none";
            currentTab += n;

            if (currentTab >= x.length) {
                // This is where we handle the form submission
                // You can also use AJAX here to submit the form data without refreshing the page
                submitForm();
                return false; // Prevent the form from submitting in the traditional way
            }
            // Otherwise, display the correct tab
            showTab(currentTab);
        }

        function submitForm() {
            document.getElementById("regForm").submit();
        }
        var disabledDates = @json($disabledDates->pluck('leave_date'));
        $(function() {
            $("#datepicker").datepicker({
                minDate: 0,
                beforeShowDay: function(date){
                    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    return [disabledDates.indexOf(string) == -1];
                }
            });
        });
    </script>
@endsection
