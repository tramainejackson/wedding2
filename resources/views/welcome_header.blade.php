@if(session('status'))
<!-- RSVP Confirmation modal -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmation_modal" aria-hidden="true" data-backdrop="true" id="confirmation_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="h1-responsive">Wedding Reservation Complete</h1>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h2 class="h2-responsive">{{ session('status') }}</h2>
				</div>
			</div>
		</div>
	</div>
@endif

@if(Auth::guest())
	<a href="/login" style="position:absolute;z-index:2;background:transparent;right:20px;" class="btn btn-link btn-lg d-none d-lg-block">Login</a>
@endif
	
<!-- Header / Home-->
<header class="view bgimg white-text welcomeHeader" id="home">
	<!-- <img src="/images/at2.jpg" class="" alt="Home Hero Image" /> -->

	<div class="mask flex-center text-center">
		<div class="headerContent">
			<h1 class="display-2">{{ $settings->her_name }} & {{ $settings->his_name }}</h1>
			<h2>Are getting married</h2>
			<h2><b>{{ $settings->wedding_date->format('m.d.y') }}</b></h2>
			
			@if($settings->wedding_date > $now)
				<div id="home_countdown" class="d-none d-md-block text-center">
					<span id="countdownClock"></span>
				</div>
			@endif
		</div>
	</div>
	
	<div class="position-absolute w-100 bottom text-center">
		<span class="d-none d-md-block"><i>- I'm only asking for a couple of forevers</i></span>
	</div>
</header>