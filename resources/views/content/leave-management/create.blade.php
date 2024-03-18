<div class="card">
    <h5 class="card-header">Leave Management</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('management.leave-managements.store') }}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <!-- <label class="form-label" for="basic-default-fullname">Name</label> -->
                <input type="date" class="form-control" name="leave_date" id="basic-default-fullname" />
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add Leave</button>
            </div>
        </form>
    </div>
</div>

