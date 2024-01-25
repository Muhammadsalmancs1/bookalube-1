@extends('layouts.app')

@section('template_title')
    Users
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
{{--    @include('content.user.create')--}}
    <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">User Listing</h5>
            <div class="datatable-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead">
                    <tr>
                        <th>No</th>

{{--                        <th>Name</th>--}}
                        <th>Email</th>
{{--                        <th>Is Admin</th>--}}
                        <th>Referral</th>
                        <th>Employee Name</th>
                        <th>Employee Number</th>
                        <th>Service Counter</th>

{{--                        <th></th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $i=> $user)
                        <tr>
                            <td>{{ ++$i }}</td>

{{--                            <td>{{ $user->name }}</td>--}}
                            <td>{{ $user->email }}</td>
{{--                            <td>{{ $user->is_admin }}</td>--}}
                            <td>{{ $user->referral }}</td>
                            <td>{{ $user->employee_name }}</td>
                            <td>{{ $user->employee_number }}</td>
                            <td>{{ $user->service_counter }}</td>

{{--                            <td>--}}
{{--                                <form action="{{ route('catalog.engines.destroy',$user->id) }}" method="POST">--}}
{{--                                    <button type="button" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#staticBackdrop{{ $user->id }}"--}}
{{--                                            class="edit-data">Edit--}}
{{--                                    </button>--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm"><i--}}
{{--                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection

