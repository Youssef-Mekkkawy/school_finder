<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" id="html-root">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.APP_LOCALE = "{{ app()->getLocale() }}";
        window.IS_RTL = {{ app()->getLocale() === 'ar' ? 'true' : 'false' }};
        window.LANG = @json(trans('messages'));
        if (window.APP_LOCALE) localStorage.setItem('sf_locale', window.APP_LOCALE);
    </script>
    <title>@yield('title', 'SchoolFinder Egypt')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" class="css">
    @stack('styles')
</head>

<body>
    @include('partials.nav')
    @yield('content')
    @include('partials.footer')
    @include('partials.toast')

    <script src="{{ asset('js/helpers.js') }}"></script>
    @stack('scripts')
</body>

</html>
