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
		<div class="w3-modal-content w3-round" id="">
			@if ($inviteResponse == 'Y')
					<h3 class="w3-center w3-padding">Thanks for confirming 
						{{ $foundAddtGuest->name }}
					</h3>
					<hr/>
					<p class="w3-center">We have {{ $foundAddtGuest->guests()->pluck('name')->first() }} as your plus one. Is okay to confirm both of you?</p>
					
					{!! Form::open([ 'action' => ['AddtGuestController@update', $foundAddtGuest->id], 'method' => 'PATCH' ]) !!}
					
					<div class="w3-center w3-container">
						<div class="w3-bar">
							<input type="submit" name="plusOne" class="w3-button hiddenConfirm" value="Confirm Us Both" />
							<input type="submit" name="plusOne" class="w3-button" value="Check Back Soon" />
						</div>
					</div>
					{!! Form::close() !!}
			@elseif ($inviteResponse == 'N')
				<p>Sorry to hear that you can't make it {{ $first }}.
			
				@if($foundAddtGuest->guests)
					We have {{ $foundAddtGuest->guests()->pluck('name')->first() }} as your plus one and we will give them the same status right now.
				@endif

				Look for the pictures once its all said and done. You can change your response by completing an RSVP again up until 5/1/2018</p>
			@else
				<div class="w3-container w3-center">
					<h3 class="">Thanks for confirming {{ $first }}
					</h3>
					<p class="">If looks like you or your plus one has already responded. We currently have your status as @php echo $guest->rsvp == 'Y' ? 'attending' : 'not attending'; @endphp</p>
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