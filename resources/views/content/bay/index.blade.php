@extends('layouts.app')

@section('template_title')
    Bays
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Bays</h4>
        @include('content.bay.create')
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Bay Listing</h5>
            <div class="datatable-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bays as $i=>$bay)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $bay->name }}</td>
                            <td>
                                <form action="{{ route('management.bays.destroy',$bay->id) }}" method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop{{ $bay->id }}"
                                       class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($bay) ?? '')
                            @include('content.bay.edit')
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
