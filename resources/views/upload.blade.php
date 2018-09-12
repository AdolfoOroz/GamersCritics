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

            form.UploadFocus
			{
				display: flex; width: 80%; margin-left: 10%; margin-top: 2.5%; margin-bottom: 2.5%; border-radius: 8px; background: #99d9ea;
			}
				div.ReviewData
				{
					width: 55%; margin-top:2.5%; margin-left:5%; margin-bottom:2.5%; 
				}
				div.Review
				{
					width: 40%; margin-top:2.5%; margin-bottom:2.5%; 
				}
				
        </style>
</head>

<body>
	<div>
		<form class="UploadFocus">
			<div class="ReviewData">
				<table style="width:100%">	
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
						<td><h4>Fecha de Lanzamiento</h4></td>
						<td colspan="2"><input type="text" name="GameLaunch" style="width:320px"></td>
					</tr>
					<tr>
						<td><h4>Tags de Juego</h4></td>						
					</tr>
					<tr>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Action">Accion</td>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Terror">Terror</td>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Adventure">Aventura</td>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Anime">Anime</td>
					</tr>
					<tr>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Racing">Carrera</td>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Sport">Deportes</td>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Strategy">Estrategia</td>
						<td Style="width:24%"><input type="checkbox" name="GameTags" value="Indie">Indie</td>
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
				</table>
			</div>
			<div class="Review">
				<h4>Sinopsis</h4>
				<textarea style="resize: none" name="GameReview" placeholder="Maximo 4000 caracteres." maxlength="4000"  rows="37" cols="48" ></textarea>
			</div>
		</form>
	</div>
</body>
</html>