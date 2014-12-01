<!DOCTYPE html>
<html>
<head>
<title>CSS Portal - Layout</title>
{{ HTML::style('css/main.css') }}
</head>
<body>
    <div id="sidemenue">
        @yield('sidemenue')
    </div>

    <div id="form">
        @yield('form')
    </div>
</body>
</html>