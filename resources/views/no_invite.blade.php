@extends('layouts.app')


@section('header')
	
<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5% 2%; color:black;">

	<!--- Header / Home --->
	@component('layouts.nav')
	@endcomponent
	
	<img src="/images/compass.png" class="countdownCompas hide-on-small-only" />
	<div id="getting-started" class="hide-on-small-only"><span id="countdownClock"></span></div>
@endsection

@section('about_us')
	<div class="container" id="confirmation" style="background: linear-gradient(rgba(255, 234, 220, 0.9), rgba(255, 176, 124, 0.9), rgba(255, 190, 147, 0.9)); padding:0% 2% 5%;">
		<h2 class="w3-center">Whooooooooooooops</h2>
		<h3 class="" style="text-align:justify">Sorry but we did not find &lsquo;{{ $name }}&rsquo; on the invite list. Please try again. If you continue to experience issues please contact us directly.
		</h3>
	</div>
</div>
@endsection

@section('footer')
	<script type="text/javascript">
		var confirmationDiv = document.getElementById('confirmation');
		window.scrollTo(0, confirmationDiv.offsetTop);
	</script>
@endsection