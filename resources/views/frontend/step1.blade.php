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
                                    <select id="year-dropdown" name="car_year_id[]" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Year</option>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->year}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2" id="brandlebal">Make</label>
                                    <select id="brand-dropdown" name="car_brand_id[]" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Brand</option>
                                    </select>
                                </div>

                                <div class="mb-3 lube-input lube-input2 ">
                                    <label class="form-label mb-0 text-end me-2" id="modellebal">Model</label>
                                    <select id="model-dropdown" name="car_model_id[]" class="form-select"
                                            aria-label="Default select example">
                                        <option selected>Select Model</option>
                                    </select>
                                </div>

                                <div class="position-relative">
                                    <div class="mb-3 lube-input lube-input2  ">
                                        <label class="form-label mb-0 text-end me-2"  id="enginelebal">Engine</label>
                                        <select name="engine_id[]" id="engine-dropdown" class="form-select"
                                                aria-label="Default select example" onchange="litercombination()">
                                            <option selected>Select Engine</option>
                                        </select>

                                    </div>

                                    <div class="position-relative justify-content-center" id="literdev">
                                      <h5>Liter</h5><p id="liter"></p>
                                      <h5>Engine Oil</h5><p id="engineoil"></p>
                                      <h5>Oil Capicity</h5><p id="oilcapicity"></p>
                                      <h5>Oil Plug Torque</h5><p id="oilplug"></p>
                                      <h5>Auto Transmission Fuild</h5><p id="transmission"></p>
                                      <h5>Rear Differential</h5><p id="rear"></p>
                                      <h5>Tansfer Case</h5><p id="tansfer"></p>
                                      <h5>Wheel Torque</h5><p id="wheel"></p>
                                      <h5>Oil Life Instruction</h5><p id="oillife"></p>
                                     




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
                 document.getElementById('brand-dropdown').style.display = 'block';
                 document.getElementById('brandlebal').style.display = 'block';

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
               document.getElementById('model-dropdown').style.display = 'block';
                document.getElementById('modellebal').style.display = 'block';


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
                    document.getElementById('engine-dropdown').style.display = 'block';
            document.getElementById('enginelebal').style.display = 'block';
                    var engineDropdown = e.target.closest('.form-div').querySelector('#engine-dropdown');
                    engineDropdown.innerHTML = '<option selected>Select Engine</option>'; // Reset
                    data.forEach(engine => {
                        $('#engine-dropdown').append('<option value="' + engine?.engine?.id + '">' + engine.engine.name + '</option>');
                    });
                })
                .catch(error => console.error('Error:', error));
        });

         $(document).ready(function(){
            document.getElementById('brand-dropdown').style.display = 'none';
            document.getElementById('brandlebal').style.display = 'none';
            document.getElementById('model-dropdown').style.display = 'none';
            document.getElementById('modellebal').style.display = 'none';
            document.getElementById('engine-dropdown').style.display = 'none';
            document.getElementById('enginelebal').style.display = 'none';
            document.getElementById('literdev').style.display = 'none';


         });
        function litercombination(){
        var year = $('#year-dropdown').val();
        var brand = $('#brand-dropdown').val();
        var model = $('#model-dropdown').val();
        var engine = $('#engine-dropdown').val();
        $.ajax({
        type:'GET',
      url:'get-litercombination',
      data: {

                'year': year,
                'brand': brand,
                'model': model,
                'engine': engine

            },
      datatype:'json',
      contentType: false,

      success:function(response){
        document.getElementById('literdev').style.display = 'block';
       $('#liter').html(response.liter);
       $('#engineoil').html(response.engineoil);
       $('#oilcapicity').html(response.oil_capicity);
       $('#oilplug').html(response.oil_plug_torque);
       $('#transmission').html(response.auto_transimission_fuild);
       $('#rear').html(response.rear_differential);
       $('#tansfer').html(response.Tansfer_case);
       $('#wheel').html(response.wheel_torque);
       $('#oillife').html(response.oil_life_instruction);


      },
      });
    }

    </script>
@endsection
