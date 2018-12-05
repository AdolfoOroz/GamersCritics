@extends('layouts.Index')

@section('content')
<div class="Header">
	<table>
	<tr>
		<td>
			<img class="imginicio" src="img/aaaaa.jpg" alt="HTML 5 Logo" height="80" width="100">
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
					<input type="button" value="Log Out" name="btnlogout">
				</td>
			</tr>
		</table>
		@endguest
	</div>
</div>
@endsection