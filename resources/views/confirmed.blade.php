@extends('layouts.app')

@section('addt_style')
	input {
		border: none;
		background: transparent;
	}
@endsection

@section('header')
	<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5% 2%; color:black;">
	
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center headerContent">
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>08.26.2018</b></h2>
		<div id="home_countdown" class="hide-on-small-only"><span id="countdownClock"></span></div>
	  </div>
	<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i>- I'm only asking for a couple of forevers</i></span>
	</header>
@endsection

@section('wedding_information')
	<!-- Wedding information content -->
	<div class="w3-container w3-padding-64 w3-center usMobile" style="color:#000;background:url('/images/map5.jpg'); background-attachment: fixed; background-repeat: no-repeat; background-position: center center; background-size: cover;">
	
	<!-- Wedding information -->
	<!-- Background photo -->
	<div class="w3-display-container w3-wide w3-margin scrollImg2" id="wedding" style="position: relative; padding: 50px 0px 175px;">
		<div class="w3-center" style="position: relative; padding: 100px 0px 50px;">
			<h1 class="w3-jumbo"><b>THE WEDDING</b></h1>
			<h1 class="w3-xxlarge">Are You Invited?!?!</h1>
			<h2>Of course..</h2>
		</div>
	
	  <div class="w3-content" style="position:relative; /* background: rgba(255, 255, 255, 0.9); */">
		<!--- <img class="w3-round-large w3-mobile" src="http://luciensmanor.com/wp-content/uploads/2016/07/Versailles-2016.jpg"> --->
		<div class="w3-row" style="font-size: 125%;">
		  <div class="w3-half">
			<h2 class="w3-xxlarge">When</h2>
			<p>August 26, 2018</p>
			<p>Wedding Ceremony - 2:30pm</p>
			<p>Cocktail Hour - 3:00pm</p>
			<p>Reception & Dinner - 4:00pm</p>
		  </div>
		  <!--- <div class="">
			<img src="/images/design3.png" class="valign-wrapper w3-hide-small" style="max-height:175px; position:absolute; left:45%; transform:rotate(-35deg); bottom: -20px;" />
		  </div> --->
		  <div class="w3-half">
			<h2 class="w3-xxlarge">Where</h2>
			<p>Lucien's Manor</p>
			<p>81 W. White Horse Pike</p>
			<p>Berlin, NJ 08009</p>
			<p><a href="http://www.luciensmanor.com" target="_blank">luciensmanor.com</a></p>
		  </div>
		  
		</div>
	  </div>
	  <!-- RSVP section -->
	  <div class="w3-content" style="position:relative; /* background: rgba(255, 255, 255, 0.9); */">
		<h1>HOPE YOU CAN MAKE IT!</h1>
		  <p class="w3-large">Kindly Respond By January, 2018</p>
		  <p class="w3-xlarge">
			<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-round w3-red w3-opacity w3-hover-opacity-off" style="padding:8px 60px">RSVP</button>
		  </p>
	  </div>
	  </div>
	</div>
@endsection

@section('about_us')
	<div class="w3-modal" id="confirmation">
		<div class="w3-modal-content" id="">
			@if ($inviteResponse == 'Y')
				<div class="w3-container w3-center">
					<h3 class="">Thanks for confirming {{ $first }}
					</h3>
				</div>
				
				<hr/>
				
				<div class="w3-container w3-center">
					{!! Form::open([ 'action' => ['GuestController@update', $foundGuest->id], 'method' => 'PATCH' ]) !!}
						@if ($foundGuest->plusOne)
							<p class="w3-center" style="">We have <input type="text" style="width: fit-content; padding: 0% 0%; font-size: 100%; text-align: -webkit-center; text-align: center; border-bottom: none;" name="addt_guest" id="plusOneInput" value="{{ $foundGuest->plusOne()->pluck('name')->first() }}" onkeyup="document.getElementById('nameChange').innerHTML = this.value;" disabled /> as your plus one. Is it okay to confirm <span id="nameChange">{{ $foundGuest->plusOne()->pluck('name')->first() }}</span> as well?</p>
							<div class="w3-center w3-container">
								<div class="w3-bar">
									<input type="submit" name="plusOne" class="w3-button" value="Confirm Us Both" />
									<button class="w3-button" onclick="this.className += ' w3-disabled'; document.getElementById('plusOneInput').disabled = false; document.getElementById('plusOneInput').focus(); return false; ">Change Name</button>
									<input type="submit" name="plusOne" class="w3-button" value="Check Back Soon" />
									<input type="submit" name="plusOne" class="w3-button" value="No Plus One" />
								</div>
							</div>
						@else
							<p class="w3-center">We do not have a plus one added for you. Would you like to add one now?</p>
							<div class="w3-center w3-container">
								<div class="w3-center" style="display:none">
									<label for="">Plus one: </label>
									<input type="text" name="plusOneName" class="w3-button hiddenConfirm" />
								</div>
								<div class="w3-bar">
									<input type="submit" name="plusOne" class="w3-button hiddenConfirm" style="display:none;" value="Confirm Us Both" />
									<button type="button" class="w3-button" onclick="this.className += ' w3-disabled'; $('.hiddenConfirm').addClass('w3-animate-left').show().parent().show(function() { $(this).focus(); }); return false;"> Add One</button>
									<input type="submit" name="plusOne" class="w3-button" value="No Plus One" />
								</div>
							</div>
						@endif
					{!! Form::close() !!}
				</div>
			@elseif ($inviteResponse == 'N') 
				<div class="w3-modal-content w3-round" id="">
					<div class="w3-center w3-container w3-round">
						<h3 class="">Thanks for your response {{ $first }}</h3>
						<p>Sorry to hear that you can't make it. 
						
						@if($foundGuest->plusOne)
							We have {{ $foundGuest->plusOne()->pluck('name')->first() }} as your plus one and we will give them the same status right now.
						@endif
						
						 Look for the pictures once its all said and done. You can change your response by completing an RSVP again up until 5/1/2018.</p>
					</div>
				</div>
			@else
				<div class="w3-container w3-center">
					<h3 class="">Thanks for confirming {{ $first }}
					</h3>
					<p class="">If looks like you or your plus one has already responded. We currently have your status as @php echo $foundGuest->rsvp == 'Y' ? 'attending' : 'not attending'; @endphp</p>
				</div>
			@endif
		</div>
	</div>
	<p class="w3-center">Thanks for responding</p>
</div>
@endsection

@section('footer')
	<script type="text/javascript">
		var confirmationDiv = document.getElementById('confirmation');
		
		confirmationDiv.style.display = "block";
		confirmationDiv.children[0].className += " w3-animate-zoom";
	</script>
@endsection