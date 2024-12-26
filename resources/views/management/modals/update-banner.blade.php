<div class="modal fade " id="update-staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class=""  method="POST" action="{{route('management.update-banner')}}" enctype="multipart/form-data">
            @csrf
      <div class="modal-content ">
        <div class="modal-header bg-light">
          <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">Update Baneer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <p>Update the Data of All Payouts </p> -->
            
            <div class="row">
                <input type="hidden" name="id" id="id">



                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Banner Type</label>
                        <input type="text" class="form-control" name="update_type" id="update_type"  placeholder="Enter category">
                        @error('update_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Banner Name</label>
                        <input type="text" class="form-control" name="update_name" id="update_name" placeholder="Enter category">
                        @error('update_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 col-lg-6">
                    <label class="mb-2">Upload Product Photo</label>
                    <div class="input-group mb-3">
                        <input type="file" name="update_banner_image" class="form-control">

                    </div>
                </div>
               
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <select id="status" name="status" class="form-select">
                            <option value="">Select</option>
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>

                        @error('status')
                            <div class="text-denger">{{$message}}</div>
                        @enderror
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
    function update_banner(id,type,name,image,status){
      $('#id').val(id);
      $('#update_type').val(type);
      $('#update_name').val(name);
      $('#status').val(status);
    }
    </script>

