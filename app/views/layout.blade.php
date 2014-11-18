<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/jquery.bootgrid.css'); }}
        {{ HTML::script('js/bootstrap.min.js'); }}
        {{ HTML::script('js/jquery.bootgrid.min.js'); }}
        {{ HTML::script('js/application.js'); }}
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>
