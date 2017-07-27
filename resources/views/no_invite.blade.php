@extends('app')

@section('content_title', 'Whooooooops')

@section('content')
	<div class="" id="confirmation">
		<h3 class="">Sorry but we did not find &lsquo;{{ $name }}&rsquo; on the invite list. Please try again. If you continue to experience issues please contact us directly.
		</h3>
		
	</div>
@endsection

@section('footer')
	<script type="text/javascript">
		var confirmationDiv = document.getElementById('confirmation');
		window.scrollTo(0, confirmationDiv.offsetTop);
	</script>
@endsection