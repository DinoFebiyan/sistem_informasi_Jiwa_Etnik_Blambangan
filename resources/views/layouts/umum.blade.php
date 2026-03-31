<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sanggar Tari Jiwa Etnik Blambangan')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')
</body>
</html>