<html>
<head>
    <title>App Name - @yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>
<body>
@section('sidebar')
{{--    This is the master sidebar.--}}
{{--    <a href="/logout">logout</a>--}}
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
