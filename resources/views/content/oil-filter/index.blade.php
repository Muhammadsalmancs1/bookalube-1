@extends('layouts.app')

@section('template_title')
    Car Oil Filter
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        @include('content.oil-filter.create')
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Oil  Filter Listing</h5>
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
                    @foreach ($oilFilters as $i=>$oilFilter)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $oilFilter->name }}</td>
                            <td>{{ $oilFilter->price }}</td>
                            <td>
                                <form action="{{ route('catalog.oil-filters.destroy',$oilFilter->id) }}" method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop{{ $oilFilter->id }}"
                                       class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($oilFilter) ?? '')
                            @include('content.oil-filter.edit')
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
