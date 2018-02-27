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
	@if(count($guests) > 0)
		<div class="container" style="position:relative">
			@if(session('status'))
				<div class="w3-row">
					<div class="w3-card-4 w3-green w3-round-medium">
						<h2 class="w3-center">{{ session('status') }}</h2>					
					</div>
				</div>
			@endif
			<div class="">
				<a href="/guest_list/create" class="createNewLink btn">New Guest</a>
			</div>
			<div class="w3-row">
				<ul class="w3-ul guestList">
					<li class="" style="opacity:0;">
						<p class="w3-center" style="width:24.5%; display:inline-block;"></p>
						<p class="w3-center" style="width:24.5%; display:inline-block;">Names&nbsp;<span class="w3-badge">{{ $headCount }}</span></p>
						<p class="w3-center" style="width:24.5%; display:inline-block;">Responded<span></span></p>
						<p class="w3-center" style="width:24.5%; display:inline-block;">Going?&nbsp;<span class="w3-badge">{{ $confirmedCount }}</span></p>
					</li>
					@foreach($guests as $guest)
						<li class="" style="opacity:0;">
							<span class="w3-center" style="width:24.5%; display:inline-block;"><a href="/guest_list/{{ $guest->id }}/edit" class="btn">Edit</a></span>
							<span class="w3-center" style="width:24.5%; display:inline-block;">{{ $guest->name }}</span>
							<span class="w3-center" style="width:24.5%; display:inline-block;">{{ $guest->responded }}</span>
							
							@if($guest->rsvp == 'Y')
								<span class="w3-center" style="width:24.5%; display:inline-block;"><i class="fa fa-check-circle fa-lg w3-center" style="color:green;"></i></span>
							@else
								<span class="w3-center" style="width:24.5%; display:inline-block;"><i class="fa fa-times-circle fa-lg w3-center" style="color:red;"></i></span>
							@endif
							
							@if($guest->plusOne)
								<ul class="">
									<li class="">
										<span class="w3-center" style="width:24.5%; display:inline-block;"></span>
										<span class="w3-center" style="width:24.5%; display:inline-block;"><i class="fa fa-plus"></i>&nbsp;{{ $guest->plusOne()->pluck('name')->first() }}</span>
										<span class="w3-center" style="width:24.5%; display:inline-block;"></span>
										@if($guest->rsvp == 'Y')
											<span class="w3-center" style="width:24.5%; display:inline-block;"><i class="fa fa-check-circle fa-lg w3-center" style="color:green;"></i></span>
										@else
											<span class="w3-center" style="width:24.5%; display:inline-block;"><i class="fa fa-times-circle fa-lg w3-center" style="color:red;"></i></span>
										@endif
									</li>
								</ul>
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
	<!-- Footer -->
	<script src="js/app.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
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