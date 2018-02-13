@extends('layouts.app')

@section('addt_style')
	input {
		border: none;
		background: transparent;
	}
@endsection

@section('header')
	<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5% 2%; color:black;">
	
	<!-- Header / Home-->
	<header class="w3-display-container w3-wide bgimg w3-grayscale-min" id="home">
	  <div class="w3-display-middle w3-text-white w3-center headerContent">
		<h1 class="w3-jumbo">Ashley & Tramaine</h1>
		<h2>Are getting married</h2>
		<h2><b>08.26.2018</b></h2>
		<div id="home_countdown" class="hide-on-small-only"><span id="countdownClock"></span></div>
	  </div>
	<span class="w3-text-white w3-display-bottommiddle w3-hide-small"><i>- I'm only asking for a couple of forevers</i></span>
	</header>
@endsection

@section('about_us')
	<div class="w3-container w3-white">
		@if($guests->plusOne)
			<div class="" id="">
				@if(session('status'))
					<h2 class="">{{ session('status') }}</h2>
				@else
					<h2 class="">Thanks for coming back to make your food for you and your plus one. Once you confirm your food selections we will receive and email with your selections. If you need to make any changes please reach out to us.</h2>
				@endif
				
				<form name="" class="" action="" method="POST">
					<div class="row">
						<div class="col s6">
							<h3 class="">Select food option for {{ $guests->name }}</h3>
							
							<div class="input-field">
								<select class="" name="guest_option">
									<option value="" disabled selected>Choose your food option</option>
									<option value="#">Option 1</option>
									<option value="#">Option 2</option>
									<option value="#">Option 3</option>
									<option value="#">Option 4</option>
									<option value="#">Option 5</option>
								</select>
								<label>Food Options</label>
							</div>
						</div>
						
						<div class="col s6">
							<h3 class="">Select food option for {{ $guests->plusOne->name }}</h3>
							<div class="input-field">
								<select class="" name="add_guest_option">
									<option value="" disabled selected>Choose your food option</option>
									<option value="#">Option 1</option>
									<option value="#">Option 2</option>
									<option value="#">Option 3</option>
									<option value="#">Option 4</option>
									<option value="#">Option 5</option>
								</select>
								<label>Food Options</label>
							</div>
						</div>
					</div>
					<div class="">
						<input type="submit" name="submit" class="btn" value="Confirm Food Selections" />
					</div>
				</form>
			</div>
		@else
			<div class="" id="">
				@if(session('status'))
					<h2 class="">{{ session('status') }}</h2>
				@else
					<h2 class="">Thanks for coming back to make your food selection. Once you've confirmed your food selection, we will receive and email with your selections. If you need to make any changes please reach out to us anytime before the wedding.</h2>
				@endif
			</div>
			<div class="">
				<h3 class="">Select food option for {{ $guests->name }}</h3>
				<form name="" class="" action="" method="POST">
					<div class="input-field">
						<select class="" name="">
							<option value="" disabled selected>Choose your food option</option>
							<option value="#">Option 1</option>
							<option value="#">Option 2</option>
							<option value="#">Option 3</option>
							<option value="#">Option 4</option>
							<option value="#">Option 5</option>
						</select>
						<label>Food Options</label>
					</div>
				</form>
			</div>
		@endif
	</div>
@endsection