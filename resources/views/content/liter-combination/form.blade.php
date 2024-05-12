<div class="mb-3">
    <div>
        <!-- accordion -->
        <div class="accordion" id="accordionExample">

        </div>
        <div id="formMain">
            <div class="form-div" id="formDiv">
                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Year</label>
                    <select id="year-dropdown" name="car_year_id[]" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Year</option>
                        @foreach($years as $year)
                            <option value="{{$year->id}}">{{$year->year}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Make</label>
                    <select id="brand-dropdown" name="car_brand_id[]" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Brand</option>
                    </select>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Model</label>
                    <select id="model-dropdown" name="car_model_id[]" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Model</option>
                    </select>
                </div>

                <div class="position-relative">
                    <div class="mb-3 lube-input lube-input2  ">
                        <label class="form-label mb-0 text-end me-2">Engine</label>
                        <select name="engine_id[]" id="engine-dropdown" class="form-select"
                                aria-label="Default select example">
                            <option selected>Select Engine</option>
                        </select>

                    </div>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Liter </label>
                    <div class="position-relative w-100">
                        <input type="text" name="liter[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter No.of Liter ">
                    </div>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Engine Oil </label>
                    <div class="position-relative w-100">
                        <input type="text" name="engineoil[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Engine Oil ">
                    </div>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Oil Capicity </label>
                    <div class="position-relative w-100">
                        <input type="text" name="oilcapicity[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter  Oil Capicity ">
                    </div>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Oil Plug Torque </label>
                    <div class="position-relative w-100">
                        <input type="text" name="oilplug[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter oil Plug Torque ">
                    </div>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Automatic Transmission Fuild </label>
                    <div class="position-relative w-100">
                        <input type="text" name="autotransmission[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Automatic Transmission Fuild ">
                    </div>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Rear Differential</label>
                    <div class="position-relative w-100">
                        <input type="text" name="rear[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Rear Differential">
                    </div>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Tansfer Case</label>
                    <div class="position-relative w-100">
                        <input type="text" name="tansfer[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Tansfer Case">
                    </div>
                </div>

                
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Wheel Torque</label>
                    <div class="position-relative w-100">
                        <input type="text" name="wheettorque[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Wheel Torque">
                    </div>
                </div>

                
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Oil Life Instruction</label>
                    <div class="position-relative w-100">
                        <input type="text" name="oillifeinst[]" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Oil Life Instruction">
                    </div>
                </div>

            </div>
        </div>
    </div>
        <div class="d-flex align-items-center justify-content-end mt-4">
            <button type="button" id="addMoreBtn" class="btn btn-outline-primary me-2 add-more-make-btn" style="font-weight: 500;">Add More
                Make
            </button>
            <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-primary">Save
            </button>
        </div>

</div>

@section('page-script')
    <script>
        document.getElementById('addMoreBtn').addEventListener('click', function () {
            var originalDiv = document.getElementById('formDiv');
            var clone = originalDiv.cloneNode(true); // Deep clone the div

            // Optional: Clear the input values in the clone
            clone.querySelectorAll('input, select').forEach(function (input) {
                if (input.tagName === 'INPUT') input.value = '';
                if (input.tagName === 'SELECT') input.selectedIndex = 0;
            });
            // Append the cloned div to formMain
            document.getElementById('formMain').appendChild(clone);
        });

        document.getElementById('formMain').addEventListener('click', function (e) {
            if (e.target.className === 'remove-btn') {
                e.target.parentNode.remove(); // Remove the parent div of the remove button
            }
        });
        $(document).ready(function () {
            // Event listener for the "trash-form" button click
            // Using event delegation for dynamically added elements
            $('body').on('click', '.trash-form', function () {
                // Find the closest ancestor with the class 'accordion-item' and remove it
                $(this).closest('.accordion-item').remove();
            });
        });
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
