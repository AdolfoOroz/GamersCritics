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
	<div class="Header">
		<a href="{{ route('home') }}">
        <img class="imginicio" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="80" width="70">
		</a>
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
					@foreach(($Images= DB::table('images')->where('images.review_id', $reviewchosen->idreview )->get()) as $Image)
						<td style="width:20%">
							<img src="{{Storage::url($Image->reviewimage)}}" width="100%" height="100" style="padding-left:3px;">
						<td>
					@endforeach
					</tr>
					<tr style="text-align: center;">
					@foreach(($Videos= DB::table('videos')->where('videos.review_id', $reviewchosen->idreview )->get()) as $Video)
						<td style="width:20%">
							<video src="{{Storage::url($Video->reviewvideo)}}" width="100%" height="100" style="padding-left:3px;"><video>
						<td>
					@endforeach
					</tr>
				</table>
			</div>
		</div>
		<div class="GameData">
			<h2> {{$reviewchosen->gamename}}</h2>
			<p>{{$reviewchosen->littlereview}}</p>			
			<h4> Desarrolladora: {{$reviewchosen->publisher}} </h4>
			<h4> Director: {{$reviewchosen->director}} </h4>
			<table>
				<legend>Categoria</legend>
				<tr>
					<td>AAA</td>						
				<tr>
			</table>
		</div>
	</div>
	
	<br>
	
	<div class="ReviewData">
		<div class="Review">
			<table>
			<tr>
				<td>
				<h2>{{$reviewchosen->title}}</h2>
				<h5>Review creado por {{$reviewchosen->name}}</h5>
				<h5>Creado el {{$reviewchosen->created_at}}</h5>
				
				<?php
				$RatingGeneral=0;
				$Count=0;
				/*
				foreach(($Ratings= DB::table('ratings')->where('ratings.review_id', $reviewchosen->idreview )->get()) as $RatingA)
				{
					$Count=$Count+1;
					$RatingGeneral=$RatingGeneral+$RatingA->rating;
				}
				$RatingGeneral=$RatingGeneral/$Count;
				*/
				?>
				<h5>Calificacion General:{{$RatingGeneral}}</h5>
				</td>
			</tr>
			<tr>
				<td>
					<p>{{$reviewchosen->description}}</p>
				</td>
			</tr>
			<form action="/reviewpage/{{$reviewchosen->idreview}}/rating" method="POST">
			<tr>
				<td>
					<h1>Ratear Review</h1>	
				</td>
			</tr>
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
			</form>		
		</div>
		<br>
		<div class="Comentarios">
			<table>
				<tr>
					<td>
						<h2>Comentarios de Usuarios<h2>
					</td>
				</tr>
				@foreach(($Comments= DB::table('comments')->select('users.name', 'users.id as iduser' ,'users.profile_pic' , 'comments.comment', 'comments.created_at')->leftJoin('users','comments.user_id','=','users.id')->get()) as $Comment) 
				<tr>
					<td>
						<form>
							<a href="/profile/{{$Comment->iduser}}">
								<img width="100px" height="100px" src="{{Storage::url($Comment->profile_pic)}}">
							</a>
						</form>
					<td>
						<p style="margin: 0%; border-bottom: 3px solid blue;"><font size="4"><b>{{$Comment->name}}</b></font></p>
                                                        <p style="margin: 0%; margin-left: 1em;"><font size="2"><b>{{$Comment->created_at}}</b></font></p>
							<p style = "margin-left: 2em; margin-top: 1em; margin-bottom: 1em;">{{$Comment->comment}}</p>
					</td>
				</tr>
				@endforeach					
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
				<tr>
					<td>
							<textarea style="resize: none" name="ReviewCommentGeneral"  rows="6" cols="60" placeholder="Maximo 255 caracteres." maxlength="255"></textarea>					
					</td>
				</tr>		
				<tr>
					<td>
						@guest
							
						@else
						<input type="hidden" name="ReviewComment" value="{{ $reviewchosen->idreview }}">
						<input type="hidden" name="UserComment" value="{{ Auth::user()->id }}">
						@endguest
						<input type="submit" value="Insertar Comentario"> 	
					</td>
				</tr>
				</form>
			</table>
		</div>
	</div>
</body>
</html>