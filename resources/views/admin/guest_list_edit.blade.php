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
					<h2 class="text-center">{{ session('status') }}</h2>					
				</div>
			</div>
		@endif
		<div class="row">
			<div class="col text-center">				
				<h2 class="">You Are Editing {{ ucwords($guest->name) }}'s Invitation</h2>
			</div>
		</div>

		<!-- Guest edit form -->
		{!! Form::model($guest, [ 'action' => ['GuestController@update2', $guest->id], 'method' => 'PATCH', 'class' => 'editGuestForm']) !!}
			<div class="row">
				<div class="md-form col">
					<div class="d-flex align-items-center justify-content-center">
						<button class="inviteCheck btn{{ $guest->rsvp == 'Y' ? ' green active' : ' stylish-color-dark' }}" type="button">Comfirmed Invite
							<input class="" type="checkbox" name="rsvpYes" id="rsvpYes"{{ $guest->rsvp == "Y" ? ' checked' : '' }} />
						</button>


						<button class="inviteCheck btn{{ $guest->rsvp == 'N' ? ' red active' : ' stylish-color-dark' }}" type="button">Declined Invite
							<input class="" type="checkbox" name="rsvpNo" id="rsvpNo" class="" {{ $guest->rsvp == "N" ? 'checked' : '' }} />
						</button>
					</div>
				</div>

				<div class="md-form col-12">
					<div class="input-field col s6" style="margin-top:12px;">
						<input id="first" class="form-control" type="text" name="name" value="{{ ucwords($guest->name) }}" style="padding-left:20px;" />
						<label for="name" class="active">Guest</label>
					</div>					
				</div>
				<div class="md-form col-12">
					<div class="input-field col s6">
						<input id="plus_one" class="form-control" type="text" name="plus_one" value="{{ $guest->plusOne ? ucwords($guest->plusOne->name) : '' }}" placeholder="Add A Plus One" style="padding-left:20px;" />
						<label for="Plus One" class="active">Plus One</label>
					</div>
				</div>
				<div class="md-form col-12">
					<div class="input-field col s6">
						<input id="email" class="form-control" type="email" name="email" value="{{ $guest->email }}" placeholder="Add An Email Address" style="padding-left:20px;" />
						<label for="email" class="active">Email Address</label>
					</div>
				</div>
				
				<div class="md-form">
					<button class="btn red accent-2 m-0" type="submit">Save Changes</button>
					
					<button class="btn yellow darken-4" type="button">Remove Invite</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection