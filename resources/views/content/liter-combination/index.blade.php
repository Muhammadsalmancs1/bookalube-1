@extends('layouts.app')

@section('template_title')
    Liter Combination
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="pt-3 pb-2">Registration</h4>
        <!-- Striped Rows -->
            <div class="card px-4 pb-4 ">
                <div class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column ">
                    <h5 class="card-header px-0 pb-3">Liter Combinations</h5>
<div class="mt-1">
                    <a href="{{ route('catalog.liter-combinations.create') }}" class="btn btn-primary mb-md-0 mb-3 mt-lg-1">Add Combination</a>
                    </div>     </div>
            <div class="datatable-responsive mt-3">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Liter</th>
                        <th>Year</th>
                        <th>Make/Brand</th>
                        <th>Model</th>
                        <th>Engine</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($literCombinations as $i=> $literCombination)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $literCombination->liter }}</td>
                            <td>
                                @foreach($literCombination->carYear as $year )
                                    <li class="d-inline-flex">{{ $year->year  }}</li>
                                @endforeach
                            </td>
                            <td>
                                @foreach($literCombination->carBrand as $brand )
                                    <li class="d-inline-flex">{{ $brand->name  }}</li>
                                @endforeach
                            </td>
                            <td>
                            @foreach($literCombination->carModel as $model )
                                    <li class="d-inline-flex">{{ $model->name  }}</li>
                                @endforeach
                            </td>
                            <td>
                                @foreach($literCombination->engine as $engine )
                                    <li class="d-inline-flex">{{ $engine->name  }}</li>
                                @endforeach
                            </td>

                            <td>
                                <form action="{{ route('catalog.liter-combinations.destroy',$literCombination->id) }}"
                                      method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $literCombination->id }}"
                                            class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($literCombination) ?? '')
                            @include('content.liter-combination.edit')
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
