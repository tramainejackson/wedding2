@extends('layouts.app')

@section('addt_style')
	.bgimg, .bgimg2 {
		min-height: 30%;
	}
@endsection

@section('content_title', 'Food Selection Edit')

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
		<h1 class="w3-jumbo">The Food Selection</h1>
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
		<div class="row w3-padding-24">
			<h2 class="w3-center">You Are Editing {{ ucwords($guest->name) }}'s Food Selection</h2>
		</div>
		<div class="row w3-padding-32">
			{!! Form::model($guest, [ 'action' => ['GuestController@create_food_selection', $guest->id], 'method' => 'PATCH', 'class' => '']) !!}
				<div class="form-group">
					<div class="input-field col s6">
						<select class="" name="food_option">
							<option value="1" {{ $guest->food_option ? $guest->food_option->food_option == 1 ? 'selected' : '' : '' }}>Option 1</option>
							<option value="2" {{ $guest->food_option ? $guest->food_option->food_option == 2 ? 'selected' : '' : '' }}>Option 2</option>
							<option value="3" {{ $guest->food_option ? $guest->food_option->food_option == 3 ? 'selected' : '' : '' }}>Option 3</option>
							<option value="4" {{ $guest->food_option ? $guest->food_option->food_option == 4 ? 'selected' : '' : '' }}>Option 4</option>
							<option value="5" {{ $guest->food_option ? $guest->food_option->food_option == 5 ? 'selected' : '' : '' }}>Option 5</option>
						</select>
						<label for="name" class="active">{{ ucwords($guest->name) }} Food Selection</label>
					</div>
				</div>
				@if($guest->plusOne)
					<div class="form-group">
						<div class="input-field col s6">
							<select class="" name="add_guest_option">
								<option value="1" {{ $guest->food_option ? $guest->food_option->add_guest_option == 1 ? 'selected' : '' : '' }}>Option 1</option>
								<option value="2" {{ $guest->food_option ? $guest->food_option->add_guest_option == 2 ? 'selected' : '' : '' }}>Option 2</option>
								<option value="3" {{ $guest->food_option ? $guest->food_option->add_guest_option == 3 ? 'selected' : '' : '' }}>Option 3</option>
								<option value="4" {{ $guest->food_option ? $guest->food_option->add_guest_option == 4 ? 'selected' : '' : '' }}>Option 4</option>
								<option value="5" {{ $guest->food_option ? $guest->food_option->add_guest_option == 5 ? 'selected' : '' : '' }}>Option 5</option>
							</select>
							<label for="Plus One" class="active">{{ $guest->plusOne->name }} Food Selection</label>
						</div>
					</div>
				@endif
				
				<span class="w3-text-red col s12">*Removing the guest will remove both invitees from the list but not completely from the system</span><br/>
				<span class="w3-text-red col s12">*Removing the plus one's name will remove the plus one completely</span>
				<div class="input-field col offset-s3 s4 m12 l12">
					{!! Form::submit('Save Changes', ['name' => 'submit', 'class' => 'btn waves-effect waves-light red accent-2 w3-left']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('footer')
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