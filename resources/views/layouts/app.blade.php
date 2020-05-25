<html>
<head>
    <title>Nostal-Geek @yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">

</head>
<body>
@section('sidebar')
{{--    This is the master sidebar.--}}
{{--    <a href="/logout">logout</a>--}}
@show

<div class="container">
    <a id="logo" href="/"><img src="/img/logo.png"></a><br>
    @yield('content')
</div>
<footer>
    <a href="/logout"><img src="/img/logout.png"/></a>
    <a class="profil-link" href="/profil/{{Auth::user()->id}}"><img src="/img/people.png"/></a>
    <a href="#"><img src="/img/settings.png"/></a>
</footer>
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
