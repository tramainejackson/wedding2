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
	<div class="container py-5">
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
					<div class="input-field col s6" style="margin-top:12px;">
						<input id="first" class="form-control" type="text" name="name" value="{{ ucwords($guest->name) }}" style="padding-left:20px;" />
						<label for="name" class="active">Guest</label>
					</div>					
				</div>
				<div class="md-form col-12">
					<div class="input-field col s6">
						<input id="plus_one" class="form-control" type="text" name="plus_one" value="{{ $guest->plusOne ? ucwords($guest->plusOne->name) : '' }}" placeholder="Add A Plus One" style="padding-left:20px;" />
						<label for="Plus One" class="active">Plus One</label>
					</div>
				</div>
				<div class="md-form col-12">
					<div class="input-field col s6">
						<input id="email" class="form-control" type="email" name="email" value="{{ $guest->email }}" placeholder="Add An Email Address" style="padding-left:20px;" />
						<label for="email" class="active">Email Address</label>
					</div>
				</div>
				
				<div class="md-form">
					<button class="btn red accent-2 m-0" type="submit">Save Changes</button>
					
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