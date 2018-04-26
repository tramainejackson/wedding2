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
			<h1 class="headerContent white-text">The Guest List</h1>
		</div>
	</header>
@endsection

@section('about_us')
	<div class="container py-5">
		@if(session('status'))
			<div class="row">
				<div class="w3-card-4 w3-green w3-round-medium">
					<h2 class="w3-center">{{ session('status') }}</h2>					
				</div>
			</div>
		@endif
		<div class="row">
			<div class="col text-center">
				<h2 class="">Add An Invite</h2>
			</div>
		</div>

		<!-- Create new guest form -->
		{!! Form::open(['action' => 'GuestController@create', 'method' => 'POST', 'class' => '']) !!}
			<div class="row">
				<div class="col">
					<div class="md-form">
						<input id="first" class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Guest Full Name" />
						
						<label for="name" class="">Guest Name</label>
						
						@if($errors->has('name'))
							<span class="text-red">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="md-form col s6">
						<input id="plus_one" class="form-control" type="text" name="plus_one" value="{{ old('plus_one') }}" placeholder="Add A Plus One" />
						
						<label for="plus_one" class="">Plus One Name</label>
					</div>
					<div class="md-form col s6">
						<input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Add An Email Address" />
						
						<label for="email" class="">Email Address</label>
					</div>
					<div class="md-form">
						{!! Form::submit('Add Invite', ['name' => 'submit', 'class' => 'btn red accent-2']) !!}
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection