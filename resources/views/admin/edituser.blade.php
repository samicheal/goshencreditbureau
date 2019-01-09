@extends('layouts.master')

@section('title', 'Admin/Edit Profile')

@section('section', 'Edit Profile')

@section('content')
			
    <div class="grid-form">
		<div class="grid-form1">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form role="form" id="creditor" class="form-horizontal" method="post" action="{{ route('adduser.update',['id' => $user->id]) }}">

					{{ csrf_field() }}

					@if( $errors->any() )
							<div class="alert alert-danger">
								<ul>
									@foreach( $errors->all() as $error )
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
					@endif

						<h3 class="text-center">Edit Profile</h3>
						<div class="form-group" style="margin-top:25px">
							<label for="name" class="col-md-2 control-label">Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $user->name }}" placeholder="Name" id="name" name="name">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-top:25px">
							<label for="email" class="col-md-2 control-label">Email</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="email" class="form-control1" value="{{ $user->email }}" placeholder="Email" id="email" name="email">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="password" class="form-control1" placeholder="Password" id="password" name="password">
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<button type="submit" class="btn-primary btn">Save Changes</button>	
						</div>						
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

@endsection