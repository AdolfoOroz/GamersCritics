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
			div.Introduction
			{
				display: flex;
			}
				div.Wallpaper
				{
					height:50%; width:100%; background-image: url("img/339.png"); background-repeat: no-repeat; background-size: 100% 100%; border: 5px; border-color: #c8bfe7; border-style:solid; border-radius: 2px;
				}
				div.ProfilePic
				{
					height:30%; width:15%;background-image: url("img/aaaaa.jpg"); background-repeat: no-repeat; background-size: 100% 100%; position: absolute; top: 240px; left: 20px; border: 6px; border-color: #c8bfe7; border-style:solid; border-radius: 8px;
				}
				div.Username
				{
					text-align: left; margin-left: 20%;top: 390px; position:absolute; border-bottom: 5px; border-bottom-color: #c8bfe7; border-bottom-style:solid; 
				}
			
			div.UserData
			{
				display: flex; width:100%
			}
				div.ProfileData
				{
					width:30%; text-align: center; background: #7092be; height: 500px;
				}
				div.ItemGame,div.ItemUser
					{
						display:flex; border-bottom: 3px;border-top: 3px; border-color: #3f48cc; border-bottom-style: solid; border-top-style: solid; border-radius: 2px;
					}
					div.Data
					{
						margin-left:15px;
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
	
	<div class="Introduction">
		<div class="Wallpaper"></div>
		<div class="ProfilePic"></div>
		<div class="Username">
			<h1 style="margin-bottom: 0px;">{{$userprofile->name}}</h1>
		</div>
	</div>
	
	<div class="UserData">
		<div class="ProfileData">
			<h2>{{$userprofile->name}}</h2>
			<h3>{{$userprofile->name}}</h3>
			<h3>Fecha de registro: {{$userprofile->created_at}}</h3>
		</div>
		<div class="UserRelated">
			<div class="ProfileInteractions">
				<table style="width:30%; margin-left:5%">
				<tr>
					<td style="width:10%; height: 50px; padding-right: 20px;">
						Reseñas
					</td>
					<td style="width:10%; height: 50px; padding-right: 20px;">
						Seguidores
					</td>
					<td style="width:10%; height: 50px; padding-right: 20px;">
						Siguiendo
					</td>
				</tr>
			</table>
			</div>		
			<div class="ProfileResults">
				<table class="Results" style="width: 100%;">
					<legend><h2>Resultados</h2></legend>
					<tr>
					@foreach(($Reviews= DB::table('reviews')->select('users.name','reviews.created_at', 'reviews.title', 'reviews.created_at', 'reviews.id as idreview','reviews.description','games.name as gamename', 'games.overalreview as littlereview','games.publisher','games.director')->leftJoin('users','reviews.user_id','=','users.id')->leftJoin('games','reviews.game_id','=','games.id')->where('reviews.user_id', $userprofile->id )->get()) as $Review) 
						<td>
							<a href="/reviewpage/{{$Review->idreview}}">
							<div class="ItemGame">
								<img class="ImgPrev" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="100" width="100" style="margin-top:15px;">	
								<div class="Data">
									<h4>{{$Review->title}}</h4>
									<p>Review creado por {{$Review->name}}</p>
									<p>Creado el {{$Review->created_at}}</p>
								</div>
							</div>
							</a>
						</td>
					@endforeach	
					</tr>
					<tr>
						<td>
							<div class="ItemUser">
								<img class="ImgPrev" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="100" width="100" style="margin-top:15px;">	
								<div class="Data">
									<h4>Nombre Usuario</h4>
									<p>Alias</p>
								</div>
							</div>
						</td>
					<tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>