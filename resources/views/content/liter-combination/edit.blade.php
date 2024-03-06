<div class="modal fade" id="staticBackdrop{{$literCombination->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Combination </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('catalog.liter-combinations.update',$literCombination->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div id="formMain">
                <div class="modal-body form-div" id="formDiv">
                    <div class="mb-3">
                        <label for="" class="form-label">Year</label>
                        <select id="year-dropdown" name="car_year_id" class="form-select">
                            <option>Select Year</option>
                            @foreach($years as $key=>$year)
                                <option value="{{$key}}" {{ $key == $literCombination->car_year_id ? 'selected' : '' }}>
                                    {{$year}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Brand</label>
                        <select id="brand-dropdown" name="car_brand_id" class="form-select">
                            <option>Select Brand</option>
                            @foreach($carBrands as $key=>$brand)
                                <option
                                    value="{{$key}}" {{ $key == $literCombination->car_brand_id ? 'selected' : '' }}>
                                    {{$brand}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0 text-end me-2">Model</label>
                        <select id="model-dropdown" name="car_model_id" class="form-select">
                            <option>Select Model</option>
                            @foreach($carModels as $key=>$model)
                                <option
                                    value="{{$key}}" {{ $key == $literCombination->car_model_id ? 'selected' : '' }}>
                                    {{$model}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0 text-end me-2">Engine</label>
                        <select name="engine_id" id="engine-dropdown" class="form-select">
                            <option>Select Engine</option>
                            @foreach($carEngines as $key=>$engine)
                                <option value="{{$key}}" {{ $key == $literCombination->engine_id ? 'selected' : '' }}>
                                    {{$engine}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0 text-end me-2">Liter</label>
                        <input type="number" name="liter" class="form-control"
                               id="exampleFormControlInput1" value="{{$literCombination->liter}}"
                               placeholder="Enter No.of Liter">
                    </div>
                </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('page-script')
    <script>

        document.getElementById('year-dropdown').addEventListener('change', function (e) {
            var yearId = e.target.value;
            // AJAX call to get brands based on selected year
            fetch(`/get-brands/${yearId}`)
                .then(response => response.json())
                .then(data => {
                    var brandDropdown = e.target.closest('.form-div').querySelector('#brand-dropdown');
                    brandDropdown.innerHTML = '<option selected>Select Brand</option>'; // Reset
                    data.forEach(function (brand) {
                        $('#brand-dropdown').append('<option value="' + brand.car_brand.id + '">' + brand.car_brand.name + '</option>');
                    });
                })
                .catch(error => console.error('Error:', error));
            // Similar blocks can be added for other dropdowns like brand-dropdown to fetch models, etc.
        });

        document.getElementById('brand-dropdown').addEventListener('change', function (e) {
            var brandID = e.target.value; // Get selected year ID
            fetch(`/get-models/${brandID}`)
                .then(response => response.json())
                .then(data => {

                    var modelDropdown = e.target.closest('.form-div').querySelector('#model-dropdown');
                    modelDropdown.innerHTML = '<option selected>Select Model</option>'; // Reset
                    data.forEach(model => {
                        $('#model-dropdown').append('<option value="' + model.car_model.id + '">' + model.car_model.name + '</option>');
                    });
                })
                .catch(error => console.error('Error:', error));
        });

        document.getElementById('model-dropdown').addEventListener('change', function (e) {
            var modelID = e.target.value; // Get selected year ID
            fetch(`/get-engines/${modelID}`)
                .then(response => response.json())
                .then(data => {

                    var engineDropdown = e.target.closest('.form-div').querySelector('#engine-dropdown');
                    engineDropdown.innerHTML = '<option selected>Select Engine</option>'; // Reset
                    data.forEach(engine => {
                        $('#engine-dropdown').append('<option value="' + engine?.engine?.id + '">' + engine.engine.name + '</option>');
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
