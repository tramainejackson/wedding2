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

			@foreach($photos as $photo)

				<figure class="col-md-4 col-lg-2 text-center">

					<a href="{{ asset(str_ireplace('public/images', 'storage/images/lg', $photo->name)) }}" data-size="{{ '1500x' . $photo->lg_height }}">
						<img class="" src="{{ asset(str_ireplace('public/images', 'storage/images/sm', $photo->name)) }}" height="300" width="250" />
					</a>

					<div class="w-100 position-absolute bottom mb-1" style="z-index:1">

						<button class="btn btn-danger removeImgBtn" data-toggle="modal" data-target="#modalConfirmDelete">Remove

							<input class="hidden" type="number" value="{{ $photo->id }}" hidden />

						</button>

					</div>

				</figure>

			@endforeach

		</div>

	</div>

	<!--Modal: modalConfirmDelete-->
	<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
			<!--Content-->
			<div class="modal-content text-center">
				<!--Header-->
				<div class="modal-header d-flex justify-content-center">
					<p class="heading">Are you sure you want to delete this picture?</p>
				</div>

				<!--Body-->
				<div class="modal-body">

					<i class="fa fa-times fa-4x animated rotateIn"></i>

				</div>

				<!--Footer-->
				<div class="modal-footer flex-center">

					{!! Form::open(['action' => ['PhotoController@destroy', 1], 'method' => 'DELETE', 'class' => 'pictureDeleteForm', 'id' => 'picture_delete_form']) !!}


						<button type="submit" class="btn btn-outline-danger">Yes</button>

						<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No</button>

					{!! Form::close() !!}

				</div>
			</div>
			<!--/.Content-->
		</div>
	</div>
	<!--Modal: modalConfirmDelete-->
@endsection