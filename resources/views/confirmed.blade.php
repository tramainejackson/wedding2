@extends('app')

@section('addt_style')
	input {
		border: none;
		background: transparent;
	}
@endsection

@section('content_title', 'Guest Response')

@section('header')
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center">
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>17.07.2017</b></h2>
	  </div>
	</header>
@endsection

@section('about_us')
	@if (count($foundGuest) > 0)
		@foreach($foundGuest as $guest)
			<div class="w3-modal" id="confirmation">
				<div class="w3-modal-content" id="">
					@if ($inviteResponse == 'Y')
						<div class="w3-container w3-center">
							<h3 class="">Thanks for confirming {{ $guest->name }}
							</h3>
						</div>
						
						<hr/>
						
						<div class="w3-container w3-center">
							@if ($guest->plusOne)
								{!! Form::open([ 'action' => ['AddtGuestController@update', $guest->id], 'method' => 'PATCH' ]) !!}
									<p class="">We have <input type="text" name="addt_guest" id="plusOneInput" value="{{ $guest->plusOne()->pluck('name')->first() }}" onkeyup="document.getElementById('nameChange').innerHTML = this.value;" style="display:-webkit-inline-box; display:inline-block; width:initial; font-size:inherit; text-align:center;" disabled /> as your plus one. Is it okay to confirm <span id="nameChange">{{ $guest->plusOne()->pluck('name')->first() }}</span> as well?</p>
								
									<div class="w3-center w3-container">
										<div class="w3-bar">
											<input type="submit" name="plusOne" class="w3-button" value="Confirm Us Both" />
											<button class="w3-button" onclick="this.className += ' w3-disabled'; document.getElementById('plusOneInput').disabled = false; document.getElementById('plusOneInput').focus(); return false; ">Change Name</button>
											<input type="submit" name="plusOne" class="w3-button" value="No Plus One" />
										</div>
									</div>
								{!! Form::close() !!}
							@else
								{!! Form::open([ 'action' => ['AddtGuestController@store', $guest->id], 'method' => 'POST' ]) !!}
									<p class="">We do not have a plus one added for you. Would you like to add one now?</p>
									<div class="w3-center w3-container">
										<div class="w3-center" style="display:none">
											<label for="">Plus one: </label>
											<input type="text" name="plusOneName" class="w3-button hiddenConfirm" />
										</div>
										<div class="w3-bar">
											<input type="submit" name="plusOne" class="w3-button hiddenConfirm" style="display:none;" value="Confirm Us Both" />
											<button type="button" class="w3-button" onclick="this.className += ' w3-disabled'; $('.hiddenConfirm').addClass('w3-animate-left').show().parent().show(); return false;"> Add One</button>
											<input type="submit" name="plusOne" class="w3-button" value="No Plus One" />
										</div>
									</div>
								{!! Form::close() !!}
							@endif
						</div>
					@else
						<div class="w3-modal-content w3-round" id="">
							<div class="w3-center w3-container w3-round">
								<h3 class="">Thanks for your response {{ $first }}</h3>
								<p>Sorry to hear that you can't make it. 
								
								@if($guest->plusOne)
									We have {{ $guest->plusOne()->pluck('name')->first() }} as your plus one and we will give them the same status right now.
								@endif
								
								 Look for the pictures once its all said and done. You can change your response by completing an RSVP again up until 5/1/2018.</p>
							</div>
						</div>
					@endif
				</div>
			</div>
		@endforeach
	@elseif (count($foundAddtGuest) > 0)
		@foreach($foundAddtGuest as $addtGuest)
			<div class="w3-modal" id="confirmation">
				<div class="w3-modal-content w3-round" id="">
					@if ($inviteResponse == 'Y')
							<h3 class="">Thanks for confirming 
								{{ $addtGuest->name }}
							</h3>
							<hr/>
							<p class="">We have {{ $addtGuest->guests()->pluck('name')->first() }} as your plus one. Is okay to confirm both of you?</p>
							
							{!! Form::open([ 'action' => ['AddtGuestController@update', $addtGuest->guests()->pluck('id')->first()], 'method' => 'PATCH' ]) !!}
							
							<input type="submit" name="plusOne" class="w3-button hiddenConfirm" value="Confirm Us Both" />
							
							<input type="submit" name="plusOne" class="w3-button" value="Check Back Soon" />
							
							{!! Form::close() !!}
							
					@else
						<p>Sorry to hear that you can't make it {{ $first }}.

						@if($addtGuest->guests)
							We have {{ $addtGuest->guests()->pluck('name')->first() }} as your plus one and we will give them the same status right now.
						@endif
						
						Look for the pictures once its all said and done. You can change your response by completing an RSVP again up until 5/1/2018</p>
					@endif
				</div>
			</div>
		@endforeach
	@endif
	
	<p class="w3-center">Thanks for responding</p>
@endsection

@section('footer')
	<script type="text/javascript">
		var confirmationDiv = document.getElementById('confirmation');
		
		confirmationDiv.style.display = "block";
		confirmationDiv.children[0].className += " w3-animate-zoom";
		// window.scrollTo(0, confirmationDiv.offsetTop);
	</script>
@endsection