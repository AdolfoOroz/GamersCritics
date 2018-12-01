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
			div.SearchResults
			{
				display:flex; 
			}
				div.Categories
				{
					width:20%;text-align: left; background: #7092be; height: 500px;
				}
				div.Results
				{
					width:60%;text-align: left; 
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
	<div class="SearchMethods">
		<table style="width:30%; margin-left:20%">
			<tr>
				<td style="width:10%; height: 50px;">
					Todo
				</td>
				<td style="width:10%; height: 50px;">
					Usuarios
				</td>
				<td style="width:10%; height: 50px;">
					Videojuegos
				</td>
			</tr>
		</table>
	</div>
	<div class="SearchResults">
		<div class="Categories">
			<h2> Categorias </h2>
			<ul>
				<li>Categorias</li>
			</ul>
		</div>		
		<div class="Results">
			<table class="Results" style="width: 100%;">
				<legend><h2>Resultados</h2></legend>
				@if (!empty($reviewsearch))
				@foreach($reviewsearch as $Review) 
				<tr>
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
				</tr>
				@endforeach
				@endif
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
</body>
</html>