@extends('app')

@section('header')
	@if(session('status'))
		<!-- RSVP Confirmation modal -->
		  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px" id="confirmation_modal">
			<div class="w3-container w3-white w3-center">
			  <h1 class="w3-wide">{{ session('status') }}</h1>
			</div>
			<span onclick="document.getElementById('confirmation_modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
		  </div>
	@endif
	
	@unless (Auth::check())
		<a href="/login" style="position:absolute;z-index:2;background:transparent;" class="w3-btn w3-large">Login</a>
	@endif

	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center headerContent">
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>17.07.2017</b></h2>
	  </div>
	<span class="w3-text-white w3-display-bottommiddle"><i>- is it unconditional when the rarri don't start</i></span>
	</header>
@endsection

@section('about_us')
	<!-- About / Tramaine & Ashley -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min" id="us">
	  <div class="w3-content">
		<h1 class="w3-center w3-text-grey"><b>Ashley & Tramaine</b></h1>
		<img class="w3-round w3-grayscale-min" src="/images/at3.jpg" style="width:100%;margin:32px 0">
		<p><i>You all know us. And we all know you. We are getting married lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
		  occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
		  laboris nisi ut aliquip ex ea commodo consequat.</i>
		</p><br>
		<p class="w3-center"><a href="#wedding" class="w3-button w3-black w3-round w3-padding-large w3-large">Wedding Details</a></p>
	  </div>
	</div>
@endsection

@section('wedding_information')
	<!-- Wedding information -->
	<!-- Background photo -->
	<div class="w3-display-container bgimg2">
	  <div class="w3-display-middle w3-text-white w3-center">
		<h1 class="w3-jumbo">You Are Invited</h1><br>
		<h2>Of course..</h2>
	  </div>
	</div>

	<!-- Wedding information content -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-grayscale-min w3-center" id="wedding">
	  <div class="w3-content">
		<h1 class="w3-text-grey"><b>THE WEDDING</b></h1>
		<img class="w3-round-large w3-grayscale-min" src="/images/wedding_location.jpg" style="width:100%;margin:64px 0">
		<div class="w3-row">
		  <div class="w3-half">
			<h2>When</h2>
			<p>Wedding Ceremony - 2:00pm</p>
			<p>Reception & Dinner - 5:00pm</p>
		  </div>
		  <div class="w3-half">
			<h2>Where</h2>
			<p>Some place, an address</p>
			<p>Some where, some address</p>
		  </div>
		</div>
	  </div>
	</div>
@endsection

@section('rsvp_information')
	<!-- RSVP section -->
	<div class="w3-container w3-padding-64 w3-pale-red w3-center w3-wide" id="rsvp">
	  <h1>HOPE YOU CAN MAKE IT!</h1>
	  <p class="w3-large">Kindly Respond By January, 2017</p>
	  <p class="w3-xlarge">
		<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-round w3-red w3-opacity w3-hover-opacity-off" style="padding:8px 60px">RSVP</button>
	  </p>
	</div>

	<!-- RSVP modal -->
	<div id="id01" class="w3-modal">
	  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
		<div class="w3-container w3-white w3-center row">
		  
		  <h1 class="w3-wide col s12">CAN YOU COME?</h1>
		  <p class="col s12">We really hope you can make it.</p>
		  
		  <form class="col s12" action="/confirmed" method="POST">
			<div class="row">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="input-field col s6">
					<input id="first" class="w3-large" type="text" name="first">
					<label for="first" class="active">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last" class="w3-large" type="text" name="last">
					<label for="last" class="active">Last Name</label>
				</div>
			  <p class="w3-center"><i>Sincerely, Tramaine & Ashley</i></p>
			  <div class="w3-row">
				<div class="w3-half">
				  <input type="submit" name="rsvp" value="Going" class="w3-button w3-block w3-green" />
				</div>
				<div class="w3-half">
				  <input type="submit" name="rsvp" value="Cant come" class="w3-button w3-block w3-red" />
				</div>
			  </div>
			</div>
		  </form>
		</div>
		<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
	  </div>
	</div>
@endsection

@section('footer')
@endsection