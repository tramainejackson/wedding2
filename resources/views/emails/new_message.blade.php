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
			<h2 class="">Thanks for reaching out to us. Below is the following message that we received. We will respond as soon as we check out email.</h2>
		</div>
		<div class="emailAttr">
			<h2 class="">From: <span style="font-size: 18px;">{{ $messageEmail->name }}</span></h1>
			<h2 class="">Email: <a href="mailTo:{{ $messageEmail->email }}" class="" style="font-size: 17px;">{{ $messageEmail->email }}</a></h2>
			<h2 class=""><b>Message:</b> <span style="font-size: 18px;">{{ $messageEmail->message }}</span></h2>
		</div>
		<div class="footer">
			<div class="">
				<h5 class="">&copy;&nbsp; & &reg;&nbsp; by Tramaine</h5>
			</div>
		</div>
	</body>
</html>