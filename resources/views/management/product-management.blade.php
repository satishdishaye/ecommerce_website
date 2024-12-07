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
                            <h4 class="page-title">Product Management</h4>
                            <p>Manage The Product .</p>
                        </li>
                    </ul>
                </div><!--end col-->
                <div class="col-md-6 pt-3">
                    <ul class="list-inline justify-content-end d-flex">

                        <li class="list-inline-item ">
                            <div class="input-group">                                                
                                <input type="text" id="chat-search" name="chat-search" class="form-control" placeholder="Search">
                               <button type="button" class="btn btn-theme shadow-none"><i class="la la-search"></i></button>
                            </div>
                        </li>
                          
                        <li class="list-inline-item ">
                            <a type="button" class="btn btn-theme" data-bs-toggle="collapse" href="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="ti ti-plus "></i>Add New Product </a>
                            
                        </li>
                    </ul>
                </div><!--end col-->

              
            </div>
            
            <div class="row collapse show" id="collapseFilter">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Product </h4>
                        </div><!--end card-header-->
                        <div class="card-body">    
                            <form method="POST" action="{{ route('management.add-product') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                            
                                    
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Product Category <span class="text-danger">*</span></label>
                                            <select class="form-select" name="cat_id" required>
                                                <option value="">Select Category</option>
                                                @foreach ($Category as $iCategory )
                                                <option value="{{$iCategory->id}}"  > {{$iCategory->category_name}} </option>
                                                @endforeach
                                            </select>

                                            @error('cat_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Product Name <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Name" class="form-control" name="product_name" value="" required>
                                            @error('product_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Price <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Designation" class="form-control" name="price" required>
                                            @error('price')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Description <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Mobile No." oninput="validateMobile(this)" class="form-control" name="description"  required>
                                            @error('description')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            </div>
                                    </div>
                                   
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
                                        <label class="mb-2">Upload Product Photo</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="product_image" class="form-control">
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
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div>
            </div>  
              
        
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Record</h3>
                            
                        </div><!--end card-header-->
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-soft" id="datatable_custom">
                                    <thead class="thead bg-soft-secondary">
                                      <tr>
                                        <th>#</th>
                                        <th> Category Name</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Status</th>                                                
                                        <th >Action</th>   
                                      </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($Product as $iProduct )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{optional($iProduct->category)->category_name}}</td>
                                            <td>{{$iProduct->price}}</td>   
                                            <td>{{$iProduct->product_name}}</td>
                                            <td>{{$iProduct->description}}</td>
                                            <td>@if ($iProduct->status==1)
                                                        Enable
                                                @else
                                                        Disable
                                                @endif
                                            </td>
                                            <td >                                                       
                                                 <a type="button" data-bs-toggle="modal" data-bs-target="#update-staff"><i class="las la-pen text-success  font-18"></i></a>
                                                 <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                                             </td>
                                           
                                           
                                             
                                            
                                        </tr> 
                                        @endforeach
                                       
                                                                                                                    
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            
            <div class="modal fade " id="update-staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <form class="">
                  <div class="modal-content ">
                    <div class="modal-header bg-light">
                      <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">Update Staff Profile</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <p>Update the Data of All Payouts </p> -->
                        
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Register Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="reg_date" name="reg_date" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Role Name <span class="text-danger">*</span></label>
                                    <select  id="role_id" name="role_id" class="form-select" required>
                                                                                                    <option value="5"  >
                                                OFFICE STAFF 
                                            </option>
                                                                                                    <option value="2"  >
                                                Sub Admin
                                            </option>
                                                                                                    <option value="1"  >
                                                Super Admin
                                            </option>
                                                                                            </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="mid" name="mid" >
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Name" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Designation <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Designation" class="form-control" id="designation" name="designation" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Mobile No. <span class="text-danger">*</span></label>
                                    <input type="number" oninput="validateMobile(this)" placeholder="Enter Mobile No." class="form-control" id="mobile_no" name="mobile_no" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Email ID <span class="text-danger">*</span></label>
                                    <input type="email" placeholder="Enter Email ID" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2" for="userpassword">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2" for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Work Location <span class="text-danger">*</span></label>
                                    <select id="admin_location" class="form-select" name="admin_location" required>
                                    <option value="">Select Location</option>
                                     <option value="Surat">Surat</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="1">Enable</option>
                                        <option value="2">Disable</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-lg-6">
                                <label class="mb-2">Upload Profile Photo</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="profilephoto" id="admin_image" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
    
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

       
        <!--Start Footer-->
        <!-- Footer Start -->
        <footer class="footer text-center text-sm-start">
             Copyright &copy; 2024 Ai Astrology. All Rights Reserved. 
        </footer>
        <!-- end Footer -->                
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>


@endsection  