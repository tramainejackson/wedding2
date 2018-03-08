@if($foundGuest)
	<div class="container" id="confirmation" style="display:none;">
		<h2 class="w3-center">Welcome Back!</h2>
		<h3 class="" style="text-align:justify">Thanks for coming back &lsquo;{{ $foundGuest->name }}&rsquo;. We do see that you previously declined the invitation. Please contact us directly if this was mistake or your able to make it now and we will see if we can make the adjustment and add your reservation back to the list.</h3>
	</div>
@elseif($foundAddtGuest)
	<div class="container" id="confirmation" style="display:none;">
		<h2 class="w3-center">Welcome Back!</h2>
		<h3 class="" style="text-align:justify">Thanks for coming back &lsquo;{{ $foundAddtGuest->name }}&rsquo;. We do see that you previously declined the invitation. Please contact us directly if this was mistake or your able to make it now and we will see if we can make the adjustment and add your reservation back to the list.</h3>
	</div>
@endif