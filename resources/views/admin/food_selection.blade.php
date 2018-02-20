@extends('layouts.app')

@section('addt_style')
	.bgimg, .bgimg2 {
		min-height: 30%;
	}
@endsection

@section('content_title', 'Food Selection')

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
		<h1 class="w3-jumbo">The Food Selections</h1>
		<span></span>
	  </div>
	</header>
@endsection

@section('about_us')
	@if(count($guests) > 0)
		<div class="container" style="position:relative">
			@if(session('status'))
				<div class="w3-row">
					<div class="w3-card-4 w3-green w3-round-medium">
						<h2 class="w3-center">{{ session('status') }}</h2>					
					</div>
				</div>
			@endif
			<div class="row w3-padding-24">
				<div class="input-field col s4">
					<input type="text" name="guest_search" class="guest_search" placeholder="Enter Name To Search ...." />
					<label for="guest_search">Search Guest</label>
				</div>
			</div>
			<div class="w3-row w3-padding-24">
				<ul class="w3-ul w3-hoverable guestList">
					<li class="guestListHeader" style="opacity:0;">
						<p class="w3-center" style="width:24.5%; display:inline-block;"></p>
						<p class="w3-center" style="width:24.5%; display:inline-block;">Names&nbsp;<span class="w3-badge"></span></p>
						<p class="w3-center" style="width:24.5%; display:inline-block;">Food Selection<span></span></p>
					</li>
					@foreach($guests as $guest)
						<li class="" style="opacity:0;">
							<!-- Action button for guest food edit -->
							@if($guest->food_option)
								<span class="w3-center" style="width:24.5%; display:inline-block;"><a href="/food_selection/{{ $guest->food_option->id }}/edit" class="btn">Edit &nbsp;Selection</a></span>
							@else
								<span class="w3-center" style="width:24.5%; display:inline-block;"><a href="/food_selection/{{ $guest->id }}/create" class="btn light-green darken-1">Make Selection</a></span>
							@endif
							
							<!-- Guest Name -->
							<span class="w3-center nameSearch" style="width:24.5%; display:inline-block;">{{ $guest->name }}</span>
							
							<!-- Guest food selection -->
							@if($guest->food_selected == 'Y')
								<span class="w3-center" style="width:24.5%; display:inline-block;">{{ $guest->food_option->food_option }}</span>
							@else
								<span class="w3-center" style="width:24.5%; display:inline-block;">No Selection Yet</span>
							@endif
							
							<span class="w3-center" style="width:24.5%; display:inline-block;"></span>
							
							<!-- Check if there is a plus one for the invitiation -->
							@if($guest->plusOne)
								<span class="w3-center" style="width:24.5%; display:inline-block;"></span>
								<span class="w3-center" style="width:24.5%; display:inline-block;">{{ $guest->plusOne->name }}</span>
								
								@if($guest->food_selected == 'Y')
									<span class="w3-center" style="width:24.5%; display:inline-block;">{{ $guest->food_option->add_guest_option }}</span>
								@else
									<span class="w3-center" style="width:24.5%; display:inline-block;">No Selection Yet</span>
								@endif
							@endif
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	@else
		<div class="container">
			<div class="w3-row w3-padding-24">
				<h2 class="text-center">You don't have anybody on your guest list. Where's the love? Add your first guest <a href="guest_list/create" class="">here</a></h2>
			</div>
		</div>
	@endif
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