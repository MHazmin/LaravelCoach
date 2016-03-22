<!doctype html>
<html>
    <head>
        <title>Laravel 5 Tutorial</title>
    </head>
    <body>
        <h1>This is Content</h1>
        @yield('content')
        <hr>
        @yield('iklan1')
        <hr>
        @section('iklan2')
       
        ruangan untuk iklan
        @show
    </body>
    
</html>