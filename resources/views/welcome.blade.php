<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                /*color: #636b6f;*/
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            div.IndexAndLogin
            {
                background: #85F0F1; padding: 10px 10px 10px 10px; display: flex;
            }  
                img.imginicio
                {
                    display: block; text-align: left; padding-top: 10px; padding-left: 30px
                }
                div.Login
                {
                    display: inline; text-align: right; padding-top: 15px;
                }
                    td.login
                    {
                        border-left: 15px;
                    }
                div.EmptyHead
                {
                    display: block; text-align: center; width: 40%;
                }
            div.LandingPage
            {
                background: #8585F1; padding: 10px 10px 10px 10px; display: block; text-align: center; padding-bottom: 21px;
            }
                input.LandPageInput
                {
                    width:30%; border: 3px solid blue; border-radius: 8px; height: 20px;
                }
            input.Butttons
            {
                background: #C0A5F5; border: 3px solid blue; width: 30% ; height: 40px;
            }
        </style>
    </head>
    <body>
        <!--
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    --> 
    <div class="IndexAndLogin">
        <img class="imginicio" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="80" width="70">
        <div class="EmptyHead"> </div>
        <div class="Login">
            <table>
                <tr>
                    <td class="login">
                        <div ="User"><b>Correo:</b><input class="LandPageInput" name="user" type="text" style="width: 100%;"></div>
                    </td>
                    <td lass="login">
                        <div ="Password"><b>Contraseña:</b><input class="LandPageInput" name="pass" type="password" style="width: 90%;"></div>
                    </td>
                    <td class="login">
                        <input class="Butttons" type="submit" style="margin-left: 10px; height:100%; width:100%;">
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="LandingPage">
        <h1><b>GamersCritics</b></h1>
        <pre>
            "GamersCritics es una pagina creada por gamers para gamers cuyo enfoque
            es la critica justa y veridica de los videojuegos que tanto amamos"
        </pre>
        <p>Nombre de Usuario</p>
        <input class="LandPageInput" type="text">
        <p>Correo</p>
        <input class="LandPageInput" type="text">
        <p>Contraseña</p>
        <input class="LandPageInput" type="password">
        <br>
        <br>
        <input class="Butttons" type="button" value="Crear Cuenta Nueva">
        <h2>O</h2>
        <input class="Butttons" type="button" value="Entrar como Invitado">
    </div>
    </body>
</html>
