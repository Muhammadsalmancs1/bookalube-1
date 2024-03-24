@extends('layouts.app')

@section('template_title')
    Bays
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-4">
            <h5 class="card-header">Bay Timeslot</h5>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Select Time</h5>
            <div class="card-body">
                <form method="POST" action="{{route('management.bay-timeslots.update',$bayTimeslot->id)}}" id="timeIntervalsForm">
                    @csrf
                @method('PATCH')
                    <div class="mb-3 make-div">
                        <select class="form-select form-select" name="bay_id" id="">
                            <option>Select Bay</option>
                            @foreach($bays as $key=>$bay)
                                <option value="{{$key}} {{ $bayTimeslot->bay_id == $key   ? 'selected' : '' }}">
                                {{$bay}}
                             </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="add-more-time-div mb-2" id="timeIntervalTemplate">
                        <div class="row  p-0">
                            <div class="mb-3 col-lg-6">
                                <label class="form-label" for="basic-default-fullname">Start Time </label>
                                <input type="time" name="start_time" value="{{$bayTimeslot->start_time}}" class="form-control" placeholder="Enter Date">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label class="form-label" for="basic-default-fullname">End Time</label>
                                <input type="time" name="end_time" value="{{$bayTimeslot->end_time}}" class="form-control" placeholder="Enter Date">
                            </div>
                        </div>
                    </div>
                    <div class="add-more-make">

                    </div>
                    <div class="col-lg-6 ms-auto ">
                        <div class="d-flex justify-content-end">
{{--                            <button type="button" id="addMoreTimeInterval" class="btn btn-warning me-2 add-more-time">--}}
{{--                                Add More--}}
{{--                            </button>--}}
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function () {
            $('#addMoreTimeInterval').on('click', function () {
                var templateClone = $('#timeIntervalTemplate').html();
                $('.add-more-make').append(templateClone);
            });
        });
    </script>
@endsection


{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="staticBackdrop{{ $bay->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"--}}
{{--     aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="staticBackdropLabel">Edit Bay </h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <form method="POST" action="{{route('management.bay-timeslots.store')}}" id="timeIntervalsForm">--}}
{{--                @csrf--}}
{{--                <div class="mb-3 make-div">--}}
{{--                    <select class="form-select form-select " name="bay_id" id="">--}}
{{--                        <option selected>Select Bay</option>--}}
{{--                        @foreach($bays as $key=>$bay)--}}
{{--                            <option value="{{$key}}">{{$bay}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="add-more-time-div mb-2" id="timeIntervalTemplate">--}}
{{--                    <div class="row  p-0">--}}
{{--                        <div class="mb-3 col-lg-6">--}}
{{--                            <label class="form-label" for="basic-default-fullname">Start Time </label>--}}
{{--                            <input type="time" name="start_time[]" class="form-control" placeholder="Enter Date">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 col-lg-6">--}}
{{--                            <label class="form-label" for="basic-default-fullname">End Time</label>--}}
{{--                            <input type="time" name="end_time[]" class="form-control" placeholder="Enter Date">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="add-more-make">--}}

{{--                </div>--}}
{{--                <div class="col-lg-6 ms-auto ">--}}
{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <button type="button" id="addMoreTimeInterval" class="btn btn-warning me-2 add-more-time">--}}
{{--                            Add More--}}
{{--                        </button>--}}
{{--                        <button type="submit" class="btn btn-primary ">Submit</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@section('page-script')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#addMoreTimeInterval').on('click', function () {--}}
{{--                var templateClone = $('#timeIntervalTemplate').html();--}}
{{--                $('.add-more-make').append(templateClone);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
