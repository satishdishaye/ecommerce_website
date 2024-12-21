<div class="modal fade " id="update-staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class=""  method="POST" action="{{route('management.update-category')}}" enctype="multipart/form-data">
            @csrf
      <div class="modal-content ">
        <div class="modal-header bg-light">
          <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">Update Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <p>Update the Data of All Payouts </p> -->
            
            <div class="row">
                <input type="hidden" name="id" id="id">

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Code Name</label>
                        <input type="text" class="form-control" name="update_code" id="update_code">
                        @error('update_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Discount</label>
                        <input type="text" class="form-control" name="update_discount" id="update_discount">
                        @error('update_discount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Coupon Type</label>
                        <input type="text" class="form-control" name="update_coupon_type" id="update_coupon_type">
                        @error('update_coupon_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Expire Date</label>
                        <input type="date" class="form-control" name="update_expire_date" id="update_expire_date">
                        @error('update_expire_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2" for="userpassword">Usage Limit</label>
                        <input type="number" class="form-control" name="update_usage_limit" id="update_usage_limit">
                        @error('update_usage_limit')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

               
               
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <select id="status" name="update_status" class="form-select">
                            <option value="">Select</option>
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>

                        @error('update_status')
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
    function update_coupon(id,code,discount,type,expires_at,usage_limit,status){
      $('#id').val(id);
      $('#update_code').val(code);
      $('#update_discount').val(discount);
      $('#update_coupon_type').val(type);
      $('#update_expire_date').val(expires_at);
      $('#update_usage_limit').val(usage_limit);
      $('#status').val(status);
    }
</script>

