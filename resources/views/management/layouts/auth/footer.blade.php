
    <!-- footer start  -->
    <script src="{{ url("management/assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ url("management/assets/libs/simplebar/simplebar.min.js") }}"></script>
    <script src="{{ url("management/assets/libs/feather-icons/feather.min.js") }}"></script>
    <!-- App js -->
    <script src="{{ url("management/assets/js/app.js") }}"></script>
    
    
            
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    
</body>

</html>

<!-- footer end  -->