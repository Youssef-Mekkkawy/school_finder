<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.APP_LOCALE = "{{ app()->getLocale() }}";
        window.IS_RTL = {{ app()->getLocale() === 'ar' ? 'true' : 'false' }};
        window.LANG = @json(trans('messages'));
    </script>
    <title>@yield('title', 'SchoolFinder Egypt')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])

    @stack('styles')
</head>

<body>
    @yield('content')
    {{-- <script src="{{ asset('js/helpers.js') }}"></script> --}}
    @vite(['resources/js/helpers.js'])
    @stack('scripts')
</body>

</html>
