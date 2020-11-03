<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        {!! Html::style('css/app.css') !!}
    </head>
    <body>
        <p>Layout du site</p>
        @yield('content')
        {!! Html::script('js/app.js') !!}
        @yield('script')
    </body>
</html>
