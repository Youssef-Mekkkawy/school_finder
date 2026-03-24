<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SchoolFinder Egypt</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="{{ asset('css/login.css') }}" class="css">
    @stack('styles')
</head>

<body>

    <!-- NAV -->
    @include('auth.section.nav')

    <!-- MAIN -->
    <div class="main">
        <div class="wrap">
            @include('auth.section.panel')
        </div><!-- end wrap -->
    </div><!-- end main -->

    <div class="foot">© 2026 SchoolFinder Egypt — International Schools Database in Cairo</div>
    <div class="toast" id="toast"></div>

    {{-- Pass Laravel routes to JavaScript --}}
    <script>
        window.ROUTES = {
            login: `{{ route('api.auth.login') }}`,
            adminLogin: "{{ route('api.auth.admin.login') }}",
            register: "{{ route('api.auth.register') }}",
            forgotPassword: "{{ route('api.auth.forgot') }}",
            dashboard: "{{ route('dashboard') }}",
            adminDashboard: "{{ route('admin.dashboard') }}",
        };
    </script>
    <script src="{{ asset('js/login.js') }}"></script>
    @stack('scripts')

</body>

</html>
