@extends('layouts.app')

@section('template_title')
    Car Air Filter
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        @include('content.fuel-filter.create')
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Fuel  Filter Listing</h5>
            <div class="datatable-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fuelFilters as $i=>$fuelFilter)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $fuelFilter->name }}</td>
                            <td>{{ $fuelFilter->price }}</td>
                            <td>
                                <form action="{{ route('fuel-filters.destroy',$fuelFilter->id) }}" method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop{{ $fuelFilter->id }}"
                                       class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($fuelFilter) ?? '')
                            @include('content.fuel-filter.edit')
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
