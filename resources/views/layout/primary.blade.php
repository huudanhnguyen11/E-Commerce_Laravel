<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('boostrap/bootstrap-5.0.0-beta3/bootstrap-5.0.0-beta3/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('boostrap/bootstrap-icons-1.4.0/bootstrap-icons-1.4.0/bootstrap-icons.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/mainCSS.css') }}">
    <script src="{{ URL::asset ('js/mainWeb.js') }}"></script>

<body>
    <!-- header -->
    @include('layout.header')
    <!-- end header -->
    <!-- nav -->
    @include('layout.navigation')
    <!-- end nav -->
    <div class="body">
        <!-- slider -->
        @include('layout.slider')
        <!-- end slider -->
        @yield('content')
    </div>
    <!-- footer -->
    @include('layout.footer')
    @yield('scripts')
    <!-- end footer -->
</body>

</html>