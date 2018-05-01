@extends('layouts.app')

@section('addt_style')
	body {
		background-color: #f5f8fa;
	}
	
	.bgimg {
		min-height: 30%;
		background: url(/images/at2.jpg);
		background-size: cover;
		background-position: center center;
		background-repeat: no-repeat;
	}
@endsection

@section('header')	
	<!-- Header / Home-->
	<header class="bgimg text-center" id="home">
		<div class="d-flex align-items-center justify-content-center">
			<h1 class="headerContent white-text">Photos</h1>
		</div>
	</header>
@endsection

@section('about_us')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<a class="btn btn-lg orange darken-2 my-3" href="/photos/create">Add Photos</a>
				<!-- <a class="btn btn-lg orange darken-2 removePhotos" href="#">Remove Photos</a>
				<p class="">Check box to delete</p> -->
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div id="mdb-lightbox-ui"></div>
				<div class="mdb-lightbox">
					@foreach($photos as $photo)
						<figure class="col-md-4">
							<a href="{{ asset(str_ireplace('public/images', 'storage/images/lg', $photo->name)) }}" data-size="{{ '1500x' . $photo->lg_height }}">
								<img class="img-fluid img-thumbnail" src="{{ asset(str_ireplace('public/images', 'storage/images/sm', $photo->name)) }}" />
							</a>
						</figure>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection