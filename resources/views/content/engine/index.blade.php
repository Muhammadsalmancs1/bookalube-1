@extends('layouts.app')

@section('template_title')
    Engine
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        @include('content.engine.create')
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Engine Listing</h5>
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
                    @foreach ($engines as $i=>$engine)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $engine->name }}</td>
                            <td>
                                <form action="{{ route('catalog.engines.destroy',$engine->id) }}" method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                       data-bs-target="#staticBackdrop{{ $engine->id }}"
                                       class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($engine) ?? '')
                            @include('content.engine.edit')
                        @endif
                    @endforeach
{{--                    <td>1</td>--}}
{{--                    <td>ALI RAZA GRAVITY</td>--}}
{{--                    <td>--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"--}}
{{--                                    class="edit-data">Edit--}}
{{--                            </button>--}}
{{--                            <button class="delete-data">Delete</button>--}}
{{--                        </div>--}}
{{--                    </td>--}}


                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
