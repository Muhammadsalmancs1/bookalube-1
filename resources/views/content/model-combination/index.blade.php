@extends('layouts.app')

@section('template_title')
    Model Combination
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column ">
            <h5 class="card-header px-0 pb-3">Model Combinations</h5>
            <a href="{{ route('catalog.model-combinations.create') }}" class="btn btn-primary mb-md-0 mb-3 mt-lg-1">Create
                New</a>
        </div>
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Make Combination Listing</h5>
            <div class="datatable-responsive">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Year</th>
                        <th>Make/Brand</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($modelCombinations as $i=> $modelCombination)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $modelCombination->name }}</td>
                            <td>
                                @foreach($modelCombination->engines as $engine )
                                    <li class="d-inline-flex">{{ $engine->name  }},</li>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('catalog.make-combinations.destroy',$modelCombination->id) }}"
                                      method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $modelCombination->id }}"
                                            class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($modelCombination) ?? '')
                            @include('content.model-combination.edit')
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
