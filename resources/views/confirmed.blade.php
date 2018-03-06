<div class="container" id="confirmation" style="display:none;">
	<h2 class="w3-center">Yayyyyyy</h2>
	<h3 class="" style="text-align:justify">We were able to find your RSVP. Please let us know if you can make it.</h3>
	<div class="w3-half center w3-margin-top">
		<button class="w3-xlarge findRSVP btn orange darken-1" style="height:auto">Back</button>
	</div>
	<div class="w3-half center">
		<div class="w3-margin-top w3-margin-bottom confirmRSVP">
			<button class="w3-xlarge confirmRSVP green btn darken-2" onclick="confirmRSVP({{$foundGuest}}, '{{$email}}');" style="height:auto">Confirm</button>
		</div>
		<div class="w3-margin-top w3-margin-bottom">
			<button class="w3-xlarge declineRSVP btn red accent-4" onclick="declineRSVP({{$foundGuest}}, '{{$email}}');" style="height:auto">Can't Make it</button>
		</div>
	</div>
</div>