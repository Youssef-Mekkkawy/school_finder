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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/login.css') }}" class="css">
    <style>
        .fbot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            /* background: #111; */
            color: #ccc;
            font-size: 14px;
            border-top: 1px solid #222;
        }

        .fbot a {
            color: #fff;
            text-decoration: none;
            margin-left: 5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.3s;
        }

        .fbot a:hover {
            color: #007bff;
            transform: translateY(-2px);
        }

        .fbot i {
            font-size: 16px;
        }
    </style>
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

    {{-- <div class="foot">© 2026 SchoolFinder Egypt — International Schools Database in Cairo</div>
    --}}
    <div class="foot">
        <span class="dev">
            Developed by
            <a href="https://github.com/youssef-mahmoud" target="_blank">
                Youssef Mahmoud
                <i class="fab fa-github"></i>
            </a>
        </span>

        <span>© {{ date('Y') }} SchoolFinder Egypt. All rights reserved.</span>
    </div>
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
