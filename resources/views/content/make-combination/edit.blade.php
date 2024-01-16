<div class="modal fade" id="staticBackdrop{{$makeCombination->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Combination </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('make-combinations.update',$makeCombination->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Year</label>
                        <select class="form-select form-select " name="brand" id="">
                            <option>Select Brand</option>
                            @foreach($carBrands as $key=>$carBrand)
                                <option value="{{$key}}" {{ $key == $makeCombination->id ? 'selected' : '' }}>
                                    {{$carBrand}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        @foreach($makeCombination->models as $model)
                            <label for="" class="form-label">Model</label>
                            <select class="form-select form-select " name="car_model[]" id="">
                                <option>Select Make</option>
                                @foreach($carModels as $key=>$carModel)
                                    <option value="{{ $key }}" {{ $model->id == $key ? 'selected' : '' }}>
                                        {{ $carModel }}
                                    </option>
                                @endforeach
                            </select>
                        @endforeach
                    </div>
                    <div class="add-more-make">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
{{--                    <button type="button" class="btn btn-outline-primary me-2 add-more-make-btn"--}}
{{--                            style="font-weight: 500;">Add More--}}
{{--                    </button>--}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('page-script')
    <script>
        // jQuery document ready function
        $(document).ready(function () {
            // Add click event handler to add-more-make-btn button
            $('.add-more-make-btn').on('click', function () {
                // Clone the template and append it to the add-more-make div
                var templateClone = $('#form_template').html();
                $('.add-more-make').append(templateClone);
            });

            // Add click event handler to delete-make button inside the add-more-make div
            $(document).on('click', '.delete-make', function () {
                // Remove the closest make-div
                $(this).closest('.make-div').remove();
            });
        });
    </script>
@endsection
