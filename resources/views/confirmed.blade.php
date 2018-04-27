<div id="confirmation">
	<div class="text-center">
		<h2 class="h2-responsive">Yayyyyyy</h2>
		<h3 class="h3-responsive text-justify">We were able to find your RSVP. Please let us know if you can make it.</h3>
	</div>
	<div class="d-flex align-items-center justify-content-around my-5">
		<div class="col">
			<button class="findRSVP btn btn-lg orange darken-1 w-100 mx-0">
				<i class="fa fa-arrow-circle-left"></i>&nbsp;Back
			</button>
		</div>
		<div class="col">
			<button class="confirmRSVP btn btn-lg green darken-2 w-100 mx-0" onclick="confirmRSVP({{$foundGuest}}, '{{$email}}');">
				<i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirm
			</button>
		</div>
		<div class="col">
			<button class="declineRSVP btn btn-lg red accent-4 w-100 mx-0" onclick="declineRSVP({{$foundGuest}}, '{{$email}}');">
				<i class="fa fa-close" aria-hidden="true"></i>&nbsp;Can't Make It
			</button>
		</div>
	</div>
</div>