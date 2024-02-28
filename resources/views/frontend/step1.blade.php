@extends('layouts.frontend.app')

@section('template_title')
    Book a Lube
@endsection

@section('content')

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-10 col-md-10 mx-auto mb-2">
                <div class="accordian-head ">
                    <div class="form-number">
                        <span>1</span>/6
                    </div>
                    <h2 class="main-heading text-white text-center mb-0 pb-0">Vehicle Information</h2>
                    <a href="home.html" class="text-decoration-none text-white">Home
                        <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 mx-auto mt-lg-3">
                <form action="{{route('add-vechiles')}}" method="POST">
                    @csrf
                    <div>
                        <!-- accordion -->
                        <div class="accordion" id="accordionExample">

                        </div>

                        <div id="formMain">
                            <div class="form-div" id="formDiv">

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label for="exampleFormControlInput1 " class="form-label mb-0 text-end me-2">Car
                                        Nick Name</label>
                                    <div class="position-relative w-100">
                                        <input type="text" name="car_name[]" class="form-control"
                                               id="exampleFormControlInput1"
                                               placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2">Year</label>
                                    <select id="year-dropdown" name="years[]" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Year</option>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->year}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2">Make</label>
                                    <select id="brand-dropdown" name="brands[]" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Brand</option>
                                    </select>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2">Model</label>
                                    <select id="model-dropdown" name="models[]" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Model</option>
                                    </select>
                                </div>

                                <div class="position-relative">
                                    <div class="mb-3 lube-input lube-input2  ">
                                        <label class="form-label mb-0 text-end me-2">Engine</label>
                                        <select name="engines[]" id="engine-dropdown" class="form-select"
                                                aria-label="Default select example">
                                            <option selected>Select Engine</option>
                                        </select>

                                    </div>
                                    <div class="info-text">
                                        <div class="d-flex align-items-start justify-content-end info-div ms-auto mb-3">
                                            <img src="{{asset('frontend/assets/images/info.svg')}}" alt=""
                                                 class="me-1 pt-1">
                                            <p class="text mb-0 pb-0 text-start ">If engine size is unknown, we will
                                                update your
                                                profile after your first visit</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class=" d-flex align-items-center py-5 justify-content-center mx-auto flex-md-row flex-column">
                        <div class="me-md-2 me-0 mb-md-0 mb-3 btn-div">
                            <button type="button" class="main-btn-blank" id="addMoreBtn">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 5C13.5 4.44772 13.0523 4 12.5 4C11.9477 4 11.5 4.44772 11.5 5V11H5.5C4.94772 11 4.5 11.4477 4.5 12C4.5 12.5523 4.94772 13 5.5 13H11.5V19C11.5 19.5523 11.9477 20 12.5 20C13.0523 20 13.5 19.5523 13.5 19V13H19.5C20.0523 13 20.5 12.5523 20.5 12C20.5 11.4477 20.0523 11 19.5 11H13.5V5Z"/>
                                </svg>
                                Add More
                            </button>
                        </div>
                        <div class="btn-div">
                            <button type="submit" class="main-btn2">Submit & Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
