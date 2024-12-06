@include('management/layouts/auth/header')




<body id="body" class="auth-page card-bg">
   <!-- Log In page -->
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12">
                <div class="card-body p-0">
                    <div class="row d-flex vh-100 align-items-center">
                        <div class="col-md-7 col-xl-7 col-lg-8 d-md-block d-none px-lg-5 py-5 vh-100 d-flex align-items-center" style="background: url('management/assets/images/login-bg.jpg') no-repeat center; background-size: cover;">
                            <div class="accountbg d-flex justify-content-center align-items-center h-100 px-1 px-md-4 "> 
                                <div class="account-title text-white">
                                    <a class='logo logo-admin' href='{{ route('management.login') }}'>
                                        <img src="{{ url( "management/assets/images/worldcheme.png") }}" height="80" alt="logo" class="auth-logo"><span style="font-size: 24px; font-weight: bold;">ADMIN PORTAL</span>
                                    </a>
                                    <div class="card border-0 mt-5 bg-transparent">

                                        <h2 class="mt-3 text-black font-24">Sign up in under 5 minutes & access a suite of CRM services </h2>
                                      
                                        <div class="card-details mt-2">

                                            <div class="d-flex">
                                                <img src="{{ url( "management/assets/images/truck.f06d197b.svg") }}" class="pe-3" alt=""> <h5 class=" text-secondary mt-3">  Ship to 99.5% of India’s population</h5>
                                                  
                                            </div>  
                                            <div class="d-flex">
                                               <img src="{{ url( "management/assets/images/money.0e2d52bb.svg") }}" class="pe-3" alt="">
                                               <h5 class=" text-secondary "> Manage Customer Relationships Efficiently</h5>
                                            </div>
                                            <div class="d-flex">
                                               <img src="{{ url( "management/assets/images/wallet.78cbcd84.svg") }}" class="pe-3" alt="">
                                                <h5 class="text-secondary ">  Automate Your Sales Process</h5>
                                            </div>
                                            <div class="d-flex">
                                               <img src="{{ url( "management/assets/images/cart.999a1ad2.svg") }}" class="pe-3" alt="">
                                                <h5 class="text-secondary "> Secure Data Management</h5>
                                            </div>
                                            <div class="d-flex">
                                               <img src="{{ url( "management/assets/images/box-circle-check.156481ee.svg") }}" class="pe-3" alt="">
                                                <h5 class="text-secondary ">  Customizable Dashboards</h5>
                                            </div>
                                        </div><!--card-detail /div-->
                                        <h5 class="mt-4 text-black font-18">Join the ranks of satisfied businesses who have transformed their customer relationships with our CRM solutions. Start today and see the difference!</h5>


                                        
                                    </div>
                                </div>
                            </div><!--end /div-->
                        </div><!--end col-->
                        <div class="col-md-5 p-0 h-100 col-xl-5 col-lg-4">
                            <div class="div shadow-lg h-100 d-flex w-100 justify-content-center align-items-center">
                            <div class="card w-100 px-md-5   mb-0 border-0">

                                    <div class="card-body  pt-0">
                                        <a class='logo d-md-none  logo-admin'  href='{{ route('management.login') }}'>
                                            <img src="{{ url('management/assets/images/title_icon.png') }}" height="60" alt="logo" class="auth-logo ">
                                        </a>      
                                        <h1 class="mt-4 mt-md-3 mb-1 text-black  fw-semibold ">Welcome Back !</h1>   
                                            <p class="text-muted  mb-3">Sign in to continue to Admin Management.</p>  
                                                                      
                                            <form method="POST" action="{{ route('management.loginPost') }}">
                                                
                                            
                                            @csrf
                                            <!-- Field errors placeholder -->
                                            @if ($errors->any())
                                                <div class="alert alert-danger m-0">
                                                    <ul class="m-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <!-- Common errors placeholder -->
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif


                                            <div class="form-group mt-2 mb-4">
                                                <label class="form-label text-black fw-semibold" for="email">Email Address</label>
                                                <input type="text" class="form-control" id="id" name="email" placeholder="Enter Email Address or Phone Number">                               
                                            </div><!--end form-group--> 
                
                                            <div class="form-group ">
                                                <div class="col justify-content-between w-100 d-flex">
                                                    <label class="form-label text-black fw-semibold" for="userpassword">Password</label>  
                                                    {{-- <a class='text-muted font-13' href='#'><i class="dripicons-lock"></i> Forgot Password?</a>                                     --}}
                                                </div><!--end col--> 
                                                
                                                                                  
                                                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter Account Password">                            
                                            </div><!--end form-group--> 
                
                                           
                
                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <div class="d-grid mt-3">
                                                        <button class="btn btn-theme text-dark" type="submit">Log In <i class="fas fa-arrow-right ms-1"></i></button>
                                                    </div>
                                                </div><!--end col--> 
                                            </div> <!--end form-group-->                           
                                        </form><!--end form-->
                                        <div class="m-3 text-center text-muted">
                                            <p class="mb-0">Copyright © 2024 ERP Management. All Rights Reserved. </p>
                                        </div>
                                       
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- vendor js -->       
        
@include('management/layouts/auth/footer')