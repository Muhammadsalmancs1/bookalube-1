<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Edit Tranmission Oil </h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <form action="{{ route('catalog.tranmission_oil_update') }}" method="POST">
               @csrf
               <input type="hidden" name="id" value="{{$item->id}}">
               <div class="modal-body">
                   <div class="mb-3">
                       <label class="form-label" for="basic-default-fullname">Name</label>
                       <input type="text" class="form-control" name="title" id="basic-default-fullname" placeholder="Edit  Name"
                              value="{{$item->title}}" />
                   </div>
                   <div class="mb-3">
                       <label class="form-label" for="basic-default-fullname">Price</label>
                       <input type="number" class="form-control" name="price" id="basic-default-fullname" placeholder="Edit Price"
                              value="{{$item->price}}" />
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save</button>
               </div>
           </form>
       </div>
   </div>
</div>
