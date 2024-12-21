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
                            <h4 class="page-title">Coupon Management </h4>
                            <p>Manage Admin Portal Coupons .</p>
                        </li>
                    </ul>
                </div><!--end col-->
                <div class="col-md-6 pt-3">
                    <ul class="list-inline justify-content-end d-flex">
                        <form method="GET" action="{{route('management.coupon')}}">
                        <li class="list-inline-item ">
                            <div class="input-group">                                                
                                <input type="text" id="chat-search" name="search" class="form-control" value="{{request('search')}}" placeholder="Search">
                               <button type="submit" class="btn btn-theme shadow-none"><i class="la la-search"></i></button>
                            </div>
                        </li>
                        </form>
                        <li class="list-inline-item ">
                            <a type="button" class="btn btn-theme" data-bs-toggle="collapse" href="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="ti ti-plus "></i>Add New Coupon </a>
                            
                        </li>
                    </ul>
                </div><!--end col-->

              
            </div>
            
            <div class="row collapse show" id="collapseFilter">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Coupon </h4>
                        </div><!--end card-header-->
                        <div class="card-body">    
                            <form class="" method="POST" action="{{route('management.add-coupon')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                  
                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2"> Coupon Code <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="code" >
                                            @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                                                                            </div>
                                    </div>

                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2"> Discount <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="discount" >
                                            @error('discount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                                                                            </div>
                                    </div>

                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2"> Coupon Type <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="coupon_type" >
                                            @error('coupon_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                                                                            </div>
                                    </div>


                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2"> Coupon Expire Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="expires_at" >
                                            @error('expires_at')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-lg-2">
                                        <div class="mb-3">
                                            <label class="mb-2">Usage Limit<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="usage_limit" >
                                            @error('usage_limit')
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
                            <h3 class="card-title">Portal Coupon Record</h3>
                            
                        </div><!--end card-header-->
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-soft" id="datatable_custom">
                                    <thead class="thead bg-soft-secondary">
                                      <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Discount</th>
                                        <th>Type</th>
                                        <th>Expire Date</th>    
                                        <th>Usage limit</th>    
                                        <th>Usage Count</th>    
                                        <th>Status</th>                                                
                                        <th >Action</th>
                                     
                                            
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$coupon->code}}</td>
                                            <td>{{$coupon->discount}}</td>
                                            <td>{{$coupon->type}}</td>
                                            <td>{{$coupon->expires_at}}</td>
                                            <td>{{$coupon->usage_limit}}</td>
                                            <td>{{$coupon->usage_count}}</td>
                                            <td>@if ($coupon->status==1)
                                                Active
                                                @else
                                               Disable
                                            @endif</td>
                                            <td >                                                       
                                                 <a onclick="update_coupon('{{$coupon->id}}','{{$coupon->code}}','{{$coupon->discount}}','{{$coupon->type}}','{{$coupon->expires_at}}','{{$coupon->usage_limit}}','{{$coupon->status}}')" data-bs-toggle="modal" data-bs-target="#update-staff"><i class="las la-pen text-success  font-18"></i></a>
                                                 <a href="{{ route('management.delete-coupon', ['id' => $coupon->id]) }}">
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
            
    </div>
    <!-- end page content -->
</div>
@extends("management.modals.update-coupon")

@endsection  