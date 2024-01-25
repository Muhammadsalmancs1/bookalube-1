<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- style -->
    <link rel="stylesheet" href="{{asset('auth/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('auth/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('auth/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/libs/toastr/toastr.css') }}" />
    <title>@yield('page_title')</title>
</head>

<body>
<div class="container body-conatiner">
    @yield('content')
</div>

<!-- Jquery -->
<script src="{{ asset('theme/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('theme/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('theme/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('theme/vendor/js/menu.js')}}"></script>
<script src="{{ asset('theme/vendor/libs/toastr/toastr.js') }}"></script>

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
<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- bootstrap5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>


</body>

</html>
