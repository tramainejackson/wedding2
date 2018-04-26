@extends('layouts.app')

@section('addt_style')
	body {
		background-color: #f5f8fa;
	}
	
	.bgimg {
		min-height: 30%;
		background: url(/images/at2.jpg);
		background-size: cover;
		background-position: center center;
		background-repeat: no-repeat;
	}
@endsection

@section('header')	
	<!-- Header / Home-->
	<header class="bgimg text-center" id="home">
		<div class="d-flex align-items-center justify-content-center">
			<h1 class="headerContent white-text">The Food Selections</h1>
		</div>
	</header>
@endsection

@section('about_us')
	<div class="container py-5">
	
		@if(session('status'))
			<div class="w3-row">
				<div class="w3-card-4 w3-green w3-round-medium">
					<h2 class="w3-center">{{ session('status') }}</h2>					
				</div>
			</div>
		@endif
		
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="">You Are Editing {{ ucwords($guest->name) }}'s Food Selection</h2>
			</div>
		</div>
		
		{!! Form::model($guest, [ 'action' => ['GuestController@create_food_selection', $guest->id], 'method' => 'PATCH', 'class' => '']) !!}
			<div class="row">
				<div class="col-12 col-xl-6">
					<div class="md-form">
						<select class="mdb-select" name="food_option">
							<option value="blank">No Selection Yet</option>
							<option value="chicken" {{ $guest->food_option ? $guest->food_option->food_option == 'chicken' ? 'selected' : '' : '' }}>Grilled Mediterranean Chicken</option>
							<option value="beef" {{ $guest->food_option ? $guest->food_option->food_option == 'beef' ? 'selected' : '' : '' }}>Grilled Rib-Eye</option>
							<option value="seafood" {{ $guest->food_option ? $guest->food_option->food_option == 'seafood' ? 'selected' : '' : '' }}>Stuffed Salmon</option>
						</select>
							
						<label for="name" class="">{{ ucwords($guest->name) }} Food Selection</label>
					</div>
					
					@if($guest->plusOne)
						<div class="md-form">
							<select class="mdb-select" name="add_guest_option">
								<option value="blank">No Selection Yet</option>
								<option value="chicken" {{ $guest->food_option ? $guest->food_option->add_guest_option == 'chicken' ? 'selected' : '' : '' }}>Grilled Mediterranean Chicken</option>
								<option value="beef" {{ $guest->food_option ? $guest->food_option->add_guest_option == 'beef' ? 'selected' : '' : '' }}>Grilled Rib-Eye</option>
								<option value="seafood" {{ $guest->food_option ? $guest->food_option->add_guest_option == 'seafood' ? 'selected' : '' : '' }}>Stuffed Salmon</option>
							</select>
							
							<label for="Plus One" class="">{{ $guest->plusOne->name }} Food Selection</label>
						</div>
					@endif

					<div class="col-12 px-0">
						<div class="md-form">
							{!! Form::submit('Save Changes', ['name' => 'submit', 'class' => 'btn red accent-2 m-0']) !!}
						</div>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection