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
                <!--color: #636b6f;-->
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
                background: #99d9ea; padding: 10px 10px 20px 10px; display: flex;
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
				
			#cf4a {
			  display:center;
			  position:absolute;
			  height:557px;
			  width:60%;
			  margin:0 auto;
			}
				#cf4a img {
				  position:absolute;
				  left:0;
				  -webkit-transition: opacity 1s ease-in-out;
				  -moz-transition: opacity 1s ease-in-out;
				  -o-transition: opacity 1s ease-in-out;
				  transition: opacity 1s ease-in-out;
				}
					#cf4a img:nth-of-type(1){
					  animation-name: cf4FadeInOut;
					animation-timing-function: ease-in-out;
					animation-iteration-count: infinite;
					animation-duration: 16s;
					}
					#cf4a img:nth-of-type(2){
					  animation-name: cf4FadeInOut;
					animation-timing-function: ease-in-out;
					animation-iteration-count: infinite;
					animation-duration: 16s;
					}
					#cf4a img:nth-of-type(3){
					  animation-name: cf4FadeInOut;
					animation-timing-function: ease-in-out;
					animation-iteration-count: infinite;
					animation-duration: 16s;
					}
					#cf4a img:nth-of-type(4){
					  animation-name: cf4FadeInOut;
					animation-timing-function: ease-in-out;
					animation-iteration-count: infinite;
					animation-duration: 16s;
					}

			@keyframes cf4FadeInOut {
			  0% {
				opacity:1;
			  }
			  17% {
				opacity:1;
			  }
			  25% {
				opacity:0;
			  }
			  92% {
				opacity:0;
			  }
			  100% {
				opacity:1;
			  }
			}
				#cf4a img:nth-of-type(1) {
				  animation-delay: 12s;
				}
				#cf4a img:nth-of-type(2) {
				  animation-delay: 8s;
				}
				#cf4a img:nth-of-type(3) {
				  animation-delay: 4s;
				}
				#cf4a img:nth-of-type(4) {
				  animation-delay: 0;
				}
			
			div.Center
			{
				display: flex;
			}
            div.LandingPage
            {
                border-left: 1px;border-radius: 2px; background: #7092be; padding: 10px 10px 10px 10px; display: block; text-align: center; padding-bottom: 21px; width: 40%; height:526px; position: relative; left: 58.4%;
            }
                input#password,input#email,input#name,input#password-confirm
                {
                    width:95%; border: 3px; border-style: solid; border-radius: 8px; border-color: #c8bfe7 ;height: 20px;
                }
				button#Butttons
                {
                    width:90%; border: 3px; border-style: solid; border-radius: 8px; border-color: #c8bfe7 ;
                }
            input.Butttons
            {
                background: #c8bfe7; border: 3px; border-style: solid; border-color: #3f48cc; width: 50% ;
            }
			h5
			{
				margin-bottom:0px;margin-top:15px;
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
        <img class="imginicio" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="70" width="70">
        <div class="EmptyHead"> </div>
        <div class="Login">
            <table>
			@csrf
                <tr>
				<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <td class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>                                
                            </div>
                        </td>
                        <td class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </td>

                        <td class="form-group row"  style="width:10%">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar') }}
                                    </label>
                                </div>
                            </div>
                        </td>

                        <td class="form-group row mb-0">
                            <div>
                                <button id="Butttons" type="submit" class="btn btn-primary" style="width:80%">
                                    {{ __('Iniciar Seccion') }}
                                </button>
                            </div>
                        </td>
						<td>
							@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
							
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
						</td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
	<div class="Center">
		<div id="cf4a">
			<img style="width:100%;height:100%;" src="img/bg1.jpg" />
			<img style="width:100%;height:100%;" src="img/bg2.jpg" />
			<img style="width:100%;height:100%;" src="img/bg3.jpg" />
			<img style="width:100%;height:100%;" src="img/bg4.jpg" />
		</div>
		<div class="LandingPage">
			<h1><b>GamersCritics</b></h1>
			<h4 style="width:80%; margin-left:10%">
"GamersCritics es una pagina creada por gamers para gamers cuyo enfoque es la critica justa y veridica de los videojuegos que tanto amamos"
			</h4>
			 <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <h5 for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Usuario') }}</h5>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <h5 for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</h5>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <h5 for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</h5>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <h5 for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</h5>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <h5 for="profile_picture" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</h5>

                            <div class="col-md-6">
                                <input id="profile_picture" type="file" class="form-control" name="profile_picture" required>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <h5 for="background_picture" class="col-md-4 col-form-label text-md-right">{{ __('Background Picture') }}</h5>

                            <div class="col-md-6">
                                <input id="background_picture" type="file" class="form-control" name="background_picture" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-top:15px;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="Butttons" style=" height: 35px;">
                                    {{ __('Registrar Cuenta') }}
                                </button>
                            </div>
                        </div>
                    </form>
		</div>
	</div>
    </body>
</html>
