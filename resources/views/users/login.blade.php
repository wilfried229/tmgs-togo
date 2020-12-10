<!DOCTYPE html>
<html>
<!-- Mirrored from light.pinsupreme.com/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 10:01:18 GMT -->

<head>
    <title>{{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link href="{{asset('logo.jpeg')}}" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">

    @include('partials.css')

    <style>
        .logo-wx{
            padding: 20px 109px;

            padding-bottom: 60px
        }


@media (min-width: 640px) and (max-width: 1024px)
    {
        .logo-wx{
            padding: 20px 104px;
            padding-bottom: 60px
        }
    }
    </style>
</head>

<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">



        <div class="auth-box-w">
            <div class="logo-wx">
            <a href="#"><img alt="" src="{{asset('logo.jpeg')}}" width="150px"> </a>

            </div>
            <h4 class="auth-header"> Connexion</h4>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    @include('partials.notification')
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="">Nom Utilisateur </label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>



                </div>
                <div class="form-group"><label for="">Mot de passe</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary">Se connecter</button>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember</label></div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-7">
                       {{--  <a href="">Mot de passe oublier ?</a> --}}
                    </div>
                    <div class="col-md-5">

                    {{-- <a href="{{route('register')}}" class="">Créer un compte</a> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- Mirrored from light.pinsupreme.com/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 10:01:19 GMT -->

</html>
