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
					display: flex; width:95%; margin-left: 2.5%; border-radius: 8px; background: #99d9ea; margin-bottom: 1%;
				}
					div.Review
					{
						text-align: left; width: 60%;
					}
					div.Comentarios
					{
						text-align: left;
					}
        </style>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></script>
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
	<div class="GamePreview">
		<div class="GameImages">
			<div class="BigImage">
				<img id="mainIMG" src="img/339.png" width="100%" height="300">
				<video id="mainVid" src="IMG/img1.png" style="width: 100%; height: 300px; display:none" controls autoplay loop>
			</div>
			<div class="Thumbnails">
				<table style="width: 100%">
					@php
						$CountIMG=1;
						$CountVID=1;
					@endphp
					<tr>
					@foreach(($Images= DB::table('images')->where('images.review_id', $reviewchosen->idreview )->get()) as $Image)
					@php
						$IDIMG="imgM".$CountIMG;
						$CountIMG=$CountIMG+1;
					@endphp
					<td style="width:20%">
							<img id="{{$IDIMG}}" src="{{Storage::url($Image->reviewimage)}}" width="100%" height="100" style="padding-left:3px;">
						<td>
					@endforeach
					</tr>
					<tr style="text-align: center;">
					@foreach(($Videos= DB::table('videos')->where('videos.review_id', $reviewchosen->idreview )->get()) as $Video)
					@php
						$IDVID="vidM".$CountVID;
						$CountVID=$CountVID+1;
					@endphp	
						<td style="width:20%">
							<video id="{{$IDVID}}" src="{{Storage::url($Video->reviewvideo)}}" width="100%" height="100" style="padding-left:3px;"><video>
						<td>
					@endforeach
					</tr>
				</table>
			</div>
		</div>
		<!-- JQUERY -->
		<script>
		$(document).ready(function(){
			$('img[id="imgM1"]').click(function(){
				var trial = $('img[id="imgM1"]').attr('src');
				$('img[id="mainIMG"]').attr("src", trial);
				$('img[id="mainIMG"]').show();
				$('video[id="mainVid"]').hide();
			});
			$('img[id="imgM2"]').click(function(){
				var trial = $('img[id="imgM2"]').attr('src');
				$('img[id="mainIMG"]').attr("src", trial);
				$('img[id="mainIMG"]').show();
				$('video[id="mainVid"]').hide();
			});
			$('img[id="imgM3"]').click(function(){
				var trial = $('img[id="imgM3"]').attr('src');
				$('img[id="mainIMG"]').attr("src", trial);
				$('img[id="mainIMG"]').show();
				$('video[id="mainVid"]').hide();
			});
			$('img[id="imgM4"]').click(function(){
				var trial = $('img[id="imgM4"]').attr('src');
				$('img[id="mainIMG"]').attr("src", trial);
				$('img[id="mainIMG"]').show();
				$('video[id="mainVid"]').hide();
			});
			$('video[id="vidM1"]').click(function(){
				var trial2=$('video[id="vidM1"]').attr('src');
				$('video[id="mainVid"]').attr("src",trial2);
				$('img[id="mainIMG"]').hide();
				$('video[id="mainVid"]').show();
			});
			$('video[id="vidM2"]').click(function(){
				var trial2=$('video[id="vidM1"]').attr('src');
				$('video[id="mainVid"]').attr("src",trial2);
				$('img[id="mainIMG"]').hide();
				$('video[id="mainVid"]').show();
			});
		});
        </script>
		
		<div class="GameData">
			<h2> {{$reviewchosen->gamename}}</h2>
			<p>{{$reviewchosen->littlereview}}</p>			
			<h4> Desarrolladora: {{$reviewchosen->publisher}} </h4>
			<h4> Director: {{$reviewchosen->director}} </h4>
			<h4>Categoria</h4>
		</div>
	</div>
	
	<br>
	
	<div class="ReviewData">
		<div class="Review">
			<table  style="margin-left:2%">
			<tr>
				<td>
				<h2>{{$reviewchosen->title}}</h2>
				<h5>Review creado por {{$reviewchosen->name}}</h5>
				<h5>Creado el {{$reviewchosen->created_at}}</h5>
				
				@php
				$RatingGeneral=0;
				$Counta=0;
				/*
				foreach(($Ratings= DB::table('ratings')->where('ratings.review_id', $reviewchosen->idreview )->get()) as $RatingA)
				{
					$Count=$Count+1;
					$RatingGeneral=$RatingGeneral+$RatingA->rating;
				}
				$RatingGeneral=$RatingGeneral/$Count;
				*/
				@endphp
				@foreach(($Ratings= DB::table('ratings')->select('rating')->where('review_id',$reviewchosen->idreview)->get()) as $RatingA)
				@php
					$RatingGeneral=$RatingGeneral+$RatingA->rating;
					$Counta=$Counta+1;
				@endphp
				@endforeach
				@php
				$RatingMuestra=$RatingGeneral/$Counta;
				@endphp
				<h5>Calificacion General:{{$RatingMuestra}}</h5>
				</td>
			</tr>
			<tr>
				<td>
					<p>{{$reviewchosen->description}}</p>
				</td>
			</tr>
			<form action="/reviewpage/{{$reviewchosen->idreview}}/rating" method="POST">
			@csrf
			<tr>
				<td>
					<h1>Calificar Review</h1>	
				</td>
			</tr>			
			@guest
							
			@else
			@php
			$RatingReviewUser=DB::table('ratings')->select('rating')->where('review_id',$reviewchosen->idreview)->where('user_id',Auth::user()->id)->get();
			if($RatingReviewUser=="[]")
			{
			@endphp
			<tr>
				<td>
					<p>Selecionar Calificacion:<p>
				</td>
				<td>
					<input type="hidden" name="UserRating" value="{{ Auth::user()->id }}">
					<input type="hidden" name="ReviewRating" value="{{$reviewchosen->idreview}}">
					<input type="number" name="NumberRating" min="0" max="5">					
				</td>
				<td>
					<input type="submit" value="Calificar">
				</td>
			</tr>
			@php
			}
			else
			{
			@endphp
			<tr>
				<td>
					<h4>Gracias Por Calificar! </h4>
				</td>
			</tr>
			@php
			}
			@endphp	
			@endguest
			</form>
		</div>
		<br>
		<div class="Comentarios">
			<table style="margin-left:2%">
				<tr>
					<td colspan="2">
						<h2>Comentarios de Usuarios<h2>
					</td>
				</tr>
				@foreach(($Comments= DB::table('comments')->select('users.name', 'users.id as iduser' ,'users.profile_pic' , 'comments.comment', 'comments.created_at')->leftJoin('users','comments.user_id','=','users.id')->get()) as $Comment) 
				<tr>
					<td style="width:120px;">
						<a href="/profile/{{$Comment->iduser}}">
							<img width="100px" height="100px" src="{{Storage::url($Comment->profile_pic)}}">
						</a>
					</td>
					<td colspan="2">
						<p style="margin: 0%; border-bottom: 3px solid blue;"><font size="4"><b>{{$Comment->name}}</b></font></p>
                                                        <p style="margin: 0%; margin-left: 1em;"><font size="2"><b>{{$Comment->created_at}}</b></font></p>
							<p style = "margin-left: 2em; margin-top: 1em; margin-bottom: 1em;">{{$Comment->comment}}</p>
					</td>
				</tr>
				@endforeach
			</table>
			<table style="margin-left:2%">
				<tr>
					<td>
						<br>
					</td>
				</tr>
				<tr>
					<td>
						<p>Insertar Comentario<p>
					</td>
				</tr>
				<form action="/reviewpage/{{$reviewchosen->idreview}}/comment" method="POST">
				@csrf
				@guest
							
				@else
				<tr>
					<td>
							<textarea style="resize: none" name="ReviewCommentGeneral"  rows="6" cols="60" placeholder="Maximo 255 caracteres." maxlength="255"></textarea>					
					</td>
				</tr>		
				<tr>
					<td>
						
						<input type="hidden" name="ReviewComment" value="{{ $reviewchosen->idreview }}">
						<input type="hidden" name="UserComment" value="{{ Auth::user()->id }}">
						
						<input type="submit" value="Insertar Comentario"> 	
					</td>
				</tr>
				@endguest
				</form>
			</table>			
		</table>
		</div>
	</div>
</body>
</html>