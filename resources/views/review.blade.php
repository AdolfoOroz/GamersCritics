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

            div.Header
            {
                background: #99d9ea; padding: 10px 10px 10px 10px; display: flex;
            }  
                img.imginicio
                {
                    display: block; text-align: left; padding-top: 10px; padding-left: 30px
                }
                div.Search,div.Menu
                {
                    display: inline; text-align: right; padding-top: 30px;
                }
				div.EmptyHead
                {
                    display: block; text-align: center; width: 15%; 
                }
				
			div.GamePreview
				{
					display: flex; width:90%; margin-left: 5%; margin-top: 2.5%; border: 3px; border-style: solid; border-radius: 8px; border-color: #c8bfe7 ; background: #99d9ea;
				}
					div.GameImages
					{
						text-align: center; width: 60%; margin-top:2.5%; margin-bottom: 2.5%; margin-left:2.5%; background: #7092be;
					}
					div.GameData
					{
						text-align: left; width: 30%; height:60%; margin-top:2.5%; margin-bottom: 2.5%; margin-left:2.5%;padding-left:2%; padding-right:1%; border-radius: 8px; background: #7092be; display: block;
					}
					
			div.ReviewData
				{
					display: flex; width:95%; margin-left: 2.5%; height: 400px;  border-radius: 8px; background: #99d9ea; margin-bottom: 1%;
				}
					div.Review
					{
						text-align: left; width: 60%;
					}
        </style>
</head>

<body>
	<div class="Header">
        <img class="imginicio" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="80" width="70">
        <div class="EmptyHead"> </div>
		<div class="Search" style="width:47%">
			<input type="text" name="search" style="width:80%">
			<input type="button" value="Search" name="btnsearch">
		</div>
		<div class="EmptyHead"> </div>
		<div class="Menu">
			<input type="button" value="Profile" name="btnprofile">
			<input type="button" value="Upload" name="btnupload">
			<input type="button" value="Log Out" name="btnlogout">
		</div>
    </div>
	
	<div class="GamePreview">
		<div class="GameImages">
			<div class="BigImage">
				<img src="img/339.png" width="100%" height="300">
			</div>
			<div class="Thumbnails">
				<table style="width: 100%">
					<tr>
						<td style="width:20%">
							<img src="img/aaaaa.jpg" width="100%" height="100" style="padding-left:3px;">
						<td>
						<td>
							<img src="img/aaaaa.jpg" width="100%" height="100" style="padding-left:3px;">
						<td>
						<td>
							<img src="img/aaaaa.jpg" width="100%" height="100" style="padding-left:3px;">
						<td>
						<td>
							<img src="img/aaaaa.jpg" width="100%" height="100" style="padding-left:3px;">
						<td>
						<td>
							<img src="img/aaaaa.jpg" width="100%" height="100" style="padding-left:3px;">
						<td>
					</tr>
				</table>
			</div>
		</div>
		<div class="GameData">
			<h2> Nombre del Juego</h2>
			<p>Pequeña reseña del videojuego. Maximo 255 caracteres.</p>			
			<h4> Fecha de Lanzamiento: aaaa </h4>
			<h4> Desarrollador: aaaa </h4>
			<table>
				<legend>Tags</legend>
				<tr>
					<td>AAA</td>		
					<td>BBB</td>	
					<td>CCC</td>	
					<td>DDD</td>						
				<tr>
			</table>
		</div>
	</div>
	
	<br>
	
	<div class="ReviewData">
		<div class="Review">
		
		</div>
		<div class="User">
		
		</div>
	</div>
</body>
</html>