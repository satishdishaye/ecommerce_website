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
                            <h4 class="page-title"> Order Details Management</h4>
                            <p>Manage and monitor all orders Details, ensuring accurate order processing .</p>
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
                            
                           
                            
                        </ul>
                    </div>                            
                </div><!--end col-->
            <!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
    
          
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Orders Details</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable_custom">
                                <thead class="thead bg-soft-secondary">
                                  <tr>
                                    <th>#</th>
                                    <th>order_id</th>
                                    <th>product_id</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>total</th>
                                    <th>created_at</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetail as $iorderDetail )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$iorderDetail->order_id}}</td>
                                        <td>{{$iorderDetail->product_id}}</td>
                                        <td>{{$iorderDetail->product_id}}</td>
                                        <td>{{$iorderDetail->price}}</td>
                                        <td>{{$iorderDetail->total}}</td>
                                        <td>{{$iorderDetail->created_at}}</td>
                                    </tr>
                                                
                                    @endforeach
                                                                                                       
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="modal"  tabindex="-1" id="update-category">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-light">
                  <h5 class="modal-title text-black">Update Order Status</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span> </label>
                        <select required  class="form-select">
                            <option value="1">Booked</option>
                            <option value="2">Shipped</option>
                            <option value="2">Delivered</option>
                            <option value="2">Returned</option>
                            <option value="2">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-theme">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div><!-- container -->

       
        <!--Start Footer-->
        <!-- Footer Start -->
        <footer class="footer text-center text-sm-start">
            Copyright &copy; 2024 AI Astrology. All Rights Reserved. 
        </footer>
        <!-- end Footer -->                
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>


@endsection  
