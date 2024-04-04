@extends('layouts.app')

@section('template_title')
    Incoming Service
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 ">
            <div
                class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column ">
                <h5 class="card-header px-0 pb-3">Incoming Service</h5>
                <div class="mt-1">
                    <a href="{{ route('catalog.incoming-services.create') }}"
                       class="btn btn-primary mb-md-0 mb-3 mt-lg-1">Add Incoming Service</a>
                </div>
            </div>
            <div class="datatable-responsive mt-3">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Percentage</th>
                        <th>Total Cost</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($incomingServices as $i=> $incomingService)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $incomingService->percentage }}</td>
                            <td>{{ $incomingService->total_value }}</td>

                            <td>
                                <form action="{{ route('catalog.incoming-services.destroy',$incomingService->id) }}"
                                      method="POST">
{{--                                    <button type="button" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#staticBackdrop{{ $incomingService->id }}"--}}
{{--                                            class="edit-data">Edit--}}
{{--                                    </button>--}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
{{--                        @if (isset($incomingService) ?? '')--}}
{{--                            @include('content.incoming-services.edit')--}}
{{--                        @endif--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
