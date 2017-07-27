@extends('app')

@section('addt_style')
	input {
		border: none;
		background: transparent;
	}
@endsection

@section('content_title', 'Guest Response')

@section('about_us')
	<div class="w3-modal" id="confirmation">
		<div class="w3-modal-content" id="">
			<form name="" class="" action="" method="POST">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				
				@if (count($foundGuest) > 0)
					@foreach($foundGuest as $guest)
						@if ($inviteResponse == 'Y')
							<div class="w3-container w3-center">
								<h3 class="">Thanks for confirming 
									{{ $guest->name }}
								</h3>
							</div>
							<hr/>
							<div class="w3-container w3-center">
								<p class="">We have <input type="text" id="plusOneInput" value="{{ $guest->plusOne()->pluck('name')->first() }}" onkeyup="document.getElementById('nameChange').innerHTML = this.value;" disabled /> as your plus one. Is okay to confirm <span id="nameChange">{{ $guest->plusOne()->pluck('name')->first() }}</span> as well?</p>
							</div>
							<div class="w3-center w3-container">
								<div class="w3-bar">
									<input type="submit" name="confirmBoth" class="w3-button" value="Confirm Us Both" />
									<button class="w3-button" onclick="this.className += ' w3-disabled'; document.getElementById('plusOneInput').disabled = false; document.getElementById('plusOneInput').focus(); return false; ">Change Name</button>
									<input type="submit" name="noPlusOne" class="w3-button" value="No Plus One" />
								</div>
							</div>
						@else
							<p>Sorry to hear that you can't make it {{ $first }}. Thanks for responding. Look for the pictures once its all said and done.</p>
						@endif
					@endforeach
				@elseif (count($foundAddtGuest) > 0)
					@foreach($foundAddtGuest as $addtGuest) 
						@if ($inviteResponse == 'Y')
								<h3 class="">Thanks for confirming 
									{{ $addtGuest->name }}
								</h3>
								<hr/>
								<p class="">We have {{ $addtGuest->plusOne()->pluck('name')->first() }} as your plus one. Is okay to confirm {{ $addtGuest->plusOne()->pluck('name')->first() }} as well?</p>
						@else
							<p>Sorry to hear that you can't make it {{ $first }}. Thanks for responding. Look for the pictures once its all said and done.</p>
						@endif
					@endforeach
				@endif
				{{-- <span onclick="document.getElementById('confirmation').style.display='none'" class="w3-button w3-display-topright">&times;</span> --}}
			</form>
		</div>
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