@extends('layouts.app')

@section('addt_style')
	input {
		border: none;
		background: transparent;
	}
@endsection

@section('header')
<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5% 2%; color:black;">

	<!--- Header / Home --->
	@component('layouts.nav')
	@endcomponent
	
	<img src="/images/compass.png" class="countdownCompas hide-on-small-only" />
	<div id="getting-started" class="hide-on-small-only"><span id="countdownClock"></span></div>
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
					@if ($foundGuest->plusOne)
						{!! Form::open([ 'action' => ['AddtGuestController@update', $foundGuest->id], 'method' => 'PATCH' ]) !!}
							<p class="w3-center" style="">We have <input type="text" style="width: fit-content; padding: 0% 0%; font-size: 100%; text-align: -webkit-center; text-align: center; border-bottom: none;" name="addt_guest" id="plusOneInput" value="{{ $foundGuest->plusOne()->pluck('name')->first() }}" onkeyup="document.getElementById('nameChange').innerHTML = this.value;" disabled /> as your plus one. Is it okay to confirm <span id="nameChange">{{ $foundGuest->plusOne()->pluck('name')->first() }}</span> as well?</p>
						
							<div class="w3-center w3-container">
								<div class="w3-bar">
									<input type="submit" name="plusOne" class="w3-button" value="Confirm Us Both" />
									<button class="w3-button" onclick="this.className += ' w3-disabled'; document.getElementById('plusOneInput').disabled = false; document.getElementById('plusOneInput').focus(); return false; ">Change Name</button>
									<input type="submit" name="plusOne" class="w3-button" value="Check Back Soon" />
									<input type="submit" name="plusOne" class="w3-button" value="No Plus One" />
								</div>
							</div>
						{!! Form::close() !!}
					@else
						{!! Form::open([ 'action' => ['AddtGuestController@store', $foundGuest->id], 'method' => 'POST' ]) !!}
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
						{!! Form::close() !!}
					@endif
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
		// window.scrollTo(0, confirmationDiv.offsetTop);
	</script>
@endsection