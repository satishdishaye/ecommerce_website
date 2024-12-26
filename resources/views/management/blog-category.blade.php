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
                            <h4 class="page-title">Blog Category Management </h4>
                            <p>Manage Admin Portal Blog Categories .</p>
                        </li>
                    </ul>
                </div><!--end col-->
                <div class="col-md-6 pt-3">
                    <ul class="list-inline justify-content-end d-flex">
                        <form method="GET" action="{{route('management.blog-category')}}">
                        <li class="list-inline-item ">
                            <div class="input-group">                                                
                                <input type="text" id="chat-search" name="search" class="form-control" value="{{request('search')}}" placeholder="Search">
                               <button type="submit" class="btn btn-theme shadow-none"><i class="la la-search"></i></button>
                            </div>
                        </li>
                        </form>
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
                            <form class="" method="POST" action="{{route('management.add-blog-category')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                  
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2"> Category Name <span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Enter Name" class="form-control" name="category_name"  value="{{old('category_name')}}">
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
                            <h3 class="card-title">Portal Blog Category Record</h3>
                            
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
                                        @foreach ($all_blog_category as $iAllCategory )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$iAllCategory->category_name}}</td>
                                            <td>@if ($iAllCategory->status==1)
                                                Active
                                                @else
                                               Disable
                                            @endif</td>
                                            <td >                                                       
                                                 <a onclick="update_blog_category('{{$iAllCategory->id}}','{{$iAllCategory->category_name}}','{{$iAllCategory->status}}')" data-bs-toggle="modal" data-bs-target="#update-staff"><i class="las la-pen text-success  font-18"></i></a>
                                                 <a href="{{ route('management.delete-blog-category', ['cat_id' => $iAllCategory->id]) }}">
                                                    <i class="las la-trash-alt text-danger font-18"></i>
                                                </a>                                             </td>  
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
@extends('management.modals.update-blog-category')
@endsection  