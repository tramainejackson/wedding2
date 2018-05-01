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
	<div class="container py-5">
		@if(session('status'))
			<span class="hidden returnMessage">{{ session('status') }}</span>
			@section('addt_script')
				<script type="text/javascript">
					toastr["success"]($('.returnMessage').text());
				</script>
			@endsection
		@endif
		
		<div class="row">
			<div class="col text-right">
				<a class="btn btn-lg orange darken-2 mx-0 my-3" href="/photos/show">All Photos</a>
			</div>
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
				<div class="md-form">
					<div class="file-field">
						<div class="btn info-color-dark btn-sm float-left">
							<span class="" style="">Choose Pictures</span>
							
							<input type="file" name="upload_photo[]" id="upload_photo_input" class="" multiple />
						</div>
						
						<div class="file-path-wrapper">
							<input type="text" class="file-path validate" placeholder="Upload up to 10 pictures at a time" />
						</div>
					</div>
				</div>
			</div>
			
			<div class="md-form">
				<input type="submit" value="Add Photos" name="add_pictures" value="" class="btn btn-lg green darken-2" />
			</div>
		{!! Form::close() !!}

		<div class="uploadsView my-4">
			<h2 class="text-light">Preview Uploads</h2>
		</div>
	</div>
@endsection