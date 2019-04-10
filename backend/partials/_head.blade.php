    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App">
    <meta name="keywords" content="dashboard, six, media">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Six Media | Dashboard | @yield('dashTitle') </title>
    <!-- =============== VENDOR STYLES ===============-->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('dash/css/custom.css') }}"> 

    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/%40fortawesome/fontawesome-free/css/brands.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/%40fortawesome/fontawesome-free/css/regular.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/%40fortawesome/fontawesome-free/css/solid.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/%40fortawesome/fontawesome-free/css/fontawesome.css') }}">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/simple-line-icons/css/simple-line-icons.css') }}">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/animate.css/animate.css') }}">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/whirl/dist/whirl.css') }}">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- WEATHER ICONS-->
    <link rel="stylesheet" href="{{ URL::asset('dash/vendor/weather-icons/css/weather-icons.css') }}">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ URL::asset('dash/css/bootstrap.css') }}">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ URL::asset('dash/css/app.css') }}">
   

    @yield('styles')
   