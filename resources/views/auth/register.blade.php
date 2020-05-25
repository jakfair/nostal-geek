<html>
<head>
    <title>Nostal-Geek @yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>
<body>
<img id="imagedefond" src="/img/fond.png">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="avatar"><img src="/img/avatar.png"/></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-group row">
                            <h1>Inscrivez-vous !</h1>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Entrez votre mail ici !">
                                <div class="icon"><img src="/img/mail.png"/></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Entrez votre MDP ici !">
                                <div class="icon mdp-icon"><img src="/img/passeword.png"/></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Entrez à nouveau votre MDP ici !">
                                <div class="icon mdp-icon"><img src="/img/passeword.png"/></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Entrez votre pseudo !">
                                    <div class="icon"><img src="/img/people.png"/></div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control" name="age" required placeholder="Entrez votre âge !">
                                <div class="icon age-icon"><img src="/img/age.png"/></div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <div class="next"><img src="/img/next.png"/></div>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a id="subscribe-link" href="/login">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
