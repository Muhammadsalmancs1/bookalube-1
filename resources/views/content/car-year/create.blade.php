<div class="card">
    <h5 class="card-header">Car Year</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('catalog.car-years.store') }}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <!-- <label class="form-label" for="basic-default-fullname">Name</label> -->
                <input type="text" class="form-control" name="year" id="basic-default-fullname"
                       placeholder="Enter Year Name"/>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add Year</button>
            </div>
        </form>
    </div>
</div>

