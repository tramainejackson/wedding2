@extends('layouts.app')

	@section('addt_style')
		.bgimg, .bgimg2 {
			min-height: 30%;
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
				<a class="btn btn-lg orange darken-2" href="/photos/show" style="height: auto;">All Photos</a>
			</div>
			@if($errors->has('upload_photo'))
				@foreach($errors->get('upload_photo') as $error)
					<h3 class="">{{ $error }}</h3>
				@endforeach
			@endif
			
			{!! Form::open(['action' => 'PhotoController@store', 'method' => 'POST', 'class' => 'pictureForm', 'id' => 'pictureForm', 'files' => true]) !!}
				<div id="pictures_page_header" class="">
					<h1 class="pageTopicHeader">Add Pictures</h1>
				</div>
				<div class="addPictures">
					<!-- File input field -->
					<div class="file-field input-field">
						<div class="btn" style="height: auto;">
							<span class="" style="">Image</span>
							<input type="file" name="upload_photo[]" id="upload_photo_input" class="custom-file-input mx-auto" multiple />
						</div>
						<div class="file-path-wrapper">
							<input type="text" class="file-path validate" placeholder="Upload up to 10 pictures at a time" />
						</div>
					</div>

					<div class="">
						<input type="submit" value="Add Photos" name="add_pictures" value="" class="btn btn-lg" style="height: auto;" />
					</div>
				</div>
				<div class="uploadsView">
					<h2 class="text-light">Preview Uploads</h2>
				</div>
			{!! Form::close() !!}
		</div>
	@endsection