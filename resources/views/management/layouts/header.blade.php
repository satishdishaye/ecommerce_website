<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8" />
                <title> Admin Management Panel</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta content="" name="description" />
                <meta content="" name="author" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <!-- App favicon -->
                <link rel="shortcut icon" href="{{ url('management/assets/images/title_icon.png') }}">
         <!-- App css -->
         <link href="{{ url('management/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ url('management/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- DataTables -->
        <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        
        
        <link href="{{ url('management/assets/libs/mobius1-selectr/selectr.min.css') }}" rel="stylesheet" type="text/css" />
        

         <link href="{{ url('management/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body id="body" class="enlarge-menu">
        <!-- leftbar-tab-menu -->
        <div class="leftbar-tab-menu">
            <div class="main-icon-menu">
                <a class='logo logo-metrica d-block text-center' href='{{ route('management.dashboard') }}'>
                    <span>
                        <img src="{{ url('management/assets/images/mado.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                </a>
                <div class="main-icon-menu-body">
                    <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                        <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Vendors Management" data-bs-trigger="hover">
                                <a href="#vendorManage" id="vendor-management" class="nav-link">
                                    <i class="ti ti-building menu-icon"></i>
                                </a><!--end nav-link-->
                            </li><!--end nav-item-->

                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Bookings Management" data-bs-trigger="hover">
                                <a href="#bookingManage" id="dashboard-tab" class="nav-link">
                                    <i class="ti ti-box menu-icon"></i>
                                </a><!--end nav-link-->
                            </li><!--end nav-item-->

                       
                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="HR Management" data-bs-trigger="hover">
                                <a href="#hrManage" id="hr-management" class="nav-link">
                                    <i class="ti ti-chart-bubble menu-icon"></i>
                                </a><!--end nav-link-->
                            </li><!--end nav-item-->

                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Company Management" data-bs-trigger="hover">
                                <a href="#compManage" id="company-management" class="nav-link">
                                    <i class="ti ti-dice menu-icon"></i>
                                </a><!--end nav-link-->
                            </li><!--end nav-item-->

                            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Settings" data-bs-trigger="hover">
                                <a href="#settings" id="dashboard-tab" class="nav-link">
                                    <i class="ti ti-adjustments menu-icon"></i>
                                </a><!--end nav-link-->
                            </li><!--end nav-item-->
                            
                        </ul><!--end nav-->
                    </div><!--end /div-->
                </div><!--end main-icon-menu-body-->
                <div class="pro-metrica-end rounded-circle">
                    <a href="#" class="profile">
                        <img src="{{ url('management/assets/images/users/user-4.jpg') }}" alt="profile-user" class="rounded-circle thumb-sm">
                    </a>
                </div><!--end pro-metrica-end-->
            </div>
            <!--end main-icon-menu-->

            <div class="main-menu-inner">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a class='logo' href="{{ route('management.dashboard') }}">
                        <span>
                            <img src="{{ url('management/assets/images/mado.png') }}" alt="logo-large" class="logo-lg logo-dark">
                            <img src="{{ url('management/assets/images/mado.png') }}" alt="logo-large" class="logo-lg logo-light">
                        </span>
                    </a><!--end logo-->
                </div><!--end topbar-left-->
                <!--end logo-->
                <div class="menu-body navbar-vertical tab-content" data-simplebar>
                    <div id="vendorManage" class="main-icon-menu-pane tab-pane" role="tabpanel"
                        aria-labelledby="vendor-management">
                        <div class="title-box">
                            <h6 class="menu-title">Project Management</h6>
                        </div>

                        <ul class="nav flex-column">
                       
                            <li class="nav-item">
                              
                            @if (session('management')->role_id=='1')  <a class='nav-link' href="">Project Panel</a>   @endif
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!-- end Vendors Management -->
                    <div id="bookingManage" class="main-icon-menu-pane tab-pane" role="tabpanel"
                        aria-labelledby="booking-management">
                        <div class="title-box">
                            <h6 class="menu-title">Product Management</h6>
                        </div>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                            @if (session('management')->role_id=='1') <a class='nav-link' href="">Leads Management</a>   @endif
                            </li>
                            <!-- <li class="nav-item">
                                <a class='nav-link' href='#'>Add Cash Booking</a>
                            </li> -->
                            <li class="nav-item">
                                <a class='nav-link' href="">Add - Product</a>
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class='nav-link' href=""> Category Management</a>
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class='nav-link' href=""></a>
                            </li><!--end nav-item-->

                        </ul><!--end nav-->
                    </div><!-- end Bookings Management -->
                    <!-- end COD Invoices & Payments -->

                    <div id="hrManage" class="main-icon-menu-pane tab-pane" role="tabpanel"
                        aria-labelledby="hr-management">
                        <div class="title-box">
                            <h6 class="menu-title">Staff Management</h6>
                        </div>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                            @if (session('management')->role_id=='1')  <a class='nav-link' href=''>Employee</a>   @endif
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class='nav-link' href='#'>Employee</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!-- end HR Management -->

                    <div id="compManage" class="main-icon-menu-pane tab-pane" role="tabpanel"
                        aria-labelledby="company-management">
                        <div class="title-box">
                            <h6 class="menu-title">Company Management</h6>
                        </div>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class='nav-link' href='#'>Office Expenses</a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class='nav-link' href='#'>Announcements</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!-- end Company Management -->

                    <div id="settings" class="main-icon-menu-pane tab-pane" role="tabpanel"
                        aria-labelledby="settings">
                        <div class="title-box">
                            <h6 class="menu-title">Settings</h6>
                        </div>

                        <ul class="nav flex-column">
                           
                            <li class="nav-item">
                                <a class='nav-link' href=''>Project Status</a>
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class='nav-link' href='#'>Roles & Permissions</a>
                            </li><!--end nav-item-->
                        </ul><!--end nav-->
                    </div><!-- end Settings -->

                    
                </div>
                <!--end menu-body-->
            </div><!-- end main-menu-inner-->
        </div>
        <!-- end leftbar-tab-menu-->

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom" id="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img src="{{ url('public/uploads/profile-photo/' . (session('user_photo') ?? 'avatar-1.jpg')) }}" alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                                <div>
                                    <small class="d-none d-md-block font-11">Logged in</small>
                                    <span class="d-none d-md-block fw-semibold font-12"> {{ session('management')->name }} <i
                                            class="mdi mdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href=""><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                            <a class="dropdown-item" href=""><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Change Password</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item text-danger" href="" ><i class="ti ti-power font-Logout16 me-1 align-text-bottom"></i> Logout </a>
                        </div>
                    </li><!--end topbar-profile-->
                </ul><!--end topbar-nav-->
                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                            <i class="ti ti-menu-2"></i>
                        </button>
                    </li>
                    <li>
                        <a class="nav-link arrow-none nav-icon" href="" role="button">
                            <i class="ti ti-home"></i></a>
                    </li>
                   
                     
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
    