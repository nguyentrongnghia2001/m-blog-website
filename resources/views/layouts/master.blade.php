<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Online Store')</title>
    @include('../assets/css')
</head>
<body>
    <!-- header -->
    @include('../layouts/header')
    <!-- header -->
    <!-- main -->
    <!-- custom layout  -->
    @if (isset($viewData["is_layout"]) && $viewData["is_layout"])
        @include('../layouts/custom')
    @endif
    <main class="container my-4">
        @yield('content')
    </main>
    <!-- main -->
    <!-- footer -->
    @include('../layouts/footer')
    <!-- footer -->
    @include('../assets/js')
</body>

</html>
