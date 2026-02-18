<!DOCTYPE HTML>
<!--
 Alpha by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Alpha by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('/alpha/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flash-messages.css') }}">
</head>

<body class="landing is-preload">
    <x-flash-messages />
    <div id="page-wrapper">

        <!-- Header -->
        @include('alpha.partials.header')

        <!-- Banner -->
        @include('alpha.partials.banner')

        <!-- Main -->
        @include('alpha.partials.main')

        <!-- CTA -->
        @include('alpha.partials.cta')

        <!-- Footer -->
        @include('alpha.partials.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('/alpha/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/alpha/assets/js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('/alpha/assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('/alpha/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('/alpha/assets/js/util.js') }}"></script>
    <script src="{{ asset('/alpha/assets/js/main.js') }}"></script>
    <script>
        document.querySelectorAll('[data-flash]').forEach(el => {
            setTimeout(() => {
                el.style.transition = 'opacity 0.4s'
                el.style.opacity = '0'
                setTimeout(() => el.remove(), 400)
            }, 4000) // ms antes de desaparecer
        })
    </script>
</body>

</html>
