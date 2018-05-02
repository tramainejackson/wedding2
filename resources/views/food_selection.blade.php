<div class="container-fluid foodSelectionDiv">
	@if($guests->plusOne)
		@if($guests->rsvp != 'Y')
			<div class="row" id="">
				<div class="col-12">
					@if($guests->plusOne->added_by != null)
						<h3 class="h3-responsive">Thanks for confirming your reservation. Once you confirm your food selections we will receive an email with your selections. If you need to make any changes please reach out to us.</h3>
					@else
						<h3 class="h3-responsive">Thanks for confirming your reservation. We did not originally have a plus one added for you but we will try to accommodate your plus one and confirm with you by June 1st. Please make your food selections below. If you need to make any changes please reach out to us directly.</h3>
					@endif
				</div>
				
				<div class="col-12 text-center mb-4">
					<h3 class="h3-responsive" style="background: linear-gradient(#d4be95, beige, rgba(0, 0, 0, 0));">Food Options</h3>
				</div>
			</div>
			
			<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
				<div class="row">
					{{ csrf_field() }}
					
					<div class="col">
						<h3 class="">Select food option for {{ $guests->name }}</h3>
						
						<div class="md-form">
							<select class="mdb-select" name="food_option">
								<option value="" disabled selected>Choose your food option</option>
								<option value="chicken">Grilled Mediterranean Chicken</option>
								<option value="beef">Grilled Rib-Eye</option>
								<option value="seafood">Stuffed Salmon</option>
							</select>
							<label>Food Options</label>
						</div>
					</div>
					
					<div class="col">
						<h3 class="">Select food option for {{ $guests->plusOne->name }}</h3>
						<div class="md-form">
							<select class="mdb-select" name="add_guest_option">
								<option value="" disabled selected>Choose your food option</option>
								<option value="chicken">Grilled Mediterranean Chicken</option>
								<option value="beef">Grilled Rib-Eye</option>
								<option value="seafood">Stuffed Salmon</option>
							</select>
							<label>Food Options</label>
						</div>
					</div>
				</div>
				<div class="row align-items-center justify-content-between">
					<button type="submit" name="submit" class="btn green lighter-2">Confirm Food Selections</button>

					<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
				</div>
			</form>
		@else
			<div class="row" id="">
				<div class="col">
					<h3 class="">Welcome back. Looks like you forgot something?!?! It's cool, you still got time. Please make your food selections</h3>
				</div>
				
				<div class="col-12 text-center mb-4">
					<h3 class="h3-responsive" style="background: linear-gradient(#d4be95, beige, rgba(0, 0, 0, 0));">Food Options</h3>
				</div>
			</div>
			
			<!-- Food Selection Form -->
			<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
				<div class="row foodSelectionForm">
					{{ csrf_field() }}
					
					<div class="col ">
						<h3 class="">Select food option for {{ $guests->name }}</h3>
						<div class="md-form">
							<select class="mdb-select" name="food_option">
								<option value="" disabled selected>Choose your food option</option>
								<option value="chicken">Grilled Mediterranean Chicken</option>
								<option value="beef">Grilled Rib-Eye</option>
								<option value="seafood">Stuffed Salmon</option>
							</select>
							<label>Food Options</label>
						</div>
					</div>
						
					<div class="col">
						<h3 class="">Select food option for {{ $guests->plusOne->name }}</h3>
						<div class="md-form">
							<select class="mdb-select" name="add_guest_option">
								<option value="" disabled selected>Choose your food option</option>
								<option value="chicken">Grilled Mediterranean Chicken</option>
								<option value="beef">Grilled Rib-Eye</option>
								<option value="seafood">Stuffed Salmon</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row align-items-center justify-content-between">
					<button type="submit" name="submit" class="btn green lighter-2">Confirm Food Selections</button>

					<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
				</div>
			</form>
		@endif
	@else
		@if($guests->responded != 'Y')
			<div class="" id="">
				<h3 class="">Thanks for confirming your reservation {{ $guests->name }}.</h3>
			</div>
			<div class="plusOneOption mb-4">
				<h3 class="">Are You Bringing A Plus One?</h3>
				<button type="button" class="yesPO btn green darken-1">Yes</button>
				<button type="button" class="noPO btn red darken-1">No</button>
			</div>
			
			<div class="plusOneSelectionForm my-3" style="display:none;">
				<form name="plus_one_selection_form" class="" method="PATCH">
					<div class="md-form">
						<input type="text" name="plus_one" class="form-control" value="{{ old('plus_one') }}" placeholder="Enter Full Name" disabled />
						
						<label for="plus_one" class="">Plus One Name</label>
					</div>
					<div class="">
						<input type="number" name="guest_id" class="hidden form-control" value="{{$guests->id}}" hidden />
						
						<button type="button" class="btn green sendPlusOne">Add Plus One</button>
					</div>
				</form>
			</div>
			
			<div class="foodSelectionForm" style="display:none;">
				<div class="col-12 text-center mb-4">
					<h3 class="h3-responsive" style="background: linear-gradient(#d4be95, beige, rgba(0, 0, 0, 0));">Select food option for {{ $guests->name }}</h3>
				</div>
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="container-fluid">
						<div class="md-form">
							<select class="mdb-select foodSelectionSelect" name="food_option">
								<option value="" disabled selected>Choose your food option</option>
								<option class="" value="chicken">Grilled Mediterranean Chicken
								</option>
								<option class="" value="beef">Grilled Rib-Eye</option>
								<option class="" value="seafood">Stuffed Salmon</option>
							</select>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col">
								<button type="submit" class="btn green">Confirm Food Selections</button>
							</div>
							<div class="col">
								<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		@endif
		
		@if($guests->responded == 'Y')
			<div class="" id="">
				<h3 class="">Welcome back {{ $guests->name }}. Looks like you forgot something?!?! It's cool, you still got time. Please make your food selection</h3>
			</div>
			
			<div class="foodSelectionForm">
				<h3 class="">Select food option for {{ $guests->name }}</h3>
				<form name="food_selection_form" class="" action="/food_selection/{{ $guests->id }}" method="POST">
					{{ csrf_field() }}
					
					<div class="md-form">
						<select class="mdb-select foodSelectionSelect" name="food_option">
							<option value="" disabled selected>Choose your food option</option>
							<option value="chicken">Grilled Mediterranean Chicken</option>
							<option value="beef">Grilled Rib-Eye</option>
							<option value="seafood">Stuffed Salmon</option>
						</select>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col">
								<button type="submit" class="btn green">Confirm Food Selections</button>
							</div>
							<div class="col">
								<div class="">
									<button type="button" class="btn pink lighten-2 foodDescrBtn">Food Descriptions</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		@endif
	@endif
	
	<script>
		$('.mdb-select').material_select();
	</script>
</div>