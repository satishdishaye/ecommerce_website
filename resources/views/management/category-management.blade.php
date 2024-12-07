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
                            <h4 class="page-title">Category Management </h4>
                            <p>Manage Admin Portal Categories .</p>
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
                            <a type="button" class="btn btn-theme" data-bs-toggle="collapse" href="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="ti ti-plus "></i>Add New Category </a>
                            
                        </li>
                    </ul>
                </div><!--end col-->

              
            </div>
            
            <div class="row collapse show" id="collapseFilter">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Category </h4>
                        </div><!--end card-header-->
                        <div class="card-body">    
                            <form class="" method="POST" action="{{route('management.add-category')}}">
                                @csrf
                                <div class="row">
                                    
                                  
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2"> Category Name <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Name" class="form-control" name="category_name" >
                                            @error('category_name')
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
                            <h3 class="card-title">Portal Category Record</h3>
                            
                        </div><!--end card-header-->
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-soft" id="datatable_custom">
                                    <thead class="thead bg-soft-secondary">
                                      <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>                                                
                                        <th >Action</th>
                                     
                                            
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($AllCategory as $iAllCategory )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$iAllCategory->category_name}}</td>
                                            <td>{{$iAllCategory->status}}</td>
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
                           
                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-2" for="userpassword">Category Name</label>
                                    <input type="text" class="form-control" name="category" id="address" placeholder="Enter category">
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                                    <select id="status" name="status" class="form-select">
                                        <option value="1">Enable</option>
                                        <option value="2">Disable</option>
                                    </select>
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