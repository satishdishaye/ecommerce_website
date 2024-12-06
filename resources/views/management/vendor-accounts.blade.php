<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row ">
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h4 class="page-title">Portal Staff Member </h4>
                            <p>Manage Ai Astrology Portal Staff Profiles.</p>
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
                            <a type="button" class="btn btn-theme" data-bs-toggle="collapse" href="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="ti ti-plus "></i>Add New Staff </a>
                            
                        </li>
                    </ul>
                </div><!--end col-->

              
            </div>
            
            <div class="row collapse show" id="collapseFilter">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Staff </h4>
                        </div><!--end card-header-->
                        <div class="card-body">    
                            <form class="">
                                <div class="row">
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Register Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="reg_date" value="" required>
                                                                                            </div>
                                    </div>
                                    
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Role Name <span class="text-danger">*</span></label>
                                            <select class="form-select" required>
                                                <option value="">Select Role</option>
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
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Name <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Name" class="form-control" name="name" value="" required>
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Designation <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Designation" class="form-control" name="designation" value="" required>
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Mobile No. <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Mobile No." oninput="validateMobile(this)" class="form-control" name="mobile_no" value="" required>
                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Email ID <span class="text-danger">*</span></label>
                                            <input type="email"  placeholder="Enter Email ID" class="form-control" name="email" value="" required>
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" required >
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Work Location <span class="text-danger">*</span></label>
                                            <select class="form-select" name="admin_location" required>
                                                <option value="">Select Location</option>
                                                <option value="Surat" >Surat</option>
                                            </select>
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Address <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Address" class="form-control" name="password" required >
                                              
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Status <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status">
                                                <option value="1" >Enable</option>
                                                <option value="2" >Disable</option>
                                            </select>
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <label class="mb-2">Upload Profile Photo</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="profilephoto" class="form-control">
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
                            <h3 class="card-title">Portal Staff Record</h3>
                            
                        </div><!--end card-header-->
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-soft" id="datatable_custom">
                                    <thead class="thead bg-soft-secondary">
                                      <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email ID</th>
                                        <th>Mobile No.</th>
                                        <th>Role</th>
                                        <th>Designation</th>
                                        <th>Work Location</th>
                                        <th>Status</th>                                                
                                        <th>Reg.Date</th>
                                        <th >Action</th>
                                        <th>Address</th>
                                        
                                            
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td></td>
                                            <td>25 Jun 2024 2:40 PM</td>
                                            <td>June</td>
                                            <td>Salary</td>
                                            <td>Avinash Sharma</td>
                                            <td>121505</td>
                                            <td>1215053456</td>
                                            <td>N/a</td>
                                            <td >                                                       
                                                 <a type="button" data-bs-toggle="modal" data-bs-target="#update-staff"><i class="las la-pen text-success  font-18"></i></a>
                                                 <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                                             </td>
                                            <td>N/A</td>
                                           
                                             
                                            
                                        </tr>
                                                                                                                    
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