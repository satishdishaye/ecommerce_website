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
                        <label class="mb-2">Market Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="update_market_price" id="update_market_price" required>
                        @error('update_market_price')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                                                                        </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Weight <span class="text-danger">*</span></label>
                        <input type="number"  class="form-control" name="update_weight" id="update_weight" required>
                        @error('update_weight')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Availability (Qty) <span class="text-danger">*</span></label>
                        <input type="number"  class="form-control" name="update_availability" id="update_availability" required>
                        @error('update_availability')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Shipping (Day) <span class="text-danger">*</span></label>
                        <input type="number"  class="form-control" name="update_Shipping" id="update_Shipping" required>
                        @error('update_Shipping')
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


                <div class="col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Description <span class="text-danger">*</span></label>
                        <textarea id="update_description" name="update_description" class="form-control" ></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
             
                


                <div class="col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Information <span class="text-danger">*</span></label>
                        <textarea id="update_information" name="update_information" class="form-control" ></textarea>
                        @error('information')
                            <div class="alert alert-danger">{{ $message }}</div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
  // Declare editor instances globally
  let editorInstanceDescription;
  let editorInstanceInformation;

  // Function to initialize CKEditor instances
  function initEditors() {
    // Initialize the description editor if not already initialized
    if (!editorInstanceDescription) {
      ClassicEditor
        .create(document.querySelector('#update_description'))
        .then(editor => {
          editorInstanceDescription = editor;
          // After initializing, set data immediately
          if (editorInstanceDescription && window.descriptionData) {
            editorInstanceDescription.setData(window.descriptionData);
          }
        })
        .catch(error => {
          console.error('Error initializing editor for description:', error);
        });
    }

    // Initialize the information editor if not already initialized
    if (!editorInstanceInformation) {
      ClassicEditor
        .create(document.querySelector('#update_information'))
        .then(editor => {
          editorInstanceInformation = editor;
          // After initializing, set data immediately
          if (editorInstanceInformation && window.informationData) {
            editorInstanceInformation.setData(window.informationData);
          }
        })
        .catch(error => {
          console.error('Error initializing editor for information:', error);
        });
    }
  }

  // Function to update the product details and initialize editors
  function update_product(id, cat_id, price, product_name, description, information, status, market_price, weight, availability, Shipping) {
    $('#id').val(id);
    $('#update_cat_id').val(cat_id);
    $('#update_price').val(price);
    $('#update_product_name').val(product_name);
    $('#update_status').val(status);
    $('#update_market_price').val(market_price);
    $('#update_weight').val(weight);
    $('#update_availability').val(availability);
    $('#update_Shipping').val(Shipping);

    // Store the description and information data globally to set later
    window.descriptionData = description;
    window.informationData = information;

    // Initialize CKEditor instances if not already initialized
    initEditors();
  }
</script>
