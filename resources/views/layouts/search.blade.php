<html>
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
		<script src="{{ asset('js/app.js') }}" defer></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
			td.showdata
			{
				background-color:#FFFFFF;
			}
			td.showdata:hover
			{
				background-color:#CCCCCC;
			}
        </style>
</head>

<body>
	<main class="container" style="width:98%;"> 
@yield('content')
<div class="Header">
	<table>
	<tr>
		<td>
			<a href="/home">
				@php
					$CatURL="/img/aaaaa.jpg";
				@endphp
				<img class="imginicio" src="{{Storage::url($CatURL)}}" alt="HTML 5 Logo" height="80" width="100">
			</a>
		</td>
		<td>
			<h3 style="margin-top:1em;">GamersCritics</h3>
		</td>
	</tr>
	</table>
	<div class="EmptyHead"> </div>
		<div class="Search" style="width:80%">
			<form action="{{ route('search-review') }}" method="GET" >
			@csrf			
				<input type="text" name="search" style="width:80%" placeholder="Buscar Review/Usuario...">
				<input type="submit" value="Buscar">
			</form>
	</div>
	<div class="EmptyHead"> </div>
	<div class="Menu">
		@guest					
		@else
		<table>
			<tr>
				<td>
					<?php
					$UserProfilepic=Auth::user()->profile_pic;
					$url=Storage::url($UserProfilepic);
					?>
					<img width="60px" height="60px" src="{{$url}}">
				</td>
				<td>
					<p>{{Auth::user()->name}}</p>
				</td>
			</tr>
			<tr>
				<td>
					<a href="/profile/{{Auth::user()->id}}">
						<input type="button" value="Profile" name="btnprofile">
					</a>
				</td>
				<td>
					<a href="{{ route('upload') }}">
						<input type="button" value="Upload" name="btnupload">
					</a>
				</td>
				<td>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin: 0px;">
                        @csrf
						<input type="submit" value="Log Out">
                    </form>						
				</td>
			</tr>
		</table>
		@endguest
	</div>
</div>
</main>
	<div class="SearchMethods">
		<table style="width:30%; margin-left:20%">
			<tr>
				<td style="width:10%; height: 50px;" id="TodoClick" class="showdata">
					Todo
				</td>
				<td style="width:10%; height: 50px;" id="ReviewsClick" class="showdata">
					Reviews
				</td>
				<td style="width:10%; height: 50px;" id="UsuariosClick" class="showdata">
					Usuarios
				</td>
			</tr>
		</table>
	</div>
	<div class="SearchResults">
		<div class="Categories">
			<h2> Categorias </h2>
			<ul>
				@foreach(($Games= DB::table('games')->get()) as $Game)
					<form action="{{route('search_game',$Game->id)}}" method="POST">
					@csrf
									<li>
									<input type="hidden" name="GameID" value="{{$Game->id}}">
									<input type="submit" value="{{ $Game->name}}">
									</li>
					</form>
				@endforeach
			</ul>
		</div>		
		<div class="Results">
			<table class="Results" style="width: 100%;">
				<legend><h2>Resultados</h2></legend>
				<div id="ReviesSearch">
				@if (!empty($reviewsearch))
				@foreach($reviewsearch as $Review) 
				<tr>
					<td id="ReviesSearch">
					<a href="/reviewpage/{{$Review->idreview}}">
						<div class="ItemGame">
							<img class="ImgPrev" src="{{Storage::url($Review->reviewimage)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:7px;">	
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
				</div>
				<div id="UserSearch">
				@if (!empty($usersearch))
				@foreach($usersearch as $userF) 
				<tr>
					<td id="UserSearch">
					<a href="/profile/{{$userF->id}}">
						<div class="ItemUser">
							<img class="ImgPrev" src="{{Storage::url($userF->profile_pic)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:15px;">	
							<div class="Data">
								<h4>Nombre Usuario: {{$userF->name}}</h4>
								<h4>Correo: {{$userF->email}}</h4>
								<h4>Subscrito desde: {{$userF->created_at}}
							</div>
						</div>
					</>
					</td>
				<tr>
				@endforeach
				@endif
				</div>
			</table>
			<!-- JQUERY -->
		<script>
		$(document).ready(function(){
			$('td[id="TodoClick"]').click(function(){
				$('td[id="ReviesSearch"]').show();
				$('td[id="UserSearch"]').show();
			});
			$('td[id="ReviewsClick"]').click(function(){
				$('td[id="ReviesSearch"]').show();
				$('td[id="UserSearch"]').hide();
			});
			$('td[id="UsuariosClick"]').click(function(){
				$('td[id="ReviesSearch"]').hide();
				$('td[id="UserSearch"]').show();
			});
		});
        </script>
		</div>
	</div>
</body>
</html>