@extends('layouts.app')

@section('template_title')
    Year Combination
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column ">
            <h5 class="card-header px-0 pb-3">Year Combinations</h5>
            <a href="{{ route('catalog.year-combinations.create') }}" class="btn btn-primary mb-md-0 mb-3 mt-lg-1">Create
                New</a>
        </div>
        <!-- Striped Rows -->
        <div class="card px-4 pb-4 mt-5">
            <h5 class="card-header px-0">Transmission Filter Listing</h5>
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
                    @foreach ($yearCombinations as $i=> $yearCombination)
                        <tr>
                            <td>{{ ++$i }}</td>

                            <td>{{ $yearCombination->year }}</td>
                            <td>
                                @foreach($yearCombination->brands as $brand )
                                    <li class="d-inline-flex">{{ $brand->name  }},</li>
                                @endforeach
                            </td>

                            <td>
                                <form action="{{ route('catalog.year-combinations.destroy',$yearCombination->id) }}"
                                      method="POST">
                                    <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $yearCombination->id }}"
                                            class="edit-data">Edit
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($yearCombination) ?? '')
                            @include('content.year-combination.edit')
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
@endsection
