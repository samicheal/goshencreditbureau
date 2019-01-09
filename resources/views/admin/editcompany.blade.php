@extends('layouts.master')

@section('title', 'Admin/Edit Company')

@section('section', 'Edit Company')

@section('content')

	<div class="grid-form">
		<div class="grid-form1">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form role="form" class="form-horizontal" method="post" action="{{ route('updatecompany',['id' => $company->id]) }}">

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

						<h3 class="text-center">Update Company</h3>
						<div class="form-group" style="margin-top:25px">
							<label for="company name" class="col-md-2 control-label">Company Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $company->company_name }}" placeholder="Company" id="company name" name="company_name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="property_owner" class="col-md-2 control-label">Name Of Property Owner</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $company->property_owner }}" placeholder="Name Of Property Owner" id="property_owner" name="property_owner">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="judge" class="col-md-2 control-label">Name Of Judge</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $company->judge }}" placeholder="Name Of Judge" id="judge" name="judge">
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
									<input type="text" class="form-control1" value="{{ $company->amount }}" placeholder="Amount" id="amount" name="amount">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="case number" class="col-md-2 control-label">Case Number</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $company->case_no }}" placeholder="Case Number" id="case number" name="case_no">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-md-2 control-label">Address</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" value="{{ $company->address }}" placeholder="Address" id="address" name="address">
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