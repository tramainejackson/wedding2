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
			<h1 class="headerContent white-text">The Bridal Party</h1>
		</div>
	</header>
@endsection

@section('about_us')
	<div class="container py-5">

		@if(session('status'))
			<div class="row">
		
				<div class="col">
				
					<h2 class="text-center">{{ session('status') }}</h2>					
				</div>
			</div>
		@endif

		<div class="row">
			<div class="align-items-center col d-flex justify-content-center text-center">

				<div class="align-self-start">

					<button class="btn blue-grey mr-1 addBridalPartyMember">Add New Bridal Member(s)</button>

				</div>

				<h2 class="align-self-center mb-0 ml-1">Edit the Bridal Party</h2>
			</div>
		</div>

		<div class="row">

			<div class="col">

				<!-- Edit bridal party form -->
				{!! Form::open(['action' => ['BridalPartyController@store'], 'method' => 'POST', 'class' => 'edit_bridal_party_form']) !!}

					@for($x=1; $x <= $bridalParty; $x++)

					<div class="row" id="">

						<div class="col" id="">
								{{-- If not last row, add a horizontal row --}}
								@if($x != 1)

									<hr class="mb-5"/>

								@endif

								<div class="row" id="">
									<div class="col-3" id="">
										<button id="remove_couple_{{ $x }}" class='btn btn-red lighten-1 ml-0' type='button' data-toggle="modal" data-target="#modalConfirmDelete">Remove Couple</button>
									</div>
								</div>

								@php $couples = \App\BridalParty::getBridalOrder($x); @endphp

								<div class="row">
									<div class="col-12">
										<h2 class="">Order #{{ $x }}</h2>
									</div>
								</div>

								<div class="row mb-5">

									@foreach($couples as $couple)

										<div class="col-6">

											<div class="form-row">

												<div class="col-4">

													<img src="/{{ $couple->image }}" class="img-fluid" height="300" width="250" />

													<div class="md-form">

														<div class="file-field">

															<div class="btn btn-primary btn-sm float-left">
																<span>Choose file</span>
																<input type="file">
															</div>

															<div class="file-path-wrapper">
																<input class="file-path validate" type="text" placeholder="Change Photo">
															</div>

														</div>

													</div>

												</div>

												<div class="col-8">

													<div class="md-form">

														<input id="title" class="form-control" type="text" name="title[]" value="{{ old('title') ? old('title') : $couple->title }}" placeholder="Add A Title For Bridal Party Member" />

														<label for="title" class="">Title</label>

														@if($errors->has('title'))

															<span class="red-text">{{ $errors->first('title') }}</span>

														@endif

													</div>

													<div class="md-form">

														<input id="name" class="form-control" type="text" name="name[]" value="{{ old('name') ? old('name') : $couple->name}}" placeholder="Enter Bridal Party Member Name" />

														<label for="name" class="">Name</label>

														@if($errors->has('name'))
															<span class="red-text">{{ $errors->first('name') }}</span>
														@endif
													</div>

													<div class="md-form">

														<textarea id="blurb" class="form-control md-textarea" type="text" name="blurb[]" placeholder="Enter A Story From Bridal Party Member">{{ old('blurb') ? old('blurb') : $couple->blurb }}</textarea>

														<label for="blurb" class="">Story</label>

													</div>

												</div>

											</div>

										</div>

									@endforeach

									<div class="md-form hidden" hidden>

										<input id="order_num" class="form-control hidden" type="number" name="order_num[]" value="{{ $x }}" />

									</div>

								</div>

							</div>

						</div>

					@endfor

					<div class="form-row updateBridalPartyBtn">

						<div class="md-form">

							<button type="submit" class="btn green accent-2">Update Bridal Party</button>

						</div>

					</div>

				{!! Form::close() !!}

			</div>

		</div>

	</div>

	<!--Modal: modalConfirmDelete-->
	<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">

		<div class="modal-dialog modal-notify modal-danger" role="document">

			<!--Content-->
			<div class="modal-content text-center">
				<!--Header-->
				<div class="modal-header d-flex justify-content-center">
					<p class="heading">Are you sure you want to remove this couple?</p>
				</div>

				<!--Body-->
				<div class="modal-body">

					<i class="fa fa-times fa-4x animated rotateIn"></i>

				</div>

				<!--Footer-->
				<div class="modal-footer flex-center">
					<a href="" class="btn btn-outline-danger removeCoupleConfirm">Yes</a>
					<a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No</a>

					<input class="hidden removeCoupleBtn" type="number" value="" hidden />
				</div>

			</div>
			<!--/.Content-->

		</div>

	</div>
	<!--Modal: modalConfirmDelete-->
@endsection