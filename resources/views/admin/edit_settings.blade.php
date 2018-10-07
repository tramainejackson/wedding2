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
			<h1 class="headerContent white-text">The Settings</h1>
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
			<div class="col text-center">
				<h2 class="">Edit the Settings</h2>
			</div>
		</div>

		<div class="row">

			<div class="col">

				<!-- Edit settings form -->
				{!! Form::open(['action' => 'HomeController@update_settings', 'method' => 'PATCH', 'class' => '']) !!}
			
					<div class="form-row">

						<div class="md-form col-4">
						
							<input id="hisname" class="form-control" type="text" name="hisname" value="{{ old('hisname') ? old('hisname') : $settings->his_name }}" placeholder="Enter His First Name" />
							
							<label for="hisname" class="">His Name</label>
							
							@if($errors->has('hisname'))
								<span class="red-text">{{ $errors->first('hisname') }}</span>
							@endif
							
						</div>
						
						<div class="md-form col-4">
						
							<input id="hername" class="form-control" type="text" name="hername" value="{{ old('hername') ? old('hername') : $settings->her_name }}" placeholder="Enter Her First Name" />
							
							<label for="hername" class="">Her Name</label>

							@if($errors->has('hername'))
								<span class="red-text">{{ $errors->first('hername') }}</span>
							@endif
						</div>
						
						<div class="md-form col-4">
						
							<input id="lastname" class="form-control" type="text" name="lastname" value="{{ old('lastname') ? old('lastname') : $settings->lastname}}" placeholder="Enter Last Name" />
							
							<label for="lastname" class="">Last Name</label>

							@if($errors->has('lastname'))
								<span class="red-text">{{ $errors->first('lastname') }}</span>
							@endif
						</div>
						
					</div>
					
					<div class="form-row">
						
						<div class="md-form col-12">
						
							<input id="email" class="form-control" type="email" name="email" value="{{ old('email') ? old('email') : $settings->email }}" placeholder="Add An Email Address" />
							
							<label for="email" class="">Email Address</label>
							
						</div>
						
					</div>

					<div class="form-row">
						
						<div class="md-form col-12">
						
							<input id="wedding_date" class="form-control datepicker" type="text" name="wedding_date" value="" placeholder="Enter The Wedding Date" data-value="{{ $settings->wedding_date->format('Y/m/d') }}" />
							
							<label for="wedding_date" class="">Wedding Date</label>
							
						</div>
						
					</div>

					<div class="form-row">

						<div class="md-form col-12">

							<input id="rsvp_date" class="form-control datepicker" type="text" name="rsvp_date" value="" placeholder="Enter The Date Guest Have to RSVP By" data-value="{{ $settings->rsvp_date->format('Y/m/d') }}" />

							<label for="wedding_date" class="">RSVP By Date</label>

						</div>

					</div>
					
					<div class="form-row">
						
						<div class="md-form input-group">
							
							<div class="input-group-prepend">
								<span class="input-group-text">#</span>
							</div>
							
							<input id="hashtag" class="form-control" type="text" name="hashtag" value="{{ old('hashtag') ? old('hashtag') : $settings->hashtag }}" placeholder="Enter Your Memorable Wedding Hashtag" />
							
							<label for="hashtag" class="">Hashtag</label>
							
						</div>
						
					</div>
					
					<div class="form-row">
						
						<div class="md-form">
						
							<button type="submit" class="btn green accent-2">Update Settings</button>

						</div>
						
					</div>
					
				{!! Form::close() !!}
				
			</div>
			
		</div>
		
	</div>
@endsection