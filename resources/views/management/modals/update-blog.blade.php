<div class="modal fade " id="update-staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class="" method="POST" action="{{route('management.update-blog')}}" enctype="multipart/form-data">

            @csrf
      <div class="modal-content ">
        <div class="modal-header bg-light">
          <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">Update Blog</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <p>Update the Data of All Payouts </p> -->
            
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Blog Category <span class="text-danger">*</span></label>
                        <select class="form-select" name="update_categories"  id="update_categories" required>
                            <option value="">Select Category</option>
                            @foreach ($Category as $iCategory )
                            <option value="{{$iCategory->id}}"  > {{$iCategory->category_name}} </option>
                            @endforeach
                        </select>
                        @error('update_categories')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id" >
                <div class="col-md-4 col-lg-4"> 
                    <div class="mb-3">
                        <label class="mb-2"> Blog Title <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Enter Name" class="form-control" id="update_title" name="update_title" required>

                        @error('update_title')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Authore Name <span class="text-danger">*</span></label>
                        <input type="text"  class="form-control" id="update_author" name="update_author" required>
                        @error('update_author')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Tags <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="update_tags" id="update_tags" required>
                        @error('update_tags')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                                                                        </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Upload Blog Photo <span class="text-danger">*</span></label>
                        <input type="file"  class="form-control" name="update_image" >
                        @error('update_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Upload Authore Photo<span class="text-danger">*</span></label>
                        <input type="file"  class="form-control" name="update_author_image"  >
                        @error('update_author_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

        
                <div class="col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Content <span class="text-danger">*</span></label>
                        <textarea id="update_content" name="update_content" class="form-control" ></textarea>
                        @error('update_content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label class="mb-2">Excerpt Content <span class="text-danger">*</span></label>
                        <textarea id="update_excerpt" name="update_excerpt" class="form-control" ></textarea>
                        @error('update_excerpt')
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
        .create(document.querySelector('#update_content'))
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
        .create(document.querySelector('#update_excerpt'))
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
  function update_blog(id,categories,title,author,content,excerpt,tags,image,author_image) {

    
    $('#id').val(id);
    $('#update_categories').val(categories);
    $('#update_title').val(title);
    $('#update_author').val(author);
    $('#update_tags').val(tags);
   
    // Store the description and information data globally to set later
    window.descriptionData = content;
    window.informationData = excerpt;

    // Initialize CKEditor instances if not already initialized
    initEditors();
  }
</script>
