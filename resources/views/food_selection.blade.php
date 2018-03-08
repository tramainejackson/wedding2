<div class="w3-container w3-white w3-padding-24 w3-margin-bottom foodSelectionDiv" style="display:none">
	@if($guests->plusOne)
		@if($guests->responded != 'Y')
			<div class="" id="">
				@if($guests->plusOne->added_by != null)
					<h3 class="">Thanks for confirming your reservation. Once you confirm your food selections we will receive an email with your selections. If you need to make any changes please reach out to us.</h3>
				@else
					<h3 class="">Thanks for confirming your reservation. We did not originally have a plus one added for you but we will try to accommodate your plus one and confirm with you by June 1st. Please make your food selections below. If you need to make any changes please reach out to us directly.</h3>
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
									<option value="chicken">Grilled Mediterranean Chicken</option>
									<option value="beef">Grilled Rib-Eye</option>
									<option value="seafood">Stuffed Salmon</option>
								</select>
								<label>Food Options</label>
							</div>
						</div>
						
						<div class="col s6">
							<h3 class="">Select food option for {{ $guests->plusOne->name }}</h3>
							<div class="input-field">
								<select class="" name="add_guest_option">
									<option value="" disabled selected>Choose your food option</option>
									<option value="chicken">Grilled Mediterranean Chicken</option>
									<option value="beef">Grilled Rib-Eye</option>
									<option value="seafood">Stuffed Salmon</option>
								</select>
								<label>Food Options</label>
							</div>
						</div>
					</div>
					<div class="w3-container w3-padding">
						<div class="w3-row-padding">
							<div class="w3-col s6 text-left">
								<input type="submit" name="submit" class="btn" value="Confirm Food Selections" />
							</div>
							<div class="w3-col s6 text-right">
								<div class="">
									<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<script>
					$('select').material_select();
				</script>
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
									<option value="chicken">Grilled Mediterranean Chicken</option>
									<option value="beef">Grilled Rib-Eye</option>
									<option value="seafood">Stuffed Salmon</option>
								</select>
								<label>Food Options</label>
							</div>
						</div>
						
						<div class="col s6">
							<h3 class="">Select food option for {{ $guests->plusOne->name }}</h3>
							<div class="input-field">
								<select class="" name="add_guest_option">
									<option value="" disabled selected>Choose your food option</option>
									<option value="chicken">Grilled Mediterranean Chicken</option>
									<option value="beef">Grilled Rib-Eye</option>
									<option value="seafood">Stuffed Salmon</option>
								</select>
							</div>
						</div>
					</div>
					<div class="w3-container w3-padding">
						<div class="w3-row-padding">
							<div class="w3-col s6 text-left">
								<input type="submit" name="submit" class="btn" value="Confirm Food Selections" />
							</div>
							<div class="w3-col s6 text-right">
								<div class="">
									<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<script>
					$('select').material_select();
				</script>
			</div>
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
				<script>
					$('select').material_select();
				</script>
			</div>
			<div class="foodSelectionForm" style="display:none;">
				<h3 class="">Select food option for {{ $guests->name }}</h3>
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="w3-container w3-padding">
						<div class="input-field">
							<select class="browser-default foodSelectionSelect" name="food_option" disabled>
								<option value="" disabled selected>Choose your food option</option>
								<option class="tooltip" value="chicken">Grilled Mediterranean Chicken
								</option>
								<option class="tooltip" value="beef">Grilled Rib-Eye</option>
								<option class="tooltip" value="seafood">Stuffed Salmon</option>
							</select>
						</div>
					</div>
					<div class="w3-container w3-padding">
						<div class="w3-row-padding">
							<div class="w3-col s6 text-left">
								<input type="submit" name="submit" class="btn" value="Confirm Food Selections" />
							</div>
							<div class="w3-col s6 text-right">
								<div class="">
									<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<script>
				$('select').material_select();
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
						<select class="browser-default foodSelectionSelect" name="food_option">
							<option value="" disabled selected>Choose your food option</option>
							<option value="chicken">Grilled Mediterranean Chicken</option>
							<option value="beef">Grilled Rib-Eye</option>
							<option value="seafood">Stuffed Salmon</option>
						</select>
					</div>
					<div class="w3-container w3-padding">
						<div class="w3-row-padding">
							<div class="w3-col s6 text-left">
								<input type="submit" name="submit" class="btn" value="Confirm Food Selections" />
							</div>
							<div class="w3-col s6 text-right">
								<div class="">
									<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<script>
					$('select').material_select();
				</script>
			</div>
		@endif
	@endif
</div>