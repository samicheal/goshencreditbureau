@extends('layouts.master')

@section('title', 'Manage Company')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assests/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('section', 'Manage Company')

@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-horizontal" class="text-center">Manage Company</h3>
            @if(Auth::user()->admin == 2)
            <table id="managePostTable" class="table">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Posted By</th>
                        <th>Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 @foreach($company as $company)
                <tr id="{{ $company->id }}">                   
                    <td>{{$company->company_name}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->user->name}}</td>
                    <td>{{$company->created_at->toFormattedDateString()}}</td>
                    <td>
                        <!-- drop-down-for-userprofile-->
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Manage
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('editcompany',['id' => $company->id]) }}"><i class="fa fa-edit"></i>edit</a></li>
                                <li><a href="#" class="deleteModal" data-id="{{$company->id}}"><i class="glyphicon glyphicon-trash"></i>delete</a></li>
                            </ul>
                        </div>
					    <!--// drop-down-for-userprofile-->
                    </td>                
                </tr>
                @endforeach
            </table>
            @else
            <table id="managePostTable" class="table">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 @foreach($company->where('user_id',Auth::user()->id) as $company)
                <tr id="{{ $company->id }}">                   
                    <td>{{$company->company_name}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->created_at->toFormattedDateString()}}</td>
                    <td>
                        <!-- drop-down-for-userprofile-->
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Manage
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('editcompany',['id' => $company->id]) }}"><i class="fa fa-edit"></i>edit</a></li>
                                <li><a href="#" class="deleteModal" data-id="{{$company->id}}"><i class="glyphicon glyphicon-trash"></i>delete</a></li>
                            </ul>
                        </div>
					    <!--// drop-down-for-userprofile-->
                    </td>                
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
        <!---delete-post-modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Post</h4>
        </div>
        <div class="modal-body content">
          <h4 class="text-center" id="notificationId"> </h4>  
          <p class="text-center notification">Do you really want to delete <span id="title"> <span></p>
            <form method="post" action="" id="deleteForm">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="1" id="rowId">
                <div class="text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="removePostBtn"> <i class="glyphicon glyphicon-ok-sign delete"></i> delete </button>
                </div> 
            </form>
         </div>
        <div class="modal-footer delteModalFooter">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('assests/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('DataTables/datatables.js') }}"> </script>
<script>
    $(document).ready( function () {

        var notificationId;

        //load data table
        var table = $('#managePostTable').DataTable();

        //generate delete modal
        $(".deleteModal").on('click' , function(e , table){

            //generate message for span content
            let span = $(this).data('name');
            span += " ?";

            //insert title into span section
            $('#title').html(span);

            //generate message for notification segment
            notificationId = "Notification Id : #"; 
            notificationId += $(this).data('id');

            //insert notification id into span 
            $('#notificationId').html(notificationId);

            //append id to form
            $('#rowId').val($(this).data('id'));

            //add red color to notification id
            $('.content').find('h4').css("color" , "red");
           
            //show modal form
            $('#deleteModal').modal('show');

        })

        //delete post from table
        $('#deleteForm').on('submit' , function(e){
            
            e.preventDefault(); //prevent default propagation

            $.ajax({
                 url: "{{ route('deletecompany') }}",
                 type: "POST",
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData:false,
                 beforeSend:function()
                     {
                         $(".delete").removeClass("glyphicon-ok-sign"); 
                         $(".delete").addClass("fa fa-refresh fa-spin");
                     },
         
                 complete:function()
                     {
                         $(".delete").removeClass("fa fa-refresh fa-spin");
                         $(".delete").addClass("glyphicon-ok-sign"); 
                     },
                 success: function(data)
                         {
                             console.log(data);
                             //check for success
                             if(data.success){
                                toastr.info('Company record successfully deleted', 'warning Alert', {timeOut: 7000}); 

                                //remove row and redraw
                                 $('#managePostTable').DataTable().row('#'+data.id).remove().draw(); 

                                //delete modal
                                $('#deleteModal').modal('hide');  
                             }   

                             //check for failure
                             if(data.fail){
                                toastr.info('Could not delete company record', 'warning Alert', {timeOut: 7000}); 
                                $('#deleteModal').modal('hide');  
                             }  
                         }
             });

        });
      

    });
</script>    
@endsection