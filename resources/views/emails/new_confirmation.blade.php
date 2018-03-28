<!DOCTYPE html>
<html>
	<head>
		<title>It's Wedding Season</title>
		<style>
			body {
				margin: 0px;
			}
			
			.emailMessage {
				text-align:-webkit-center;
				text-align:center;
				padding: 20px 0px 5px;
				margin: 0px 5%; 
				border-bottom: double 5px;
			}
			
			.emailAttr {
				text-align:-webkit-center;
				text-align:center;
				padding:60px 20px;
			}
			
			.emailAttr h2{
				text-align: -webkit-left;
				text-align: left;
				margin: 0px;
			}
			
			.header h1 {
				text-align: -webkit-center;
				text-align: center;
				margin: 0px;
			}
			
			img {
				max-height:150px;
				margin: 0 auto;
				display: -webkit-box;
				display: block;
			}
			
			.footer {
				width:100%;
				text-align:-webkit-center; 
				text-align:center; 
				background:black; 
				color:white;
				font-size: 140%;
				padding: 10px 0px;
			}
			
			@media (max-width: 767px) {
				.emailMessage {
					text-align:-webkit-center;
					text-align:center;
					padding: 20px 0px 5px;
					margin: 0px 5%; 
					border-bottom: double 5px;
				}
			}
		</style>
	</head>
	<body style="position:relative;">
		<header class="header" style="height:250px;">
			<h1 class="" style="margin-bottom: -20px;">Ashley</h1>
			<img class="" src="{{ asset('/images/infinity1.png') }}">
			<h1 class="" style="margin-top: -20px;">Tramaine</h1>
		</header>
		<div class="emailMessage">
			<h2 class="">Thanks for confirming your reservation and food selections for our wedding. Below is the information that we have for your RSVP.</h2>
		</div>
		@php $foodOptions = DB::table('food_selections')->where('guests_id', $guest->id)->first();	@endphp
		@if($guest->plusOne != null)
			<div class="">
				<h3 class=""><u>Guest #1</u></h3>
				<p class="">Name: {{ $guest->name }}</p>
				<p class="">Food Selection: {{ ucfirst($foodOptions->food_option) }}</p>
			</div>
			<div class="">
				<h3 class=""><u>Guest #2</u></h3>
				<p class="">Name: {{ $guest->plusOne->name }}</p>
				<p class="">Food Selection: {{ ucfirst($foodOptions->add_guest_option) }}</p>
			</div>
		@else
			<div class="">
				<h3 class=""><u>Guest</u></h3>
				<p class="">Name: {{ $guest->name }}</p>
				<p class="">Food Selection: {{ ucfirst($foodOptions->food_option) }}</p>
			</div>
		@endif
	</body>
</html>