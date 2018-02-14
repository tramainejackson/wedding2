@extends('layouts.app')

@section('addt_style')
	input {
		border: none;
		background: transparent;
	}
@endsection

@section('header')
	<div class="bgrdImage" style="background: url(/images/map3.jpg); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; background-attachment: fixed; padding: 0% 5% 2%; color:black;">
@endsection

@section('about_us')
	<div class="w3-container w3-white w3-padding-24 w3-margin-bottom">
		@if($guests->plusOne)
			<div class="" id="">
				@if(session('status'))
					<h2 class="">{{ session('status') }}</h2>
					<h2>Please select your food options. Once you confirm your food selections we will receive and email with your selections. If you need to make any changes please reach out to us.</h2>
				@else
					<h2 class="">Thanks for coming back to make your food for you and your plus one. Once you confirm your food selections we will receive and email with your selections. If you need to make any changes please reach out to us.</h2>
				@endif
				
				<h3 class="w3-center" style="background: linear-gradient(#d4be95, beige, rgba(0, 0, 0, 0));">Food Options</h3>
				
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="row">
						<div class="col s6">
							<h3 class="">Select food option for {{ $guests->name }}</h3>
							
							<div class="input-field">
								<select class="" name="food_option">
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
					<h2 class="">{{ session('status') }}. Please select your food option. Once you confirm your food selections we will receive and email with your selections. If you need to make any changes please reach out to us.</h2>
				@else
					<h2 class="">Thanks for coming back to make your food selection. Once you've confirmed your food selection, we will receive and email with your selections. If you need to make any changes please reach out to us anytime before the wedding.</h2>
				@endif
			</div>
			<div class="">
				<h3 class="">Select food option for {{ $guests->name }}</h3>
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="input-field">
						<select class="" name="food_option">
							<option value="" disabled selected>Choose your food option</option>
							<option value="#">Option 1</option>
							<option value="#">Option 2</option>
							<option value="#">Option 3</option>
							<option value="#">Option 4</option>
							<option value="#">Option 5</option>
						</select>
						<label>Food Options</label>
					</div>
					<div class="">
						<input type="submit" name="submit" class="btn" value="Confirm Food Selections" />
					</div>
				</form>
			</div>
		@endif
	</div>
@endsection