<html>
<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Styles -->
		<script src="{{ asset('js/app.js') }}" defer></script>
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
					height:50%; width:100%; background-repeat: no-repeat; background-size: 100% 100%; border: 5px; border-color: #c8bfe7; border-style:solid; border-radius: 2px;
				}
				div.ProfilePic
				{
					height:30%; width:15%; background-repeat: no-repeat; background-size: 100% 100%; position: absolute; top: 240px; left: 20px; border: 6px; border-color: #c8bfe7; border-style:solid; border-radius: 8px;
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
				div.UserRelated
				{
					width:70%; background: #F8FAFC;
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
	<main class="container" style="width:98%;"> 
@yield('content')
<div class="Header">
	<table>
	<tr>
		<td>
			<a href="/home">
				<img class="imginicio" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="80" width="100">
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
	<div class="Introduction">
		<?php
			$UserProfilepic=$userprofile->profile_pic;
			$url1=Storage::url($UserProfilepic);
			$UserBackgroundpic=$userprofile->background_pic;
			$url2=Storage::url($UserBackgroundpic);
		?>
		<div class="Wallpaper"> <img  width="100%" height="100%" src="{{$url2}}"> </div>
		<div class="ProfilePic"> <img width="100%" height="100%" src="{{$url1}}"> </div>
		<div class="Username">
			<h1 style="margin-bottom: 0px;">{{$userprofile->name}}</h1>
		</div>
	</div>
	
	<div class="UserData">
		<div class="ProfileData" style="padding-top:15px;">
			<h3>Nombre Usuario:{{$userprofile->name}}</h2>
			<h5>Correo:{{$userprofile->email}}</h3>
			<h5>Fecha de registro: {{$userprofile->created_at}}</h3>
			@guest
							
			@else
				@if($userprofile->id!=Auth::user()->id)
				<form action="/profile/{{Auth::user()->id}}/befriends" method="POST">
				@csrf
					<input type="hidden" name="UserBefriends" value="{{$userprofile->id}}">
					<input type="hidden" name="User" value="{{Auth::user()->id}}">
					<input type="submit" value="Seguir Usuario">
				</form>
				@endif
			@endguest
		</div>
		<div class="UserRelated">
			<div class="ProfileInteractions">
				<table style="width:30%; margin-left:5%">
				<tr>
					<td style="width:10%; height: 50px; padding-right: 20px;" id="TodoClick">
						General
					</td>
					<td style="width:10%; height: 50px; padding-right: 20px;" id="ReviewsClick">
						Reseñas
					</td>
					<td style="width:10%; height: 50px; padding-right: 20px;" id="FollowersClick">
						Seguidores
					</td>
					<td style="width:10%; height: 50px; padding-right: 20px;" id="FollowsClick">
						Siguiendo
					</td>
				</tr>
			</table>
			</div>		
			<div class="ProfileResults">
				<table class="Results" style="width: 100%;">
					<legend><h2>Resultados</h2></legend>	
					<div id="UserReviews">
					@foreach(($Reviews= DB::table('reviews')->select('users.name','reviews.created_at', 'reviews.title', 'reviews.created_at', 'reviews.id as idreview','reviews.description','games.name as gamename', 'games.overalreview as littlereview','games.publisher','games.director','images.reviewimage')->leftJoin('users','reviews.user_id','=','users.id')->leftJoin('games','reviews.game_id','=','games.id')->leftjoin('images','images.review_id','reviews.id')->where('reviews.user_id', $userprofile->id )->groupBy('reviews.id')->get()) as $Review) 
					<tr>	
						<td id="ReviesSearch">
							<a href="/reviewpage/{{$Review->idreview}}">
							<div class="ItemGame">
								<img class="ImgPrev" src="{{Storage::url($Review->reviewimage)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:6px;">	
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
					</div>
					<div id="UserFollows">
					@foreach(($usersearch=DB::table('users')->select('users.id','users.name','users.profile_pic','users.email','users.created_at')->leftjoin('befriends','befriends.userbefriends_id','users.id')->where('befriends.user_id','=',$userprofile->id)->get()) as $userF)
					<tr>					
						<td id="FollowsSearch">
							<a href="/profile/{{$userF->id}}">
							<div class="ItemUser">
								<img class="ImgPrev" src="{{Storage::url($userF->profile_pic)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:6px;">	
								<div class="Data">
									<h4>Siguiendo</h4>
									<h4>Nombre Usuario: {{$userF->name}}</h4>
									<h4>Correo: {{$userF->email}}</h4>
									<h4>Subscrito desde: {{$userF->created_at}}</h4>
								</div>
							</div>
							</a>
						</td>
					<tr>
					@endforeach
					</div>
					<div id="UserFollowers">
					@foreach(($usersearch=DB::table('users')->select('users.id','users.name','users.profile_pic','users.email','users.created_at')->leftjoin('befriends','befriends.user_id','users.id')->where('befriends.userbefriends_id','=',$userprofile->id)->get()) as $userF)
					<tr>					
						<td id="FollowersSearch">
						<a href="/profile/{{$userF->id}}">
							<div class="ItemUser">
								<img class="ImgPrev" src="{{Storage::url($userF->profile_pic)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:6px;">	
								<div class="Data">
									<h4>Seguidor</h4>
									<h4>Nombre Usuario: {{$userF->name}}</h4>
									<h4>Correo: {{$userF->email}}</h4>
									<h4>Subscrito desde: {{$userF->created_at}}</h4>
								</div>
							</div>
						</a>
						</td>
					<tr>
					@endforeach
					</div>
				</table>
		<script>
		$(document).ready(function(){
			$('td[id="TodoClick"]').click(function(){
				$('td[id="ReviesSearch"]').show();
				$('td[id="FollowsSearch"]').show();
				$('td[id="FollowersSearch"]').show();
			});
			$('td[id="ReviewsClick"]').click(function(){
				$('td[id="ReviesSearch"]').show();
				$('td[id="FollowsSearch"]').hide();
				$('td[id="FollowersSearch"]').hide();
			});
			$('td[id="FollowsClick"]').click(function(){
				$('td[id="ReviesSearch"]').hide();
				$('td[id="FollowsSearch"]').show();				
				$('td[id="FollowersSearch"]').hide();
			});
			$('td[id="FollowersClick"]').click(function(){
				$('td[id="ReviesSearch"]').hide();
				$('td[id="FollowsSearch"]').hide();				
				$('td[id="FollowersSearch"]').show();
			});
		});
        </script>
			</div>
		</div>
	</div>
</body>
</html>