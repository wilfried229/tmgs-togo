<!DOCTYPE html>
<html>
<!-- Mirrored from light.pinsupreme.com/auth_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 10:01:19 GMT -->

<head>
    <title>{{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="{{env('APP_NAME')}}" name="description">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
        @include('partials.css')
        <style>
            .logo-wx{
                padding: 20px 160px 80px;
                padding-bottom: 40px
            }
        </style>
</head>

<body>
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w wider">
            <div class="logo-wx">
                <a href="#"><img alt="" src="{{asset('logo.jpeg')}}" width="150px"> </a>

            <h6 class="text text-center">Idé-Log</h6>
                <br>

            </div>
            <h4 class="auth-header">Création de compte</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="">Nom et Prénom</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group">
                    <label for=""> Email address</label>

                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for=""> Mot de passe</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="pre-icon os-icon os-icon-fingerprint">

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="">Confirmer le mot de passe</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>
                </div>
                <div class="buttons-w"><button class="btn btn-primary">Créer un compte</button></div>
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <h6> Avez-vous déjà un compte ?</h6>
                    </div>
                    <div class="col-md-4">

                    <a href="{{route('login')}}">Se connecter</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- Mirrored from light.pinsupreme.com/auth_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 10:01:19 GMT -->

</html>
