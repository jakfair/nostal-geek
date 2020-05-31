<html>
<head>
    <title>Nostal-Geek @yield('title')</title>
    <link rel="shortcut icon" href="/img/logo.png">
    <link href="{{ asset('css/styles.css') }}?v=3" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">

</head>
<body>
<img id="imagedefond" src="/img/fond.png">
@section('sidebar')
{{--    This is the master sidebar.--}}
{{--    <a href="/logout">logout</a>--}}
@show

<div class="container">
    <a id="logo" href="/"><img src="/img/logo.png"></a><br>
    @yield('content')
</div>
<footer>
    <a href="/form/fiche"><img src="/img/upload.png"/></a>
    <a class="profil-link" href="/profil/{{Auth::user()->id}}"><img src="/img/people.png"/></a>
    <a href="/profil/edit/{{Auth::user()->id}}"><img src="/img/settings.png"/></a>
</footer>
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>
