@section('addt_style')
	body {
		background: url(/images/map3.jpg);
		background-attachment: fixed;
		background-size: cover;
		background-position: center center;
	}
@endsection

<!--- Header / Home --->
<header class="notHomeHeader">
	<div class="container h-100 px-5">
		<div class="container d-flex flex-column flex-xl-row align-items-center justify-content-around h-100">
			<h1 class="display-3 headAsh">Ashley</h1>
			<img class="" src="/images/infinity1.png" style="max-height:150px">
			<h1 class="display-3 headMaine">Tramaine</h1>
		</div>
	</div>
	
	<div class="compassImageHeader">
		<img src="/images/compass.png" class="countdownCompas d-none d-lg-block" />
		<div id="getting-started" class="hide-on-small-only">
			<span id="countdownClock"></span>
		</div>
	</div>
</header>
