<div class="container" id="confirmation" style="display:none;">
	<h2 class="w3-center">Yayyyyyy</h2>
	<h3 class="" style="text-align:justify">We were able to find your RSVP. Please let us know if you can make it.</h3>
	<div class="w3-half">
		<span><i class="fa fa-2x fa-arrow-circle-left w3-text-red findRSVP"></i></span>&nbsp;<span class="w3-xlarge findRSVP">Back</span>
	</div>
	<div class="w3-half">
		<div class="">
			<span class="w3-xlarge confirmRSVP" onclick="">Confirm</span>&nbsp;<span><i class="fa fa-2x fa-arrow-circle-right w3-text-green confirmRSVP" onclick="confirmRSVP({{$foundGuest}}, '{{$email}}');"></i></span>
		</div>
		<div class="">
			<span class="w3-xlarge declineRSVP">Can't Make it</span>&nbsp;<span><i class="fa fa-2x fa-arrow-circle-right w3-text-green declineRSVP" onclick="declineRSVP({{$foundGuest}}, '{{$email}}');"></i></span>
		</div>
	</div>
</div>