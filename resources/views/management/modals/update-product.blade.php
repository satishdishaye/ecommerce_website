<div class="modal fade " id="update-staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class="" method="POST" action="{{route('management.update-product')}}" enctype="multipart/form-data">

            @csrf
      <div class="modal-content ">
        <div class="modal-header bg-light">
          <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">Update Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <p>Update the Data of All Payouts </p> -->
            
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Product Category <span class="text-danger">*</span></label>
                        <select class="form-select" name="update_cat_id"  id="update_cat_id" required>
                            <option value="">Select Category</option>
                            @foreach ($Category as $iCategory )
                            <option value="{{$iCategory->id}}"  > {{$iCategory->category_name}} </option>
                            @endforeach
                        </select>
                        @error('update_cat_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id" >
                <div class="col-md-4 col-lg-4"> 
                    <div class="mb-3">
                        <label class="mb-2"> Product Name <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Enter Name" class="form-control" id="update_product_name" name="update_product_name" required>

                        @error('update_product_name')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Price <span class="text-danger">*</span></label>
                        <input type="number" oninput="validateMobile(this)" class="form-control" id="update_price" name="update_price" required>
                        @error('update_price')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Description<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="update_description" name="update_description" required>
                        @error('update_description')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
              
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <select id="status" name="update_status" class="form-select">
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                        @error('update_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                </div>
               
                <div class="col-md-4 col-lg-4">
                    <label class="mb-2">Upload Profile Photo</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="update_image" id="update_image" aria-describedby="inputGroupFileAddon03" aria-label="Upload">

                    </div>
                  
                </div>
                
            </div>
          
        </div>

        <div class="modal-footer ">
          <button type="button" class="btn  btn-md btn-de-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn  btn-md btn-theme">Update </button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div><!-- container -->


<script>
    function update_product(id,cat_id,price,product_name,description,status){
      $('#id').val(id);
      $('#update_cat_id').val(cat_id);
      $('#update_price').val(price);
      $('#update_product_name').val(product_name);
      $('#update_description').val(description);
      $('#update_status').val(status);
    }
    </script>