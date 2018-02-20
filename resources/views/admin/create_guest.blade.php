@extends('layouts.app')

@section('addt_style')
	.bgimg, .bgimg2 {
		min-height: 30%;
	}
@endsection

@section('content_title', 'Guest List')

@section('nav')
	<!-- Navbar (sticky bottom) -->
	<div class="w3-bottom w3-hide-small">
	  <div class="w3-bar w3-white w3-center w3-padding w3-opacity-min w3-hover-opacity-off">
		<a href="/" style="width:20%" class="w3-bar-item w3-button">Home</a>
		<a href="/#us" style="width:20%" class="w3-bar-item w3-button">Our Story</a>
		<a href="/#wedding" style="width:20%" class="w3-bar-item w3-button">Wedding</a>
		<a href="/party" style="width:20%" class="w3-bar-item w3-button w3-hover-black">Dream Team</a>
		<a href="/#rsvp" style="width:20%" class="w3-bar-item w3-button w3-hover-black">RSVP</a>
	  </div>
	</div>
@endsection

@section('header')	
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center headerContent">
		<h1 class="w3-jumbo">The Guest List</h1>
		<span></span>
	  </div>
	</header>
@endsection

@section('about_us')
	<div class="container">
		@if(session('status'))
			<div class="w3-row">
				<div class="w3-card-4 w3-green w3-round-medium">
					<h2 class="w3-center">{{ session('status') }}</h2>					
				</div>
			</div>
		@endif
		<div class="w3-row w3-padding-24">
			<h2 class="w3-center">Add An Invite</h2>
		</div>
		<div class="w3-row w3-padding-32">
			{!! Form::open(['action' => 'GuestController@create', 'method' => 'POST', 'class' => '']) !!}
				<div class="input-field col s6">
					<input id="first" class="w3-large validate" type="text" name="name" value="{{ old('name') }}" style="padding-left:20px;" placeholder="Guest Full Name" />
					<label for="name" class="active">Guest</label>
					
					@if($errors->has('name'))
						<span class="text-red">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="input-field col s6">
					<input id="plus_one" class="w3-large validate" type="text" name="plus_one" value="{{ old('plus_one') }}" placeholder="Add A Plus One" style="padding-left:20px;" />
					<label for="Plus One" class="active">Plus One</label>
				</div>
				<div class="input-field col s6">
					<input id="email" class="w3-large validate" type="email" name="email" value="{{ old('email') }}" placeholder="Add An Email Address" style="padding-left:20px;" />
					<label for="email" class="active">Email Address</label>
				</div>
				<p class="">
					<input type="checkbox" name="rsvp" id="rsvp" />
					<label for="rsvp">Comfirmed Invite</label>
				</p>
				<div class="input-field col offset-s3 s4 m12 l12">
					{!! Form::submit('Add Invite', ['name' => 'submit', 'class' => 'btn waves-effect waves-light red accent-2 w3-left']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection