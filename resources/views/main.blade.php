<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appetiser - @yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    
    @stack('style')

    <script src="{{asset('js/app.js')}}"></script>
    @stack('script')
</head>
    <body>
        @yield('content')
    </body>
</html>