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
			<h1 class="headerContent white-text">The Guest List</h1>
		</div>
	</header>
@endsection

@section('about_us')
	<div class="container">
		@if(session('status'))
			<div class="row">
				<div class="w3-card-4 w3-green w3-round-medium">
					<h2 class="text-center">{{ session('status') }}</h2>					
				</div>
			</div>
		@endif
		
		@if(count($guests) > 0)
			<!-- Guest list search field and new guest button -->
			<div class="row my-3">
				<div class="col-3">
					<a href="/guest_list/create" class="btn btn-lg blue-gradient mx-0">New Guest</a>
				</div>
				<div class="col-12 col-md-3">
					<div class="md-form">
						<input type="text" name="guest_search" class="form-control guest_search" placeholder="Enter Name To Search ...." />
						
						<label for="guest_search">Search Guest</label>
					</div>
				</div>
			</div>
			
			<div class="row my-5">
				<div class="col-12">
					<ul class="list-unstyled guestList">
						<li class="guestListHeader" style="opacity:0;">
							<div class="container-fluid">
								<div class="row text-center">
									<p class="col d-none d-md-block"></p>
									<p class="col">Names&nbsp;<span class="badge black">{{ $headCount }}</span></p>
									<p class="col d-none d-md-block">Responded<span></span></p>
									<p class="col">Going&nbsp;<span class="badge black">{{ $confirmedCount }}</span></p>
									<p class="col">Not Going&nbsp;<span class="badge black">{{ $declinedCount }}</span></p>
								</div>
							</div>
						</li>
						
						@foreach($guests as $guest)
							<li class="border-bottom py-2 wow fadeInUp">
								<div class="container-fluid">
									<div class="row text-center justify-content-center">
										<div class="col-12 col-md order-1 order-md-0 d-flex flex-column justify-content-center">
											<a href="/guest_list/{{ $guest->id }}/edit" class="btn btn-sm indigo lighten-1">Edit</a>
										</div>
										
										<div class="col d-flex flex-column justify-content-center">
											<span class="nameSearch">{{ $guest->name }}</span>

											<!-- Check if there is a plus one for the invitiation -->
											@if($guest->plusOne)
												<span class=""></span>
												<span class=""><i class="fa fa-plus"></i>&nbsp;{{ $guest->plusOne->name }}{!! $guest->plusOne->added_by == 'admin' ? '' : '&nbsp;<span class="red-text">(Added By Guest)</span>' !!}</span>
												<span class=""></span>
											@endif
										</div>
										
										<div class="col d-md-flex flex-column justify-content-center d-none">
											<span class="">{{ $guest->responded == null ? 'N' : 'Y' }}</span>
										</div>
										
										@if($guest->rsvp == 'Y')
											<div class="col d-flex flex-column justify-content-center">
												<span class=""><i class="fa fa-check-circle fa-lg" style="color:green;"></i></span>
												
												@if($guest->plusOne)
													<span class=""><i class="fa fa-check-circle fa-lg" style="color:green;"></i></span>
												@endif
											</div>
											
											<div class="col"></div>
										@elseif($guest->rsvp == 'N')
											<div class="col"></div>

											<div class="col d-flex flex-column justify-content-center">
												<span class=""><i class="fa fa-times-circle fa-lg col" style="color:red;"></i></span>
											
												@if($guest->plusOne)
													<span class=""><i class="fa fa-times-circle fa-lg col" style="color:red;"></i></span>
												@endif
											</div>
										@else
											<div class="col"></div>
											<div class="col"></div>
										@endif
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		@else
			<div class="w3-row w3-padding-24">
				<h2 class="text-center">You don't have anybody on your guest list. Where's the love? Add your first guest <a href="guest_list/create" class="">here</a></h2>
			</div>
		@endif
	</div>
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