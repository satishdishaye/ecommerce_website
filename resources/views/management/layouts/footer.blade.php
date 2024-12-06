<!--Start Footer-->
                <div id="loader" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);">
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin:auto; background:none; display:block;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" fill="none" stroke="#3498db" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                        </circle>
                    </svg>
                </div>
                <!-- Footer Start -->
                <footer class="footer text-center text-sm-start">
                    Copyright &copy; 2024 Sozomo Management. All Rights Reserved. <span class="text-muted d-none d-sm-inline-block float-end">Design & Developed by  <a href="https://www.sozomo.com/" target="_blank" class="text-danger">Sozomo Tech</a></span>
                </footer>
                <!-- end Footer -->                
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- Javascript  -->  
        <!-- vendor js -->
        <script src="{{ url('management/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('management/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ url('management/assets/libs/feather-icons/feather.min.js') }}"></script>
        
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
        
        <script src="{{ url('management/assets/js/pages/custom-datatable.init.js') }}"></script>
        
        <script src="{{ url('management/assets/libs/mobius1-selectr/selectr.min.js') }}"></script>
        <script src="{{ url('management/assets/js/pages/forms-advanced.js') }}"></script>

        <script src="{{ url('management/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- App js -->
        <script src="{{ url('management/assets/js/app.js') }}"></script>
        
        <!--Strong validations-->
        
        <script>
                function validateMobile(input) {
                    // Remove non-numeric characters
                    input.value = input.value.replace(/\D/g, '');
                    if (input.value.length > 10) {
                        input.value = input.value.slice(0, 10); // Truncate to 10 digits
                    }
                    if (input.value.length < 10) {
                        $('#mobile_number').text('Enter 10 Digits');
                    }
                    if (input.value.length == 10) {
                        $('#mobile_number').text('');
                    }
                }
        </script>
        <script>
                function validatePincode(input) {
                    // Remove non-numeric characters
                    input.value = input.value.replace(/\D/g, '');
                    if (input.value.length > 6) {
                        input.value = input.value.slice(0, 6); // Truncate to 10 digits
                    }
                    if (input.value.length < 6) {
                        $('#pincode').text('Enter 6 Digits');
                    }
                    if (input.value.length == 6) {
                        $('#pincode').text('');
                    }
                }
        </script>
        <script>
                function validateNumber(input) {
                    // Remove non-numeric characters
                    input.value = input.value.replace(/\D/g, '');
                }
        </script>

        <!-- SweetAlert script to show success -->
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}"
                    });
                });
            </script>
        @endif

        <!-- SweetAlert script to show error -->
        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: "{{ session('error') }}"
                    });
                });
            </script>
        @endif

        
        
        <!--Dashboard Chart-->
        <script>
        var options = {
                    chart: {
                        height: 455,
                        type: "donut"
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: "85%"
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ["transparent"]
                    },
                    series:[{{ session('PerReadyToPickup', 0) }},
                            {{ session('PerTotalIntransist', 0) }},
                            {{ session('PerTotalOutFDelivery', 0) }},
                            {{ session('PertotalOtpFailed', 0) }},
                            {{ session('PertotalDelivered', 0) }},
                            {{ session('PertotalCollected', 0) }},
                            {{ session('PertotalReturnIntransist', 0) }},
                            {{ session('PertotalRTOReturn', 0) }},
                            {{ session('PertotalNDR', 0) }},
                            {{ session('PertotalCancelled', 0) }},
                            {{ session('PertotalClosed', 0) }},
                            {{ session('PertotalLost', 0) }}],
                    legend: {
                        show: true,
                        position: "bottom",
                        horizontalAlign: "center",
                        verticalAlign: "middle",
                        floating: false,
                        fontSize: "13px",
                        offsetX: 0,
                        offsetY: 0
                    },
                    labels: ["Ready to Pickup", "In-Transit", "Out for Delivery", "OTP Verification Failed", "Delivered", "Collected", "Return in Transit", "RTO", "NDR", "Cancelled", "Closed", "Lost"],
                    colors: ["#82b1ff", "#a5d6a7", "#ffd180", "#ef9a9a", "#ce93d8", "#fff59d", "#a1887f", "#90a4ae", "#f48fb1", "#bdbdbd", "#80deea", "#ffab91"],
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            plotOptions: {
                                pie: {
                                    customScale: 0.2
                                }
                            },
                            chart: {
                                height: 240
                            },
                            legend: {
                                show: false
                            }
                        }
                    }],
                    tooltip: {
                        y: {
                            formatter: function(value) {
                                return value + " %";
                            }
                        }
                    }
                };
        
                var chart = new ApexCharts(document.querySelector("#ana_device"), options);
        
        
        window.addEventListener("DOMContentLoaded", t => {
            chart.render()
        });
        </script>
        

    </body>
    <!--end body-->
</html>