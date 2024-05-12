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
                    <a href="{{route('dashboard')}}" class="text-decoration-none text-white">Home
                        <img src="{{asset('frontend/assets/images/ar.svg')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 mx-auto mt-lg-3">
                <form action="{{route('update.vechiles',$vechiles->id)}}" method="POST">
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
                                        <input type="text" name="car_name" value="{{$vechiles->car_name}}" class="form-control"
                                               id="exampleFormControlInput1"
                                               placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2">Year</label>
                                    <select id="year-dropdown" name="car_year_id" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Year</option>
                                        @foreach($years as $key=>$year)
                                            <option value="{{$year->id}}" {{ $year->id == $vechiles->car_year_id ? 'selected' : '' }}>
                                                {{$year->year}}
                                            </option>
                                        @endforeach
{{--                                        @foreach($years as $year)--}}
{{--                                            <option value="{{$year->id}}">{{$year->year}}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2">Make</label>
                                    <select id="brand-dropdown" name="car_brand_id" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Brand</option>
                                        @foreach($carBrands as $key=>$brand)
                                            <option
                                                value="{{$key}}" {{ $key == $vechiles->car_brand_id ? 'selected' : '' }}>
                                                {{$brand}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2">Model</label>
                                    <select id="model-dropdown" name="car_model_id" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Model</option>
                                        @foreach($carBrands as $key=>$brand)
                                            <option
                                                value="{{$key}}" {{ $key == $vechiles->car_brand_id ? 'selected' : '' }}>
                                                {{$brand}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="position-relative">
                                    <div class="mb-3 lube-input lube-input2  ">
                                        <label class="form-label mb-0 text-end me-2">Engine</label>
                                        <select name="engine_id" id="engine-dropdown" class="form-select"
                                                aria-label="Default select example">
                                            <option selected>Select Engine</option>
                                            @foreach($carEngines as $key=>$model)
                                                <option
                                                    value="{{$key}}" {{ $key == $vechiles->car_model_id ? 'selected' : '' }}>
                                                    {{$model}}
                                                </option>
                                            @endforeach
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
