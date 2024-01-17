@extends('layouts.app')

@section('template_title')
    Car Air Filter
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        @include('content.air-filter.create')
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Air  Filter Listing</h5>
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
                    @foreach ($airFilters as $i=>$airFilter)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $airFilter->name }}</td>
                            <td>{{ $airFilter->price }}</td>
                            <td>
                                <form action="{{ route('catalog.air-filters.destroy',$airFilter->id) }}" method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop{{ $airFilter->id }}"
                                       class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($airFilter) ?? '')
                            @include('content.air-filter.edit')
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
