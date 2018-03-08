@extends('layouts.app')

	@section('addt_style')
		.bgimg, .bgimg2 {
			min-height: 30%;
		}
		
		.adminGallery img {
			max-height: 300px;
		}
		
		[type="checkbox"] + label {
			top: 0;
			left: 0;
			position: absolute;
			z-index: 2;
		}
	@endsection

	@section('header')
		@if(session('status'))
			<!-- RSVP Confirmation modal -->
			  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px" id="confirmation_modal">
				<div class="w3-container w3-white w3-center">
				  <h1 class="w3-wide">{{ session('status') }}</h1>
				</div>
				<span onclick="document.getElementById('confirmation_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
			  </div>
		@endif

		<!-- Header / Home-->
		<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
		  <div class="w3-display-middle w3-text-white w3-center headerContent">
			<h1 class="w3-jumbo">Photos</h1>
			<span></span>
		  </div>
		</header>
	@endsection

	@section('about_us')
		<div class="container">
			<div class="w3-margin-top">
				<a class="btn btn-lg orange darken-2" href="/photos/create" style="height: auto;">Add Photos</a>
				<a class="btn btn-lg orange darken-2 removePhotos" href="#" style="height: auto; display: none;">Remove Photos</a>
				<p class="">Check box to delete</p>
			</div>
			
			<div class="row">
				{!! Form::open(['action' => 'PhotoController@remove_photos', 'name' => 'removePhotos', 'method' => 'POST', 'class' => '']) !!}
					@foreach($photos as $photo)
						<div class="col s6 l4 xl3 text-center adminGallery" style="position: relative;">
							@if($photo->description == null)
								<img class="responsive-img w3-padding-16" src="{{ asset($photo->name) }}" />
							@else
								<img class="responsive-img  w3-padding-16" src="{{ asset(str_ireplace('public', 'storage', $photo->name)) }}" />
							@endif
							<input type="checkbox" name="uploadedImg[]" id="img{{$loop->index}}" value="{{ $photo->id }}" />
							<label for="img{{$loop->index}}"></label>
							<p class="deleteImg">Remove</p>
						</div>
					@endforeach
				{!! Form::close() !!}
			</div>
		</div>
	@endsection