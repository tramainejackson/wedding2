@extends('app')

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
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>17.07.2017</b></h2>
	  </div>
	</header>
@endsection

@section('about_us')
	@if(count($guests) > 0)
		<ul class="w3-ul guestList">
			<li class="" style="opacity:0;">
				<span>Name</span>
				<span>Responded</span>
				<span>Going?</span>
			</li>
			@foreach($guests as $guest)
				<li class="" style="opacity:0;">
					<span>{{ $guest->name }}</span>
					<span>{{ $guest->responded }}</span>
					
					@if($guest->rsvp == 'Y')
						<i class="fa fa-check-circle fa-lg" style="color:green;"></i>
					@else
						<i class="fa fa-times-circle fa-lg" style="color:red;"></i>
					@endif
					
					@if($guest->plusOne)
						<ul class="">
							<li class="">
								{{ $guest->plusOne()->pluck('name')->first() }}
								
								@if($guest->rsvp == 'Y')
									<i class="fa fa-check-circle fa-lg" style="color:green;"></i>
								@else
									<i class="fa fa-times-circle fa-lg" style="color:red;"></i>
								@endif
							</li>
						</ul>
					@endif
				</li>
			@endforeach
		</ul>
	@else
		{{ count($guests) }}
	@endif
@endsection

@section('footer')
	<!-- Footer -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script type="text/javascript">
		//ScrollFire plugin init
		var options = [
		  {selector: '.guestList li', offset: 0, callback: function(el) {
			$(el).fadeTo("slow", 1);
		  } }
		];

		for(var x=1; x <= ($('.guestList > li').length - 1); x++) {
			var listItem = {};
			
			$('.guestList > li').eq(x).addClass('guestNum'+x);
			listItem = {
				selector: '.guestNum'+x,
				offset: 0,
				callback: function(el) {
					$(el).fadeTo("slow", 1);
				}
			}
			
			options.push(listItem);
		}
		console.log(options);
		Materialize.scrollFire(options);
	</script>
@endsection