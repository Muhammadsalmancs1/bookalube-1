<!DOCTYPE html>
<html
    lang            = "en"
    class           = "light-style layout-navbar-fixed layout-menu-fixed"
    dir             = "ltr"
    data-theme      = "theme-default"
    data-assets-path= "{{ asset('theme') }}/"
    data-template   = "vertical-menu-template">
<head>
    @include('layouts.frontend.include.head')
</head>
<body>
@include('layouts.frontend.include.navbar')

@yield('content')

<!-- / Layout wrapper -->
@include('layouts.frontend.include.scripts')
</body>
</html>
