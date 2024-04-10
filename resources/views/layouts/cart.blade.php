<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/import/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/d05d5d7cf6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/import/style.css') }}">
    @yield('addlink')
    
</head>
<body>
    @include('layouts.header')    
    
    <section class="main_content">
        @yield('main')    
    </section>  
    
</body>
</html>
