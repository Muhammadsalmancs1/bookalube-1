<meta charset="utf-8"/>
<meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

<title>@yield('template_title')</title>

<meta name="description" content=""/>

<!-- Favicon -->
<!-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> -->

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"/>

<link rel="stylesheet" href="{{ asset('theme/vendor/fonts/boxicons.css')}}"/>

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('theme/vendor/css/core.css')}}" class="template-customizer-core-css"/>
<link rel="stylesheet" href="{{ asset('theme/vendor/css/theme-default.css')}}" class="template-customizer-theme-css"/>
<link rel="stylesheet" href="{{ asset('theme/css/demo.css')}}"/>

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<!-- Page CSS -->
@yield('page-head')

<!-- Helpers -->
<script src="{{ asset('theme/vendor/js/helpers.js')}}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('theme/js/config.js')}}"></script>
