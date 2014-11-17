<html>
    <head>
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::script('js/bootstrap.min.js'); }}
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>
