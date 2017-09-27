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
			<h2 class="w3-center">You Are Editing {{ ucwords($guest->name) }}'s Invitation</h2>
		</div>
		<div class="w3-row w3-padding-32">
			{!! Form::model($guest, [ 'action' => ['GuestController@update2', $guest->id], 'method' => 'PATCH', 'class' => '']) !!}
				<p class="">
					<input type="checkbox" name="rsvp" id="rsvp" {{ $guest->rsvp == "Y" ? 'checked' : '' }} />
					<label for="rsvp">Comfirmed Invite</label>
				</p>
				<div class="input-field col s6">
					<input id="first" class="w3-large validate" type="text" name="name" value="{{ ucwords($guest->name) }}" style="padding-left:20px;" />
					<label for="name" class="active">Guest</label>
				</div>
				<div class="input-field col s6">
					<input id="plus_one" class="w3-large validate" type="text" name="plus_one" value="{{ $guest->plusOne ? ucwords($guest->plusOne->name) : '' }}" placeholder="Add A Plus One" style="padding-left:20px;" />
					<label for="Plus One" class="active">Plus One</label>
				</div>
				<span class="w3-text-red">*Removing the guest will remove both invitees from the list but not completely from the system</span><br/>
				<span class="w3-text-red">*Removing the plus one's name will remove the plus one completely</span>
				<div class="input-field col offset-s3 s4 m12 l12">
					{!! Form::submit('Save Changes', ['name' => 'submit', 'class' => 'btn waves-effect waves-light red accent-2 w3-left']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('footer')
	<!-- Footer -->
	<script src="/js/app.js"></script>
	<script src="/js/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="/js/materialize.min.js"></script>
	<script type="text/javascript">
		//ScrollFire plugin init
		var options = [
		  {selector: '.guestList li', offset: 100, callback: function(el) {
			$(el).fadeTo("slow", 1);
		  } }
		];

		for(var x=1; x <= ($('.guestList > li').length - 1); x++) {
			var listItem = {};
			
			$('.guestList > li').eq(x).addClass('guestNum'+x);
			listItem = {
				selector: '.guestNum'+x,
				offset: 100,
				callback: function(el) {
					$(el).fadeTo("slow", 1);
				}
			}
			
			options.push(listItem);
		}
		Materialize.scrollFire(options);
	</script>
@endsection