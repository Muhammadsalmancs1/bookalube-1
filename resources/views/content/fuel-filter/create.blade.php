<div class="card">
    <h5 class="card-header">Fuel Filter</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('catalog.fuel-filters.store') }}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="mb-3 col-lg-6">
                <!-- <label class="form-label" for="basic-default-fullname">Name</label> -->
                <input type="text" class="form-control" name="name" id="basic-default-fullname"
                       placeholder="Enter Name"/>
            </div>
            <div class="mb-3 col-lg-6">
                <!-- <label class="form-label" for="basic-default-fullname">Name</label> -->
                <input type="number" class="form-control" name="price" id="basic-default-fullname"
                       placeholder="Enter Price"/>
            </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

