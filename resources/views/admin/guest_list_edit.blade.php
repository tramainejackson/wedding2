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
	<div class="container mobileDiv py-5">
		@if(session('status'))
			<span class="hidden returnMessage">{{ session('status') }}</span>
			@section('addt_script')
				<script type="text/javascript">
					toastr["success"]($('.returnMessage').text());
				</script>
			@endsection
		@endif
		<div class="row">
			<div class="col text-center">				
				<h2 class="">You Are Editing {{ ucwords($guest->name) }}'s Invitation</h2>
			</div>
		</div>

		<!-- Guest edit form -->
		{!! Form::model($guest, [ 'action' => ['GuestController@update2', $guest->id], 'method' => 'PATCH', 'class' => 'editGuestForm']) !!}
		
			<div class="row">
				<div class="md-form col">
					<div class="d-flex align-items-center justify-content-center">
						<button class="inviteCheck btn{{ $guest->rsvp == 'Y' ? ' green active' : ' stylish-color-dark' }}"  id="rsvpYes" type="button">Comfirmed Invite
							<input hidden class="hidden" type="checkbox" name="rsvpYes" value="Y"{{ $guest->rsvp == "Y" ? ' checked' : '' }} />
						</button>


						<button class="inviteCheck btn{{ $guest->rsvp == 'N' ? ' red active' : ' stylish-color-dark' }}" id="rsvpNo" type="button">Declined Invite
							<input hidden class="hidden" type="checkbox" name="rsvpNo" value="Y"{{ $guest->rsvp == "N" ? ' checked' : '' }} />
						</button>
					</div>
				</div>

				<div class="md-form col-12">

					<input id="first" class="form-control" type="text" name="name" value="{{ ucwords($guest->name) }}" />
					
					<label for="name" class="active">Guest</label>
			
				</div>
				
				<div class="md-form col-12">
				
					<input id="plus_one" class="form-control" type="text" name="plus_one" value="{{ $guest->plusOne ? ucwords($guest->plusOne->name) : '' }}" placeholder="Add A Plus One" />
						
					<label for="Plus One" class="active">Plus One</label>

				</div>
				
				<div class="md-form col-12">
				
					<input id="email" class="form-control" type="email" name="email" value="{{ $guest->email }}" placeholder="Add An Email Address" />
						
					<label for="email" class="active">Email Address</label>

				</div>
				
				<div class="form-row w-100">
					
					<div class="md-form col-5">
					
						<input id="address" class="form-control" type="text" name="address" value="{{ $guest->address }}" placeholder="Add An Address" />
							
						<label for="address" class="active">Address</label>
						
					</div>
					
					<div class="md-form col-3">
					
						<input id="city" class="form-control" type="text" name="city" value="{{ $guest->city }}" placeholder="Add A City" />
							
						<label for="city" class="active">City</label>
						
					</div>
					
					<div class="md-form col-2">
					
						<select class="mdb-select" name="state">
							@foreach($states as $state)
							
								<option value="{{ $state->state }}">{{ $state->state }}</option>
							
							@endforeach
						</select>
							
						<label for="state" class="active">State</label>
						
					</div>
					
					<div class="md-form col-2">
						
						<input id="zip" class="form-control" type="number" name="zip" value="{{ $guest->zip }}" placeholder="Add A Zip Code" />
							
						<label for="zip" class="active">Zip Code</label>

					</div>
					
				</div>
				
				<div class="md-form col-12">
					<button class="btn red accent-2 m-sm-0" type="submit">Save Changes</button>
					
					<button class="btn yellow darken-4" type="button" data-toggle="modal" data-target="#delete_guest_modal">Remove Invite</button>
				</div>
			</div>
			
		{!! Form::close() !!}
	</div>
	
	<!-- Delete guest confirmation modal -->
	<div class="modal fade" id="delete_guest_modal" tabindex="-1" role="dialog" aria-labelledby="deleteGuestModal" aria-hidden="true" data-backdrop="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="">Delete Guest</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{!! Form::model($guest, [ 'action' => ['GuestController@destroy', $guest->id], 'method' => 'DELETE', 'class' => 'removeGuestForm']) !!}
						<div class="">
							<span>Are you sure you want to delete this guest?</span>
						</div>
						<div class="my-3">
							<table class="table table-responsive-md">
								<thead class="danger-color-dark white-text">
									<tr>
										<th>Name</th>
										<th>Email Address</th>
										<th>Plus One</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $guest->name }}</td>
										<td>{{ $guest->name }}</td>
										
										@if($guest->plusOne)
											<td>{{ $guest->plusOne->name }}</td>
										@else
											<td>No Plus One Added</td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
						<div class="d-flex flex-colum flex-lg-row align-items-center justify-content-around">
							<button class="btn danger-color-dark" type="Submit">Remove</button>
							<button class="btn close p-3 yellow darken-2" type="button" data-dismiss="modal">Cancel</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection