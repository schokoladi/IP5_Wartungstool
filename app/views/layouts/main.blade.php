<!DOCTYPE html>
<html>
<head>
<title>Wartungstool</title>
{{ HTML::style('css/main.css') }}
{{ HTML::style('css/datepicker.css') }}
{{ HTML::script('js/bootstrap-datepicker.js') }}
</head>
<body>
    <div id="headerwrap">
        <div id="header"></div>
    </div>
    <div id="navigationwrap">
        <div id="navigation">
            @yield("menu")
        </div>
    </div>
    <div id="contentwrap">
        <div id="content">
            @yield('content')
        </div>
    </div>
</body>
</html>