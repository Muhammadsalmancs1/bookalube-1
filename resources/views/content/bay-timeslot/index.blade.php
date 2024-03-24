@extends('layouts.app')

@section('template_title')
    Bay Time Slot
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Bay Time Slot</h4>
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <div class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column ">
                <h5 class="card-header px-0 pb-3">Bay Time Slot</h5>
                <a href="{{ route('management.bay-timeslots.create') }}" class="btn btn-primary mb-md-0 mb-3 mt-lg-1">Add Bay Time Slot</a>
            </div>
            <h5 class="card-header px-0">Bay Slot Listing</h5>
            <div class="datatable-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bayTimeslots as $i=>$bay)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $bay->bay->name }}</td>
                            <td>{{ $bay->start_time }}</td>
                            <td>{{ $bay->end_time }}</td>
                            <td>
                                <form action="{{ route('management.bay-timeslots.destroy',$bay->id) }}" method="POST">
                                    <a href="{{route('management.bay-timeslots.edit',$bay->id)}}"
                                            class="edit-data">Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
{{--                        @if (isset($bay) ?? '')--}}
{{--                            @include('content.bay-timeslot.edit')--}}
{{--                        @endif--}}
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
