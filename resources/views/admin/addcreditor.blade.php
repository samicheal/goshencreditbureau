@extends('layouts.master')

@section('title', 'Admin/add Creaditor')

@section('section', 'Add Creaditor')

@section('content')
			
    <div class="grid-form">
		<div class="grid-form1">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form role="form" id="creditor" class="form-horizontal" method="post">

					{{ csrf_field() }}

						<h3 class="text-center">Add Creaditor</h3>
						<div class="form-group" style="margin-top:25px">
							<label for="firstname" class="col-md-2 control-label">First Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="First Name" id="firstname" name="firstname">
								</div>
							</div>
						</div>
						<div class="form-group" style="margin-top:25px">
							<label for="middlename" class="col-md-2 control-label">Middle Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="Middle Name" id="middlename" name="middlename">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-md-2 control-label">Last Name</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="Last Name" id="lastname" name="lastname">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="property_owner" class="col-md-2 control-label">Name Of Property Owner</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="Name Of Property Owner" id="property_owner" name="property_owner">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="judge" class="col-md-2 control-label">Name Of Judge</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="Name Of Judge" id="judge" name="judge">
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
									<input type="text" class="form-control1" placeholder="Amount" id="amount" name="amount">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="case number" class="col-md-2 control-label">Case Number</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="Case Number" id="case number" name="case_no">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-md-2 control-label">Address</label>
							<div class="col-md-8">
								<div class="input-group">							
									<input type="text" class="form-control1" placeholder="Address" id="address" name="address">
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<button type="submit" class="btn-primary btn"><span class="glyphicon glyphicon-plus create"></span> &nbsp Submit</button>	
						</div>						
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

@endsection
@section('scripts')   
<script>  
    $(document).ready(function() {

         $("#creditor").on('submit' , function(e){
 
             e.preventDefault(); //prevent default propagation
 
             $.ajax({
                 url: "{{ route('addcreditor.save') }}",
                 type: "POST",
                 data:  new FormData(this),
                 contentType: false,
                 cache: false,
                 processData:false,
                 beforeSend:function()
                     {
                         $(".create").removeClass("glyphicon glyphicon-plus"); 
                         $(".create").addClass("fa fa-refresh fa-spin");
                     },
         
                 complete:function()
                     {
                         $(".create").removeClass("fa fa-refresh fa-spin");
                         $(".create").addClass("glyphicon glyphicon-plus"); 
                     },
                 success: function(data)
                         {
                            console.log(data);
                             //check if validation errors exist 
                             if ((data.errors)) {
                              console.log(data.errors);
                             //display error
                             if (data.errors.firstname) 
                                 toastr.error(data.errors.title, 'address field is required', {timeOut: 7000});
                             
                             if (data.errors.lastname) 
                                 toastr.error(data.errors.featured, 'case_no field is required', {timeOut: 7000});
 
                             if (data.errors.middlename) 
                                 toastr.error(data.errors.content, 'amount field is required', {timeOut: 7000});

							 if (data.errors.property_owner) 
                                 toastr.error(data.errors.title, 'judge field is required', {timeOut: 7000});
                             
                             if (data.errors.judge) 
                                 toastr.error(data.errors.featured, 'property_owner field is required', {timeOut: 7000});
 
                             if (data.errors.amount) 
                                 toastr.error(data.errors.content, 'middlename field is required', {timeOut: 7000});

							 if (data.errors.case_no) 
                                 toastr.error(data.errors.featured, 'lastname field is required', {timeOut: 7000});
 
                             if (data.errors.address) 
                                 toastr.error(data.errors.content, 'firstname field is required', {timeOut: 7000});     
                             
                             } //end of if 
 
                             //check for duplicates
                             if(data.alert)
                                 toastr.info(data.alert, 'warning Alert', {timeOut: 7000});
 
                             //check for success
                             if(data.success){
                                 toastr.info(data.success, 'warning Alert', {timeOut: 7000}); 
                                 //form reset
                                 $("#creditor")[0].reset();
                             }    
                         }
             });
             
         })
 
     });     
 </script>
@endsection