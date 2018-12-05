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

            
				
				div.MainArticles
				{
					display: flex; width:95%; margin-left: 2.5%; margin-top:1%; border-radius: 8px; background: #99d9ea; margin-bottom:2%;				
				}
					div.TopReviews,div.FriendActions
					{
						width: 48%; margin-left:1%; margin-top: 2.5%; margin-bottom:2%;	
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
		<style>
		div.Header
            {
                background: #99d9ea; padding: 10px 10px 10px 10px; display: flex;
            }  
                img.imginicio
                {
                    display: block; text-align: left; padding-top: 10px; padding-left: 10px
                }
                div.Search
                {
                    display: inline; text-align: right; padding-top: 30px;
                }
				div.Menu
				{
					 display: inline; text-align: right;
				}
				div.EmptyHead
                {
                    display: block; text-align: center; width: 12.5%;
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
	
	<div class="MainArticles">
		<div class="TopReviews">
			<table style="width:100%">
				<legend><h2>Reseñas recientes. @yield('title')</h2></legend>
				@foreach(($Reviews= DB::table('reviews')->select('users.name', 'reviews.title', 'reviews.created_at', 'reviews.id','images.reviewimage')->leftJoin('users','reviews.user_id','=','users.id')->leftJoin('images','reviews.id','=','images.review_id')->groupBy('reviews.id')->take(10)->get()) as $Review) 
				<tr>				
					<td>
					<a href="/reviewpage/{{$Review->id}}">
						<div class="ItemGame">
							<img class="ImgPrev" src="{{Storage::url($Review->reviewimage)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:6px;">	
							<div class="Data">
								<h4>Titulo del Review: {{$Review->title}}</h4>
								<p>Autor: {{$Review->name}}</p>
								<p>Fecha: {{$Review->created_at}}</p>
							</div>
						</div>
					</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div class="FriendActions">
			<table style="width:100%">
				<legend><h2>Actividad recientes.</h2></legend>
				@foreach(($News= DB::table('reviews')->select('users.name', 'reviews.title', 'reviews.created_at', 'reviews.id','images.reviewimage')->leftJoin('befriends','befriends.userbefriends_id','=','reviews.user_id')->leftJoin('users','befriends.userbefriends_id','=','users.id')->leftJoin('images','reviews.id','=','images.review_id')->where('befriends.user_id', Auth::user()->id)->groupBy('reviews.id')->take(5)->get()) as $New) 
				<tr>
					<td>
					<a href="/reviewpage/{{$New->id}}">
						<div class="ItemGame">
							<img class="ImgPrev" src="{{Storage::url($New->reviewimage)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:6px;">	
							<div class="Data">
								<h3>{{$New->name}} ha publicado un review!</h3>
								<h4>Titulo del Review: {{$New->title}}</h4>
								<p>Fecha: {{$New->created_at}}</p>
							</div>
						</div>
					</a>
					</td>
				</tr>
				@endforeach
				@foreach(($News= DB::table('comments')->select('users.name', 'reviews.title', 'comments.created_at', 'reviews.id','images.reviewimage')->leftJoin('befriends','befriends.userbefriends_id','comments.user_id')->leftJoin('users','befriends.userbefriends_id','=','users.id')->leftJoin('reviews','comments.review_id','=','reviews.id')->leftJoin('images','reviews.id','=','images.review_id')->where('befriends.user_id', Auth::user()->id)->groupBy('reviews.id')->take(5)->get()) as $New) 	
				<tr>
					<td>
					<a href="/reviewpage/{{$New->id}}">
						<div class="ItemGame">
							<img class="ImgPrev" src="{{Storage::url($New->reviewimage)}}" alt="HTML 5 Logo" height="100" width="100" style="margin-top:6px;">	
							<div class="Data">
								<h4>{{$New->name}} ha comentado un review!</h4>
								<p>Titulo del Review: {{$New->title}}</p>
								<p>Fecha: {{$New->created_at}}</p>
							</div>
						</div>
					</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>