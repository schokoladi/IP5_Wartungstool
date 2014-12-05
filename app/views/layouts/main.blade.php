<!DOCTYPE html>
<html>
<head>
<title>CSS Portal - Layout</title>
{{ HTML::style('css/main.css') }}
</head>
<body>
    <div id="headerwrap">
        <div id="header"></div>
    </div>
    <div id="navigationwrap">
        <div id="navigation">
            Breadcrumbs {{Breadcrumbs::addCrumb('Home', '/');}}
        </div>
    </div>
    <div id="contentwrap">
        <div id="content">
            @yield('content')
        </div>
    </div>
</body>
</html>