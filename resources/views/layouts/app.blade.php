<html>
<head>
    <title>App Name - @yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
    <a href="/logout">logout</a>
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
