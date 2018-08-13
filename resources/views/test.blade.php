@extends('layouts.app')
<div class="foodDescList">
	<ul class="">
		<li class="">
			<div class="container">
				<h2 class="">Grilled Mediterranean Chicken</h2>
				<div class="row valign-wrapper">
					<div class="col s2">
						<img src="{{ asset('/images/med_chicken.jpg') }}" class="circle  responsive-img" />
					</div>
					<div class="col s10">
						<p class="">Grilled chicken topped with Feta Cheese, Kalamata Olives, Tri Color Peppers, Red Onions, Lemon Thyme Sauce</p>
					</div>
				</div>
			</div>
		</li>
		<li class="">
			<div class="container">
				<h2 class="">Grilled Rib-Eye</h2>
				<div class="row valign-wrapper">
					<div class="col s2">
						<img src="{{ asset('/images/grilled_steak.jpg') }}" class="circle  responsive-img" />
					</div>
					<div class="col s10">
						<p class="">Tender Rib Eye Grilled to Perfection with a Caramelized Onion Demi-glace</p>
					</div>
				</div>
			</div>
		</li>
		<li class="">
			<div class="container">
				<h2 class="">Stuffed Salmon</h2>
				<div class="row valign-wrapper">
					<div class="col s2">
						<img src="{{ asset('/images/salmon.jpg') }}" class="circle  responsive-img" />
					</div>
					<div class="col s10">
						<p class="">Salmon stuffed with Crab Imperial topped with Hollandaise Sauce</p>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>