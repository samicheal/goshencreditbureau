@extends('layouts.master')

@section('title', 'Admin/edit Creaditor')

@section('section', 'Admin/update Creaditor')

@section('content')

	<div class="grid-form">
		<div class="grid-form1">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form role="form" class="form-horizontal" method="post" action="{{ route('update',['id' => $creditor->id]) }}">
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
						<h3 class="text-center">Update Creaditor</h3>
						<div class="form-group" style="margin-top:25px">
							<label for="firstname" class="col-md-2 control-label">First Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->firstname }}" placeholder="First Name" id="firstname" name="firstname">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-top:25px">
							<label for="middlename" class="col-md-2 control-label">Middle Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->middlename }}" placeholder="Middle Name" id="middlename" name="middlename">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-md-2 control-label">Last Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->lastname }}" placeholder="Last Name" id="lastname" name="lastname">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="property_owner" class="col-md-2 control-label">Name Of Property Owner</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->property_owner }}" placeholder="Name Of Property Owner" id="property_owner" name="property_owner">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="judge" class="col-md-2 control-label">Name Of Judge</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->judge }}" placeholder="Name Of Judge" id="judge" name="judge">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="amount" class="col-md-2 control-label">Amount</label>
							<div class="col-md-8">
								<div class="input-group">							 
									<span class="input-group-addon">
										<i class="fa fa-dollar"></i>
									</span>
									<input type="text" class="form-control1" value="{{ $creditor->amount }}" placeholder="Amount" id="amount" name="amount">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="case number" class="col-md-2 control-label">Case Number</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->case_no }}" placeholder="Case Number" id="case number" name="case_no">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-md-2 control-label">Address</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $creditor->address }}" placeholder="Address" id="address" name="address">
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<button class="btn-primary btn">Submit</button>	
						</div>						
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

@endsection