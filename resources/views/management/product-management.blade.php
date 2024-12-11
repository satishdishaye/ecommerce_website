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
                                            <input type="text" class="form-control" name="price" required>
                                            @error('price')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                                                                            </div>
                                    </div>
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Description <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" name="description"  required>
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
                                                 <a onclick="update_product(
                                                 '{{$iProduct->id}}',
                                                 '{{$iProduct->cat_id}}',
                                                 '{{$iProduct->price}}',
                                                 '{{$iProduct->product_name}}',
                                                  '{{$iProduct->description}}',
                                                   '{{$iProduct->status}}'
                                                 )" data-bs-toggle="modal" data-bs-target="#update-staff"><i class="las la-pen text-success  font-18"></i></a>
                                                 <a href="{{route('management.delete-product',["p_id"=>$iProduct->id])}}"><i class="las la-trash-alt text-danger font-18"></i></a>
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

@extends('management.modals.update-product')
@endsection  