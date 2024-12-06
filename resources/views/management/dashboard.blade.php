
<!-- @if(empty(session('permissions')->dashboard_view))
        <script type="text/javascript">
            window.location.href = "{{ route('error404') }}";
        </script>
@endif -->
@extends('management.layouts.app')

@section('content')
            <div class="page-wrapper">
                <!-- Page Content-->
                <div class="page-content-tab">
                    <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                            <form class="row row-cols-lg-auto align-items-center" action="{{route('management.dashboard-filter')}}" method="get">
                                <div class="col-12">
                                <label
                                    class="visually-hidden"
                                    for="inlineFormInputGroupUsername"
                                    >Start Date</label
                                >
                                <div class="input-group">
                                    <div class="input-group-text">Start Date</div>
                                    <input
                                    type="date"
                                    name="start_date"
                                    class="form-control"
                                    placeholder="Start Date"
                                    value="{{ request('start_date') }}"
                                    />
                                </div>
                                </div>
                                <div class="col-12">
                                <label
                                    class="visually-hidden"
                                    for="inlineFormInputGroupUsername"
                                    >End Date</label
                                >
                                <div class="input-group">
                                    <div class="input-group-text">End Date</div>
                                    <input
                                    type="date"
                                    name="end_date"
                                    class="form-control"
                                    placeholder="End Date"
                                    value="{{ request('end_date') }}"
                                    />
                                </div>
                                </div>

                                <div class="col-12">
                                <button type="submit" class="btn btn-theme">Apply</button>
                                </div>
                                <div class="col-12">
                                <a href="{{ route('management.dashboard')}}" class="btn btn-dark">Reset</a>
                                </div>
                            </form>
                            </div>
                            <h4 class="page-title">
                            Mado Unified Logistic Portal Dashboard
                            </h4>
                        </div>
                        <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <!-- end page title end breadcrumb -->
                    <div class="row mt-5">
                        <div class="col-lg-9">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                       Company Staff
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$TotalVender}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total number of Staff
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"
                                        >
                                        <i
                                            class="ti ti-building font-24 align-self-center text-warning"
                                        ></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 col-lg-4">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                        Total Project
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$TotalManagement}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total number of Project
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"
                                        >
                                        <i
                                            class="ti ti-chart-bubble font-24 align-self-center text-warning"
                                        ></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 col-lg-4">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                        Total Leads
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$TotalConsignments}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total Leads
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"
                                        >
                                        <i
                                            class="ti ti-box font-24 align-self-center text-warning"
                                        ></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 col-lg-3">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                        Ready to Pickup
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$ReadyToPickup}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total number of shipments in ready to pickup state
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md mx-auto"
                                        >
                                        <img
                                            src="assets/images/Dashboard-images/d1.png"
                                            height="45"
                                            alt=""
                                            class="mb-2"
                                        />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->

                          
                            
                            <!--end col-->
                            <div class="col-md-6 col-lg-3">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                        Cancelled
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$totalCancelled}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total number of shipments in cancelled state
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md mx-auto"
                                        >
                                        <img
                                            src="assets/images/Dashboard-images/d10.png"
                                            height="45"
                                            alt=""
                                            class="mb-2"
                                        />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 col-lg-3">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                        Closed
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$totalClosed}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total number of shipments in closed state
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md mx-auto"
                                        >
                                        <img
                                            src="assets/images/Dashboard-images/d11.png"
                                            height="45"
                                            alt=""
                                            class="mb-2"
                                        />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 col-lg-3">
                            <a href="#" target="_blank">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">
                                        LOST
                                        </p>
                                        <h3 class="my-1 font-20 fw-bold">{{$totalLost}}</h3>
                                        <p class="mb-0 text-muted">
                                        Total number of shipments in lost state
                                        </p>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                        class="d-flex justify-content-center align-items-center thumb-md mx-auto"
                                        >
                                        <img
                                            src="assets/images/Dashboard-images/d12.png"
                                            height="45"
                                            alt=""
                                            class="mb-2"
                                        />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                                </div>
                                <!--end card-->
                            </a>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        </div>
                        <!--end col-->
                        <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                <h4 class="card-title">Major Status Chart</h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto"></div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                            <div class="text-center">
                                <div id="ana_device" class="apex-charts"></div>
                                <h6 class="bg-light-alt py-3 px-2 mb-0">
                                <i
                                    data-feather="calendar"
                                    class="align-self-center icon-xs me-1"
                                ></i>
                                {{ request('start_date') == '' ? '01-04-2024' : request('start_date') }}  to  {{ request('end_date') == '' ? date('d-m-Y') : request('end_date') }}       
                                </h6>
                            </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    </div>
                    <!-- container -->
                    


                  
               
@endsection  