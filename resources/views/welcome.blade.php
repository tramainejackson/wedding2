@extends('layouts.app')

@section('addt_style')
	body {
		background: url(/images/map3.jpg);
		background-attachment: fixed;
		background-size: cover;
		background-position: center center;
	}
@endsection

@section('header')
	@include('welcome_header')
@endsection

@section('about_us')
	@include('about_us')
@endsection

@section('wedding_information')
	@include('wedding_info')
@endsection

@section('rsvp_information')
	<!-- RSVP modal -->
	<div id="reservationModal" class="modal fade">
		<div class="modal-dialog modal-lg" tabindex="-1" role="dialog" aria-labelledby="reservationModal" aria-hidden="true" data-backdrop="true">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="h2-responsive">Wedding Reservation</h2>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="">
						<h3 class="">WOW!!!!!! Is it May already? Time is flying! At this time if you still need to make an RSVP, please contact us directly. Our RSVP's filled up so we will let you know if we still have any availability.</h3>
						<h5 class="">Thanks,<br/><br/>Ashley & Tramaine</h5>
					</div>
					<!-- <div class="guestRsvpCheckFormContainer">
						<h1 class="h1-responsive text-center">CAN YOU COME?</h1>
						<p class="text-center">We really hope you can make it.</p>
						<p class="text-center"><i>Sincerely, Tramaine & Ashley</i></p>
					 
						{!! Form::open([ 'action' => 'GuestController@store', 'class' => 'guestRsvpCheckForm']) !!}
							<div class="row">
								<div class="col">
									<div class="md-form">
										<input id="first" class="form-control" type="text" name="first" required />
										
										<label for="first" class="">First Name</label>
									</div>
								</div>
								<div class="col">
									<div class="md-form">
										<input id="last" class="form-control" type="text" name="last" required />
									
										<label for="last" class="">Last Name</label>
									</div>
								</div>
							</div>
							<div class="md-form">
								<input id="email" class="form-control" type="email" name="email" />
							
								<label for="email" class="">Email Address</label>
							</div>
							<div class="md-form">
								<button type="button" class="getRSVP btn btn-lg green darken-2">Next</button>
							</div>
						{!! Form::close() !!}
					</div> -->
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer')
	<!-- Description modal for all the food selections -->
	<div class="foodDescList" id="food_desc_list container-fluid">
		<div class="row">
			<div class="col-12 col-lg my-3">
				<div class="row text-center align-items-center">
					<h2 class="col-12 h2-responsive text-muted">Grilled Med Chicken</h2>
					
					<div class="col-6">
						<img src="{{ asset('/images/med_chicken.jpg') }}" class="img-fluid rounded-circle" />
					</div>
					<div class="col-6">
						<p class="">Grilled chicken topped with Feta Cheese, Kalamata Olives, Tri Color Peppers, Red Onions, Lemon Thyme Sauce</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg my-3">
				<div class="row text-center align-items-center">
					<h2 class="col-12 h2-responsive text-muted">Grilled Rib-Eye</h2>
					
					<div class="col-6">
						<img src="{{ asset('/images/grilled_steak.jpg') }}" class="img-fluid rounded-circle" />
					</div>
					
					<div class="col-6">
						<p class="">Tender Rib Eye Grilled to Perfection with a Caramelized Onion Demi-glace</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg my-3">
				<div class="row text-center align-items-center">
					<h2 class="col-12 h2-responsive text-muted">Stuffed Salmon</h2>
				
					<div class="col-6">
						<img src="{{ asset('/images/salmon.jpg') }}" class="img-fluid rounded-circle" />
					</div>
					<div class="col-6">
						<p class="">Salmon stuffed with Crab Imperial topped with Hollandaise Sauce</p>
					</div>
				</div>
			</div>
			<div class="col-12 text-center">
				<button type="button" class="btn red lighten-2 closeFoodDesc">Close</button>
			</div>
		</div>
	</div>
@endsection