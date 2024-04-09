<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ $favicon}}">
    <link rel="canonical" href="@yield('canonical')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">

    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Website",
          "name": "@yield('title')",
          "url": "/",
          "logo": "@yield('image')"
        }
        </script>
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/images/logo.png">
    <link rel="stylesheet" href="{{ mix('/css/global.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/header.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/common.css') }}" />

    <link rel="stylesheet" href="{{ mix('/css/' . View::getSection('file') . '.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body>
    <div class="wrapper @yield('page')">
        @section('header')
            @include('layouts.header')
        @show
        @yield('content')
        @section('footer')
            @include('layouts.footer')
        @show
    </div>
</body>
<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<script src='/js/app.js'></script>

</html>
