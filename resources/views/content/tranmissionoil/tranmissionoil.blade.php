@extends('layouts.app')

@section('template_title')
    Car Tranmission Oil
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        @include('content.tranmissionoil.create')
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Tranmission Oil Listing</h5>
            <div class="datatable-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($show as $i=>$item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop{{ $item->id }}"
                                       class="edit-data">Edit
                                    </button>
                               
                            
                                    <a href="{{route('catalog.tranmission_oil_delete',$item->id) }}" type="button" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</a>
                            </td>
                        </tr>
                        @if (isset($show) ?? '')
                            @include('content.tranmissionoil.edit')
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
