<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kemiri Water Solution | Login</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        * {
            margin: 0;
        }

        body, html {
            height: 100%;
        }

        #app {
            background-image: url("{{ asset('/assets/img/login-bg-3.png') }}");
        }

        .image-side {
            background-image: url("{{ asset('/assets/img/login-employee.png') }}")
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
</head>
<body>
    <div id="app">
        <div id="content">
            <div class="row">
                {{-- Vector image on the left side --}}
                <div class="col m6 s0 image-side"></div>

                {{-- Login on the right side --}}
                <div class="col m6 s12 form-side container">
                    <div class="row form-component">
                        <div class="col s12">
                        <img src="{{ asset('/assets/img/logo-kemiri.png') }}" alt="" class="company-logo">
                        </div>
                    </div>
                    <div class="row form-component login-lable">
                        <div class="col s12">
                            <h4>LOGIN</h4>
                        </div>
                    </div>

                    {{-- Login form --}}
                    <div class="row">
                        <form action="" class="col s12">
                            @csrf

                            <div class="input-field">
                                <i class="small material-icons prefix">account_circle</i>
                                <input id="username" name="username" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <i class="small material-icons prefix">vpn_key</i>
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field">
                                <div class="switch">
                                    <label>
                                        Show password
                                        <input type="checkbox" id="togglePassword">
                                        <span class="lever"></span>
                                    </label>
                                </div>
                            </div>

                            <button type="button" class="btn waves-effect waves-light blue darken-2 rounded">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('/assets/js/login.js') }}"></script>
</body>
</html>