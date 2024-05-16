<div class="mb-3">
    <div>
        <!-- accordion -->
        <div class="accordion" id="accordionExample">

        </div>
        <div id="formMain">
            <div class="form-div" id="formDiv">
                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Service</label>
                    <select  name="service_id" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Service</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Engine Oils</label>
                    <select  name="engine_oil_id" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select engine oil</option>
                        @foreach($engine_oils as $engine_oil)
                            <option value="{{$engine_oil->id}}">{{$engine_oil->name}} ({{$engine_oil->price}})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Percentage</label>
                    <input type="text" id="brand-dropdown" name="percentage" class="form-control">
                    {{-- <select id="brand-dropdown" name="percentage" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select percentage</option>
                        <option value="0.1">10%</option>
                        <option value="0.2">20%</option>
                        <option value="0.3">30%</option>
                    </select> --}}
                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Air Filter</label>
                    <select  name="air_filter_id" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Air Filters</option>
                        @foreach($airFilters as $airFilter)
                            <option value="{{$airFilter->id}}">{{$airFilter->name}} ({{$airFilter->price}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Fuel Filter</label>
                    <select  name="fuel_filter_id" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Fuel Filters</option>
                        @foreach($fuelFilters as $fuelFilter)
                            <option value="{{$fuelFilter->id}}">{{$fuelFilter->name}} - ({{$fuelFilter->price}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Oil Filter</label>
                    <select  name="oil_filter_id" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select Oil Filters</option>
                        @foreach($oilFilters as $oilFilter)
                            <option value="{{$oilFilter->id}}">{{$oilFilter->name}} - ({{$oilFilter->price}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Filter Percentage</label>
                    <input type="text" id="brand-dropdown" name="percentagefilter" class="form-control">
                    {{-- <select id="brand-dropdown" name="percentage" class="form-select"
                            aria-label="Default select example">
                        <option selected>Select percentage</option>
                        <option value="0.1">10%</option>
                        <option value="0.2">20%</option>
                        <option value="0.3">30%</option>
                    </select> --}}
                </div>
        

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Air Filter Count</label>
                    <input type="text" id="brand-dropdown" name="airfiltercount" class="form-control">

                </div>

                <div class="mb-3 lube-input lube-input2 ">
                    <label class="form-label mb-0 text-end me-2">Fuel Filter Count</label>
                    <input type="text" id="brand-dropdown" name="fuelfiltercount" class="form-control">

                </div>

          

     
                <div class="mb-3 lube-input lube-input2 ">
                    <label for="exampleFormControlInput1" class="form-label mb-0 text-end me-2">Additional Price </label>
                    <div class="position-relative w-100">
                        <input type="number" name="add_price" class="form-control"
                               id="exampleFormControlInput1"
                               placeholder="Enter Price">
                    </div>
                </div>

            </div>
        </div>
    </div>
        <div class="d-flex align-items-center justify-content-end mt-4">
            <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-primary">Save
            </button>
        </div>

</div>
