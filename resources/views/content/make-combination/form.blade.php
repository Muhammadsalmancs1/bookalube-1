<div class="mb-3">
    <label for="" class="form-label">Year</label>
    <select
        class="form-select form-select " name="brand" id="">
        <option selected>Select  Brand</option>
        @foreach($carBrands as $key=>$carBrand)
            <option value="{{$key}}">{{$carBrand}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="" class="form-label">Model</label>
    <select class="form-select form-select" name="car_model[]" id="">
        <option selected>Select Model</option>
        @foreach($carModels as $key=>$carModel)
            <option value="{{$key}}">{{$carModel}}</option>
        @endforeach
    </select>
</div>
<div class="add-more-make">

</div>
<div class="d-flex align-items-center justify-content-end mt-4">
    <button type="button" class="btn btn-outline-primary me-2 add-more-make-btn" style="font-weight: 500;">Add More
        Make
    </button>
    <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            class="btn btn-primary">Save
    </button>
</div>
<script type="text/template" id="form_template">
    <div class="mb-3 make-div">
        <div class="d-flex justify-content-between">
            <label for="" class="form-label">Model</label>
            <button class=" p-0 border-0 delete-make" style="margin-top: -7px; background-color: transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3-fill"
                     viewBox="0 0 16 16">
                    <path
                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                </svg>
            </button>
        </div>
        <select class="form-select form-select " name="car_model[]" id="">
            <option selected>Select Make</option>
            @foreach($carModels as $key=>$carModel)
                <option value="{{$key}}">{{$carModel}}</option>
            @endforeach
        </select>
    </div>
</script>

@section('page-script')
    <script>
        // jQuery document ready function
        $(document).ready(function () {
            console.log(323)
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
