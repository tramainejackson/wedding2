@extends('layouts.app')

@section('header')
	@if(session('status'))
		<!-- RSVP Confirmation modal -->
		  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px" id="confirmation_modal">
			<div class="w3-container w3-white text-center">
			  <h1 class="w3-wide">{{ session('status') }}</h1>
			</div>
			<span onclick="document.getElementById('confirmation_modal').style.display='none'" class="btn w3-display-topright">&times;</span>
		  </div>
	@endif
	
	@if(Auth::guest())
		<a href="/login" style="position:absolute;z-index:2;background:transparent;right:20px;" class="btn btn-link btn-lg d-none d-md-block">Login</a>
	@endif
		
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
	<div id="id01" class="modal fade">
	  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
		<div class="w3-container w3-white text-center row">
		  
		  <h1 class="w3-wide col s12">CAN YOU COME?</h1>
		  <p class="col s12">We really hope you can make it.</p>
		  <p class="text-center"><i>Sincerely, Tramaine & Ashley</i></p>
		  
		  {!! Form::open([ 'action' => 'GuestController@store', 'class' => 'col s12']) !!}
			<div class="row">
				<div class="input-field col s6">
					<input id="first" class="w3-large" type="text" name="first">
					<label for="first" class="active">First Name</label>
				</div>
				<div class="input-field col s6">
					<input id="last" class="w3-large" type="text" name="last">
					<label for="last" class="active">Last Name</label>
				</div>
				<div class="input-field col s12">
					<input id="email" class="w3-large" type="email" name="email">
					<label for="email" class="active">Email Address</label>
				</div>
				<div class="">
					<button type="button" class="w3-xlarge getRSVP btn green darken-2" style="height:auto">Next</button>
				</div>
			</div>
		{!! Form::close() !!}
		</div>
		<span onclick="document.getElementById('id01').style.display='none'; document.getElementById('food_desc_list').style.display='none';" class="btn w3-display-topright">&times;</span>
	  </div>
	</div>
@endsection

@section('footer')
	<!-- Description modal for all the food selections -->
	<div class="foodDescList" id="food_desc_list">
		<ul class="">
			<li class="">
				<div class="container" style="width: 100%;">
					<h2 class="">Grilled Mediterranean Chicken</h2>
					<div class="row">
						<div class="col s12 text-center">
							<img src="{{ asset('/images/med_chicken.jpg') }}" class="circle  responsive-img" />
						</div>
						<div class="col s12">
							<p class="">Grilled chicken topped with Feta Cheese, Kalamata Olives, Tri Color Peppers, Red Onions, Lemon Thyme Sauce</p>
						</div>
					</div>
				</div>
			</li>
			<li class="">
				<div class="container" style="width: 100%;">
					<h2 class="">Grilled Rib-Eye</h2>
					<div class="row">
						<div class="col s12 text-center">
							<img src="{{ asset('/images/grilled_steak.jpg') }}" class="circle  responsive-img" />
						</div>
						<div class="col s12">
							<p class="">Tender Rib Eye Grilled to Perfection with a Caramelized Onion Demi-glace</p>
						</div>
					</div>
				</div>
			</li>
			<li class="">
				<div class="container" style="width: 100%;">
					<h2 class="">Stuffed Salmon</h2>
					<div class="row">
						<div class="col s12 text-center">
							<img src="{{ asset('/images/salmon.jpg') }}" class="circle  responsive-img" />
						</div>
						<div class="col s12">
							<p class="">Salmon stuffed with Crab Imperial topped with Hollandaise Sauce</p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="text-center">
			<button type="button" class="btn red lighten-2 closeFoodDesc">Close</button>
		</div>
	</div>
	<script>
		$('body').on('click', '.closeFoodDesc', function() {
			$('.foodDescList').animate({right:'-=100%'});
		});
		
		$('body').on('click', '.getRSVP', function() {
			getRSVP($('#first').val(), $('#last').val(), $('#email').val());
		});
		
		$('body').on('click', '.yesPO', function() {
			$('.foodSelectionForm').slideUp(function() {
				$('.plusOneSelectionForm').slideDown();
				$('.foodSelectionSelect').attr('disabled', true);
				$('[name="plus_one"]').removeAttr('disabled').focus();
			});
		});
		
		$('body').on('click', '.noPO', function() {
			$('.plusOneSelectionForm').slideUp(function() {
				$('.foodSelectionForm').slideDown();				
				$('[name="plus_one"]').attr('disabled', true);
				$('.foodSelectionSelect').removeAttr('disabled').focus();
			});
			
		});
		
		$('body').on('click', '.findRSVP', function() {
			$('#confirmation').fadeOut(function() {
				$('#id01.w3-modal .w3-modal-content > div.w3-container').fadeIn(function() {
					$('#confirmation').remove();					
				});
			});
		});
	</script>
@endsection