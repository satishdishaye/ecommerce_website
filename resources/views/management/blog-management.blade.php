@extends('management.layouts.app')
@section('content')
<div class="page-wrapper">
<!-- Page Content-->
<div class="page-content-tab">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row ">
         <div class="col-md-6">
            <ul class="list-inline">
               <li class="list-inline-item">
                  <h4 class="page-title">Blog Management</h4>
                  <p>Manage all  blogs .</p>
               </li>
            </ul>
         </div>
         <!--end col-->
         <div class="col-md-6 pt-3">
            <ul class="list-inline justify-content-end d-flex">
               <li class="list-inline-item ">
                  <div class="input-group">                                                
                     <input type="text" id="chat-search" name="chat-search" class="form-control" placeholder="Search">
                     <button type="button" class="btn btn-theme shadow-none"><i class="la la-search"></i></button>
                  </div>
               </li>
               <li class="list-inline-item ">
                  <a type="button" class="btn btn-theme" data-bs-toggle="collapse" href="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="ti ti-plus "></i>Add New Blog </a>
               </li>
            </ul>
         </div>
         <!--end col-->
      </div>
      <div class="row collapse show" id="collapseFilter">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Add New Blog </h4>
               </div>
               <!--end card-header-->
               <div class="card-body">
                  <form method="POST" action="{{ route('management.add-blog') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <div class="col-md-4 col-lg-2">
                           <div class="mb-3">
                              <label class="mb-2">Blog Category <span class="text-danger">*</span></label>
                              <select class="form-select" name="categories" required>
                                 <option value="">Select Category</option>
                                 @foreach ($Category as $iCategory )
                                 <option value="{{$iCategory->id}}"  > {{$iCategory->category_name}} </option>
                                 @endforeach
                              </select>
                              @error('categories')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                           <div class="mb-3">
                              <label class="mb-2">Blog Title <span class="text-danger">*</span></label>
                              <input type="text" placeholder="Enter Name" class="form-control" name="title" value="{{old('title')}}" required>
                              @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                           <div class="mb-3">
                              <label class="mb-2">Author Name <span class="text-danger">*</span></label>
                              <input type="text"  class="form-control" name="author" value="{{old('author')}}" required>
                              @error('author')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                           <div class="mb-3">
                              <label class="mb-2">Tags <span class="text-danger">*</span></label>
                              <input type="text"  class="form-control" name="tags"  value="{{old('tags')}}" required>
                              @error('tags')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                           <label class="mb-2">Upload Blog Photo</label>
                           <div class="input-group mb-3">
                              <input type="file" name="image" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                           <label class="mb-2">Upload Authore Photo</label>
                           <div class="input-group mb-3">
                              <input type="file" name="author_image" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                           <div class="mb-3">
                              <label class="mb-2">Content <span class="text-danger">*</span></label>
                              <textarea id="description" name="content" class="form-control" ></textarea>
                              @error('content')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                        <script>
                           ClassicEditor
                               .create(document.querySelector('#description'))
                               .catch(error => {
                                   console.error(error);
                               });
                        </script>
                        <div class="col-md-6 col-lg-4">
                           <div class="mb-3">
                              <label class="mb-2">excerpt Content <span class="text-danger">*</span></label>
                              <textarea id="information" name="excerpt" class="form-control" ></textarea>
                              @error('excerpt')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                        <script>
                           ClassicEditor
                               .create(document.querySelector('#information'))
                               .catch(error => {
                                   console.error(error);
                               });
                        </script>
                        <div class="col-md-4 col-lg-2">
                           <div class="mb-3">
                              <label class="mb-2">Status <span class="text-danger">*</span></label>
                              <select class="form-select" name="status">
                                 <option value="1" >Enable</option>
                                 <option value="2" >Disable</option>
                              </select>
                              @error('status')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                           <div class="mb-2">
                              <label class="mb-3" ></label>
                              <button type="submit" class="btn mt-1 btn-theme form-control">Add</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <!--end card-body-->
            </div>
            <!--end card-->
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Blog Record</h3>
               </div>
               <!--end card-header-->
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-soft" id="datatable_custom">
                        <thead class="thead bg-soft-secondary">
                           <tr>
                              <th>#</th>
                              <th> Blog Category</th>
                              <th>Blog Title</th>
                              <th>Authore</th>
                              <th>Tags</th>
                              <th>Published_at</th>
                              <th>Status</th>
                              <th >Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($blog as $iblog )
                           <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$iblog->categories}}</td>
                              <td>{{$iblog->title}}</td>
                              <td>{{$iblog->author}}</td>
                              <td>{{$iblog->tags}}</td>
                              <td>{{$iblog->published_at}}</td>
                              <td>@if ($iblog->published_at==1)
                                 Enable
                                 @else
                                 Disable
                                 @endif
                              </td>
                              <td>                                                       
                                <a onclick="update_blog(
                                    '{{ $iblog->id }}',
                                    '{{ addslashes($iblog->categories) }}',
                                    '{{ addslashes($iblog->title) }}',
                                    '{{ addslashes($iblog->author) }}',
                                    '{{ addslashes($iblog->content) }}',
                                    '{{ addslashes($iblog->excerpt) }}',
                                    '{{ addslashes($iblog->tags) }}',
                                    '{{ addslashes($iblog->image) }}',
                                    '{{ addslashes($iblog->author_image) }}'
                                )" data-bs-toggle="modal" data-bs-target="#update-staff">
                                    <i class="las la-pen text-success font-18"></i>
                                </a>
                                <a href="{{ route('management.delete-blog', ['b_id' => $iblog->id]) }}">
                                    <i class="las la-trash-alt text-danger font-18"></i>
                                </a>
                            </td>
                            
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- end page content -->
</div>
@extends('management.modals.update-blog')
@endsection