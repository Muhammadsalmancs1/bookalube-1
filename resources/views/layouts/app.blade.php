<!DOCTYPE html>
<html
    lang            = "en"
    class           = "light-style layout-navbar-fixed layout-menu-fixed"
    dir             = "ltr"
    data-theme      = "theme-default"
    data-assets-path= "{{ asset('theme') }}/"
    data-template   = "vertical-menu-template">
<head>
    @include('layouts.include.head')
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @include('layouts.include.aside')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('layouts.include.navbar')
            <!-- / Navbar -->
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                @yield('content')
                <!-- / Content -->
                <!-- Footer -->
                @include('layouts.include.footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
@include('layouts.include.scripts')
</body>
</html>
