@extends('layouts.master')

@section('title', 'Manage User')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assests/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('section', 'Manage Users')

@section('content')
    <div class="grid-form">
        <div class="grid-form1">
            <h3 id="forms-horizontal" class="text-center">Manage User</h3>
            <table id="managePostTable" class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Added</th>
                        <th>illegal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                {{! $sn = 1 }}
                 @foreach($user as $user)
                <tr>                   
                    <td>{{$sn++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                    <td>
                        @if($user->admin == 0)
                            <b style="color:red;font-size:180%">*</b>
                        @endif
                    </td>
                    <td>
                        @if($user->id !== Auth::user()->id)   
                            <a href="#" class="deleteModal btn btn-danger" data-id="{{$user->name}}"><i class="glyphicon glyphicon-trash" style="color:white"></i>delete</a>
                        @endif      
                    </td>                
                </tr>
                @endforeach
            </table>
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

      

    });
</script>    
@endsection