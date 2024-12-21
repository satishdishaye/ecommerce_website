@extends('management.layouts.app')

@section('content')

<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">

        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-md-5">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h4 class="page-title">Order Management</h4>
                            <p>Manage and monitor all orders, ensuring accurate order processing .</p>
                        </li>
                    </ul>
                </div><!--end col-->

                <div class="col-md-7 text-end d-flex align-items-center justify-content-start justify-content-md-end">
                    <div class="">
                        <ul class="list-inline d-flex">
                            <li class="list-inline-item">
                                <div class="input-group">                                                
                                    <input type="text" id="chat-search" name="chat-search" class="form-control" placeholder="Search">
                                   <button type="button" class="btn btn-theme shadow-none"><i class="la la-search"></i></button>
                                </div>
                            </li>
                            
                            <li class="list-inline-item  ">
                                <a type="button" class="btn  btn-theme " data-bs-toggle="collapse" href="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter"><i class="ti-plus ti"></i>Filter</a>
                            </li>
                            
                        </ul>
                    </div>                            
                </div><!--end col-->
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div  class="row collapse " id="collapseFilter">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filter Shop Orders Data</h4>
                    </div><!--end card-header-->
                    <div class="card-body">    
                        <form class="">
                            <div class="row">
                               
                                <div class="col-md-4 col-lg-3">
                                    <div class="mb-3">
                                        <label class="mb-2">Product Name</label>
                                        <select id="default" name="status" class="form-select">
                                            <option value="default" >Select</option>
                                            <option value="1">Blue Sapphire Gemstone</option>
                                                                                               
                                        </select>
                                    </div>
                                </div>
                              
                              
                               
                                <div class="col-md-4 col-lg-3">
                                    <div class="mb-3">
                                        <label class="mb-2">Order End Date </label>
                                        <input type="date"    class="form-control" id="">
                                    </div>
                                </div>
                               
                               
                                <div class="col-md-4 col-lg-3">
                                    <div class="mb-3">
                                        <label class="mb-2">Status </label>
                                        <select  class="form-select">
                                            <option value="1">Booked</option>
                                            <option value="2">Shipped</option>
                                            <option value="2">Delivered</option>
                                            <option value="2">Returned</option>
                                            <option value="2">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                    <div class="mb-3">
                                        <label class="mb-2">Payment Mode </label>
                                        <select  class="form-select">
                                            <option value="1">UPI</option>
                                            <option value="2"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col d-flex gap-2 align-items-end">
                                        
                                    <div class="mb-3">

                                        <a href="#" type="submit" class="btn  btn-theme">Apply</a>
                                    </div>
                                    
                                    <div class="mb-3">

                                        <a href="#" type="button" class="btn  btn-dark">Reset</a>
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
                        <h4 class="card-title">Orders Record</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable_custom">
                                <thead class="thead bg-soft-secondary">
                                  <tr>
                                    <th>#</th>
                                    <th>Order By</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>state</th>
                                    <th>Country</th>
                                    <th>PostCode</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Total</th>                                                
                                    <th>Status</th>
                                    <th>View Details</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $allorders as $iallorders )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$iallorders->user_id}}</td>
                                        <td>{{$iallorders->first_name}}</td>
                                        <td>{{$iallorders->last_name}}</td>
                                        <td>{{$iallorders->address}}</td>
                                        <td>{{$iallorders->city}}</td>
                                        <td>{{$iallorders->state}}</td>
                                        <td>{{$iallorders->country}}</td>
                                        <td>{{$iallorders->postcode}}</td>
                                        <td>{{$iallorders->phone}}</td>
                                        <td>{{$iallorders->email}}</td>
                                        <td>{{$iallorders->payment_method}}</td>
                                        <td>{{$iallorders->total}}</td>

                                        <td><span class="badge badge-soft-success">{{$iallorders->status}}</span></td> 
                                        <td >                                                       
                                            <a href="{{route('management.order-details',["order_id"=>$iallorders->id])}}"><i class="las la-pen text-success  font-18"></i></a>
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

    
       
    </div>
    <!-- end page content -->
</div>


@endsection  
