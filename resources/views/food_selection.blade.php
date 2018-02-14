<div class="w3-container w3-white w3-padding-24 w3-margin-bottom foodSelectionDiv" style="display:none">
	@if($guests->plusOne)
		@if($guests->responded != 'Y')
			<div class="" id="">
				<h3 class="">Thanks for confirming your reservation. Once you confirm your food selections we will receive and email with your selections. If you need to make any changes please reach out to us.</h3>
				
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
				<h3 class="">Welcome back. Looks like you forgot something?!?! It's cool, you still got time. Please make your food selections</h3>
			</div>
			
			<div class="foodSelectionForm">
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
			<script>
				$('select').material_select();
			</script>
		@endif
	@else
		@if($guests->responded != 'Y')
			<div class="" id="">
				<h3 class="">Thanks for confirming your reservation {{ $guests->name }}.</h3>
			</div>
			<div class="plusOneOption w3-margin-bottom w3-padding-16">
				<h3 class="">Are You Bringing A Plus One?</h3>
				<button type="button" class="yesPO btn">Yes</button>
				<button type="button" class="noPO btn">No</button>
			</div>
			<div class="plusOneSelectionForm w3-margin-top w3-padding-32" style="display:none;">
				<form name="plus_one_selection_form" class="" action="" method="POST">
					<div class="input-field">
						<input type="text" name="plus_one" class="w3-large" value="{{ old('plus_one') }}" placeholder="Enter Full Name" disabled />
						<label for="plus_one" class="w3-medium">Plus One Name</label>
					</div>
					<div class="">
						<input type="number" name="guest_id" class="hidden" value="{{$guests->id}}" hidden />
						<input type="submit" name="submit" class="btn green" value="Add Plus One" />
					</div>
				</form>
			</div>
			<div class="foodSelectionForm" style="display:none;">
				<h3 class="">Select food option for {{ $guests->name }}</h3>
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="input-field">
						<select class="foodSelectionSelect" name="food_option" disabled>
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
			<script>
				$('[name="plus_one_selection_form"]').on('submit', function() {
					event.preventDefault();
					confirmPlusOne($('[name="plus_one"]').val(), $('[name="guest_id"]').val());
				});
			</script>
		@endif
		
		@if($guests->responded == 'Y')
			<div class="" id="">
				<h3 class="">Welcome back {{ $guests->name }}. Looks like you forgot something?!?! It's cool, you still got time. Please make your food selection</h3>
			</div>
			
			<div class="foodSelectionForm">
				<h3 class="">Select food option for {{ $guests->name }}</h3>
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="input-field">
						<select class="foodSelectionSelect" name="food_option">
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
			<script>
				$('select').material_select();
			</script>
		@endif
	@endif
</div>