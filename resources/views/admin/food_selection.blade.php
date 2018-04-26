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
	@if(count($guests) > 0)
		<div class="container">
	
			@if(session('status'))
				<div class="w3-row">
					<div class="w3-card-4 w3-green w3-round-medium">
						<h2 class="">{{ session('status') }}</h2>					
					</div>
				</div>
			@endif
			
			<!-- Food selection seach option -->
			<div class="row my-5">
				<div class="col-12 col-md-4">
					<div class="md-form">
						<input type="text" name="guest_search" class="form-control guest_search" placeholder="Enter Name To Search ...." />

						<label for="guest_search">Search Guest</label>
					</div>
				</div>
			</div>
			
			<!-- Food selections count -->
			<div class="row text-center mb-5 foodSelectionCount">
				<div class="col-12 col-md">
					<p class="">
						<button class="btn black" type="button">Total Count
							<span class="">{{ $guestSeafood->count() + $guestChicken->count() + $guestBeef->count() + $addGuestSeafood->count() + $addGuestChicken->count() + $addGuestBeef->count() }}</span>
						</button>
					</p>
				</div>
				<div class="col-4 col-md">
					<p class="">
						<button class="btn orange darken-3" type="button">Seafood
							<span class="">{{ $guestSeafood->count() + $addGuestSeafood->count() }}</span>
						</button>
					</p>
				</div>
				<div class="col-4 col-md">
					<p class="">
						<button class="btn indigo accent-3" type="button">Chicken
							<span class="">{{ $guestChicken->count() + $addGuestChicken->count() }}</span>
						</button>
					</p>
				</div>
				<div class="col-4 col-md">
					<p class="">
						<button class="btn w3-round cyan lighten-2" type="button">Beef
							<span class="">{{ $guestBeef->count() + $addGuestBeef->count() }}</span>
						</button>
					</p>
				</div>
			</div>
			
			<!-- Guest food selections -->
			<div class="row">
				<ul class="list-unstyled w-100 guestList">
					<li class="guestListHeader border-bottom" style="opacity:0;">
						<div class="container-fluid">
							<div class="row text-center">
								<div class="col d-none d-md-block"></div>
								<div class="col">
									<p class="">Names</p>
								</div>
								<div class="col">
									<p class="">Food Selection</p>
								</div>
							</div>
						</div>
					</li>
					@foreach($guests as $guest)
						<li class="border-bottom py-3" style="opacity:0;">
							<div class="container-fluid">
								<div class="row text-center">
									<div class="col-12 col-md order-1 order-md-0">
										<!-- Action button for guest food edit -->
										@if($guest->food_option)
											<span class="">
												<a href="/food_selection/{{ $guest->food_option->id }}/edit" class="btn blue darken-3 d-block d-md-inline">Edit &nbsp;Selection</a>
											</span>
										@else
											<span class="">
												<a href="/food_selection/{{ $guest->id }}/create" class="btn blue lighten-2 d-block d-md-inline">Make Selection</a>
											</span>
										@endif
									</div>
									<div class="col d-flex flex-column justify-content-center align-items-center">
										<!-- Guest Name -->
										<span class=" nameSearch">{{ $guest->name }}</span>
										
										<!-- Check if there is a plus one for the invitiation -->
										@if($guest->plusOne)
											<span class=""></span>
											
											<span class="">{{ $guest->plusOne->name }}</span>
										@endif
									</div>
									<div class="col d-flex flex-column justify-content-center align-items-center">
										<!-- Guest food selection -->
										@if($guest->food_option)
											@if($guest->food_selected == 'Y')
												<span class="">{{ ucfirst($guest->food_option->food_option) }}</span>
											@else
												<span class="">No Selection Yet</span>
											@endif
										@else
											<span class="">No Selection Yet</span>
										@endif
										
										@if($guest->food_option)
												@if($guest->food_selected == 'Y')
													<span class="">{{ ucfirst($guest->food_option->add_guest_option) }}</span>
												@else
													<span class="">No Selection Yet</span>
												@endif
											@else
												<span class="">No Selection Yet</span>
											@endif
									</div>
								</div>
							</div>
							
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	@else
		<div class="container">
			<div class="w3-row w3-padding-24">
				<h2 class="text-center">You don't have anybody on your guest list. Where's the love? Add your first guest <a href="guest_list/create" class="">here</a></h2>
			</div>
		</div>
	@endif
@endsection

@section('footer')
	<script type="text/javascript">
		//ScrollFire plugin init
		var options = [
		  {selector: '.guestList li', offset: 100, callback: function(el) {
			$(el).fadeTo("slow", 1);
		  } }
		];

		for(var x=1; x <= ($('.guestList > li').length - 1); x++) {
			var listItem = {};
			
			$('.guestList > li').eq(x).addClass('guestNum'+x);
			listItem = {
				selector: '.guestNum'+x,
				offset: 100,
				callback: function(el) {
					$(el).fadeTo("slow", 1);
				}
			}
			
			options.push(listItem);
		}
		Materialize.scrollFire(options);
	</script>
@endsection