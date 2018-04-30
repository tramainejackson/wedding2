@extends('layouts.app')

@section('addt_style')
	.bgimg {
		background-image: url("/images/bridalparty1.png");
		min-height: 65%;
		background-position: center center;
		background-size: cover;
	}
@endsection

@section('header')
	<!-- Header / Home-->
	<header class="view bgimg" id="home">
		<div class="mask flex-column flex-center rgba-black-light">
			<div class="partyHeader white-text text-center px-3">
				<h1 class="display-3">Wedding Party</h1>
				<h5 class="">- been down since day one</h5>
			</div>
		</div>
	</header>

	<!--- Into to Party --->
	<div class="partyPage">
		<div id="partyPageBgrd"></div>

		@for ($x = 0; $x < count($bridalParty); $x+=2)
		
			<!--- Matchup cards --->
			<div class="container wow fadeInUp">
				<div class="row">
					<!--Bride Card-->
					<div class="col-12 col-md-8 col-lg-6 mx-auto my-2 my-lg-0">
						<div class="card ovf-hidden">
							<!-- Card image -->
							<div class="view">
								<img src="{{ $bridalParty[$x]->image }}" class="card-img-top img-fluid" />
								<div class="mask rgba-white-slight">
									<h2 class="w-100 py-3 rgba-black-strong text-center white-text">{{ $bridalParty[$x]->name }}</h2>
								</div>
							</div>
							
							<!-- Card Body -->
							<div class="card-body p-0">
								<div class="card-title text-center">
									<h2 class="h2-responsive py-3 m-0 coolText2 wedding-color-gradient white-text">{{ $bridalParty[$x]->title }}</h2>
								</div>
								<div class="card-text p-3">
									<p class="">{{ substr($bridalParty[$x]->blurb, 0, 150) }}.....</p>

									<a class="activator btn position-relative peach-gradient">Read More</a>
								</div>
							</div>
							
							<!-- Card reveal -->
							<div class="card-reveal white">
								<div class="card-title content-title">
									<h2 class="h2-responsive py-3 px-4 m-0 coolText2 wedding-color-gradient white-text text-center">{{  $bridalParty[$x]->name . ' - ' . $bridalParty[$x]->title }}
									<i class="fa fa-close text-muted font-smaill"></i>
									</h2>
								</div>
								<div class="content-text p-3">
									<p class="">{{ $bridalParty[$x]->blurb }}</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Groom Card -->
					<div class="col-12 col-md-8 col-lg-6 mx-auto my-2 my-lg-0">
						<div class="card ovf-hidden">
							<!-- Card image -->
							<div class="view">
								<img src="{{ $bridalParty[$x+1]->image }}" class=" card-img-top img-fluid" />
								<div class="mask rgba-white-slight">
									<h2 class="w-100 py-3 rgba-black-strong text-center white-text">{{ $bridalParty[$x+1]->name }}</h2>
								</div>
							</div>
							
							<div class="card-body p-0">
								<div class="card-title text-center">
									<h2 class="h2-responsive py-3 m-0 coolText2 wedding-color-gradient white-text">{{ $bridalParty[$x+1]->title }}</h2>
								</div>
								<div class="card-text p-3">
									<p class="">{{ substr($bridalParty[$x+1]->blurb, 0, 150) }}.....</p>

									<a class="activator btn position-relative peach-gradient">Read More</a>
								</div>
							</div>
							
							<!-- Card reveal -->
							<div class="card-reveal white">
								<div class="content">
									<div class="card-title content-title">
										<h2 class="h2-responsive py-3 px-4 m-0 coolText2 wedding-color-gradient white-text text-center">{{ $bridalParty[$x+1]->name . ' - ' . $bridalParty[$x+1]->title }}
										<i class="fa fa-close text-muted font-smaill"></i>
										</h2>
									</div>
									<div class="content-text p-3">
										<p class="">{{ $bridalParty[$x+1]->blurb }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="divider"></div>
		@endfor
	</div>
@endsection

@section('about_us')
@endsection

@section('wedding_information')
@endsection

@section('rsvp_information')
@endsection

@section('footer')
@endsection