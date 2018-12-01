<!--@extends('layouts.app')-->

<html>
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

            div.UploadFocus
			{
				display: flex; width: 80%; margin-left: 10%; margin-top: 2.5%; margin-bottom: 2.5%; border-radius: 8px; background: #99d9ea;
			}
				div.ReviewData
				{
					width: 50%; margin-top:2.5%; margin-left:3.5%; margin-bottom:2.5%; 
				}
				div.Review
				{
					width: 40%; margin-top:2.5%; margin-bottom:2.5%; margin-right:3.5%; 
				}
			div.BotonRegresar
			{
				width: 50px; height:50px; display:absolute;
			}
			
        </style>
</head>

<body>
	<div class="BotonRegresar">
	<a href="{{ route('home') }}">
		<button class="Butttons" ><<</button>
	</a>
	</div>
	<div class="UploadFocus" >
		<form action="{{ route('upload-games') }}" method="POST">
		@csrf
			<div class="ReviewData">
				<table style="width:100%">	
				<!---->
					<legend><h2>Datos de Videojuego<h2></legend>
					<tr>
						<td><h4>Nombre del Videojuego</h4></td>
						<td colspan="2"><input type="text" name="GameName" style="width:320px"></td>
					</tr>
					<tr>
						<td><h4>Desarrolladora del Videojuego</h4></td>
						<td colspan="2"><input type="text" name="GameDeveloper" style="width:320px"></td>
					</tr>
					<tr>
						<td><h4>Director del Videojuego</h4></td>
						<td colspan="2"><input type="text" name="GameDirector" style="width:320px"></td>
					</tr>
					<!--<tr>
						<td><h4>Fecha de Lanzamiento</h4></td>
						<td colspan="2"><input type="text" name="GameLaunch" style="width:320px"></td>
					</tr>-->
					<tr>
						<td><h4>Categoria de Juego</h4></td>		
						<td colspan="2">
							<select style="width:100%" name="GameCategory">
								@foreach(($Categories= DB::table('categories')->get()) as $Category) 
									<option value="{{ $Category->id }}">{{ $Category->name}}</option>
								@endforeach							
							</select>
						</td>
					</tr>
					<tr>
						<td><br><h4>Sinopsis</h4></td>
					</tr>
					<tr>
						<td colspan="2"><h5>"Favor de dar una sinopsis clara del videojuego del cual se realizara la reseña."</h5></td>
					</tr>
					<tr>
						<td colspan="4"><textarea style="resize: none" name="GameSinopsis"  rows="6" cols="60" placeholder="Maximo 255 caracteres." maxlength="255"></textarea></td>
					</tr>
					<tr>						
						<td>
							<input type="submit" value="Subir Juego">
						</td>
					</tr>
				</table>
			</div>
		</form>
		<div class="Review">
		<form action="{{route('upload-reviews')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<legend><h2>Datos de Review<h2></legend>
			
			<table>
				<tr>
					<td><h4>Categoria de Juego</h4></td>		
					<td>
						<select style="width:100%" name="GameID">
							@foreach(($Games= DB::table('games')->get()) as $Game) 
								<option value="{{ $Game->id }}">{{ $Game->name}}</option>
							@endforeach							
						</select>
					</td>
				</tr>
				<tr>
					<td><h4>Titulo de Review</h4></td>		
					<td>
						<input type="input" name="TitleReview" placeholder="Titulo para el Review.">
						@guest
						
						@else
						<input type="hidden" name="UserReview" value="{{ Auth::user()->id }}">
						@endguest
					</td>
				</tr>
				<tr>
					<td>
					<h4>Sinopsis</h4>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea style="resize: none" name="GameReview" placeholder="Maximo 4000 caracteres." maxlength="4000"  rows="22" cols="48" ></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="file" name="ReviewImages1" accept="image/*">
					</td>
				</tr>
				<tr>
					<td>
						<input type="file" name="ReviewImages2" accept="image/*">
					</td>
				</tr>
				<tr>
					<td>
						<input type="file" name="ReviewImages3" accept="image/*">
					</td>
				</tr>
				<tr>
					<td>
						<input type="file" name="ReviewImages4" accept="image/*">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Subir Review">
					</td>
				</tr>
			</table>
			</div>
		</form>
	</div>
</body>
</html>