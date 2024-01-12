<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{ asset('theme/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('theme/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('theme/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('theme/vendor/js/menu.js')}}"></script>
<script src="{{ asset('theme/vendor/libs/toastr/toastr.js') }}"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<!-- Main JS -->
<script src="{{ asset('theme/js/main.js')}}"></script>


<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    // new DataTable('#example');
    $(document).ready(function () {
        $('#example').DataTable({
            "paging": true,
            "info": true
        });


    });
</script>
@yield('page-script')
<script>
    $(function() {
        toastr.options = {
            maxOpened: 1,
            autoDismiss: true,
            closeButton: true,
            newestOnTop: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            preventDuplicates: true,
            onclick: null,
            closeDuration: 3000,
            closeMethod: 'fadeOut',
            closeEasing: 'swing',
            timeOut: 3000,
        };
        @if (session('success'))
        toastr.success('{{ session('success') }}', 'Success');
        @endif
        @if ($errors->any())
        toastr.error("{{ $errors->first() }}", 'Error');
        @endif
    });
</script>
