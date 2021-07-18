<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Users Master')
@section('css')
<style>
.error {
    color: red !important;
    font-size: 12px !important;
    letter-spacing: 0.5px !important;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">  -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css"></link>
@endsection
@section('content')

<div class="section-header">
    <h1>User Master</h1>
    <hr>
</div>
<div class="section-body">
    @include('layout.errormessage')
    <div class="row">
        {!! Form::model($users_edit,['route' =>
        'admin.user_master.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data'])
        !!}
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Username</label>
                {!! Form::text('name',Input::old('name'), ['class' => 'form-control','id'=>"name",'name'=>'name','placeholder'=>'Enter Name']) !!}
            </div>
            <div class="form-group col-md-3">
                <label>Email Address</label>
                {!! Form::text('email',Input::old('email'), ['class' => 'form-control','id'=>"email",'name'=>'email','placeholder'=>'Enter Email']) !!}
            </div>
            <div class="form-group col-md-3">
                <label>Password</label>
                {!! Form::password('password',['class' => 'form-control','id'=>"password",'placeholder'=>'Enter Password']) !!}
            </div>
            <div class="form-group col-md-3">
                <label>Confirm Password</label>
                {!! Form::password('password_confirmation',['class' => 'form-control','id'=>"password_confirmation",'placeholder'=>'Enter Confirm Password']) !!}
            </div>
            <div class="form-group col-md-3">
                <label>Select Role</label>
                <select class="form-control" id="role_id" name="role_id">
                    @foreach($user_role as $key=>$roles)
                        <?php
                            $selected = '';
                            if(isset($users_edit->role_id) && $key == $users_edit->role_id)
                                $selected = 'selected';
                        ?>
                        <option value="{{$key}}" {!! $selected !!}>{{$roles}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Profile Picture</label>
                <div>
                    <input type="file" class="form-control" id="profile_image" name="profile_image"
                        accept="image/jpeg,image/jpg,image/png">
                    <!-- <label class="custom-file-label" for="profile_image">Choose file</label> -->
                </div>
            </div>
            <div class="company-mas-um form-group col-md-1">

            @if(isset($users_edit->id))
                <input type="hidden" id="edit_id" name="edit_id" value="{{$users_edit->id}}">
                <button id="kt_login_signin_submit" class="btn btn-primary">Update</button>
            @else
                <button id="kt_login_signin_submit" class="btn btn-primary">Add</button>
            @endif
            </div>
            <div class="card-header-action-um form-group col-md-1">
                <a href="{{ route('admin.user_master.index') }}" class="btn btn-danger btn-action">Reset</a>
            </div>
        </div>
        {!! Form::close() !!}
        <br>
    </div>

    @include('admin.user_master.listing')

</div>

@section('scripts')
<script type="text/javascript" src="{{url('admin/assets/datatable/validate.js')}}"></script>
<script type="text/javascript" src="{{url('admin/assets/datatable/dataTables.min.js')}}"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<script type="text/javascript">
$(document).ready(function() {
    $('#createform').validate({
        rules: {
            name: {
                required: true,
                maxlength: 15,
            },
            email: {
                required: true,
                maxlength: 50,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 20,
            },
            password_confirmation: {
                required: true,
                minlength: 5,
                maxlength: 20,
                equalTo: "#password"
            },
            profile_image: {
                required: true,
                extension: "png|jpeg|jpg"
            }
        },
        submitHandler: function(form) {
            if ($("form").validate().checkForm()) {
                $(".submitbutton").attr("type", "button");
                $(".submitbutton").addClass("disabled");
                form.submit();
            }
        }
    });

});

function changeUserStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "{{route('admin.user_master.changeStatus')}}",
        type: 'post',
        data: {
            _token: _token,
            id: id,
            status: status
        },
        success: function(result) {}
    });
}

$(document).ready(function() {
    var initTable1 = function() {
        var table = $('#kt_table_1');

        // begin first table
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            // processing: true,
            // serverSide: true,
            // order: [],
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
            ],
            ajax: {
                url: "{{route('admin.user_master.getusers')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [{
                    data: 'name',
                    name: 'name',
                    "defaultContent": "-"
                },
                {
                    data: 'role_name',
                    name: 'role_name',
                    "defaultContent": "-"
                },
                {
                    data: 'email',
                    name: 'email',
                    "defaultContent": "-"
                },
                {
                    data: 'profile_image',
                    render: function (data, type, full, meta) {
                        return "<img src=\"" + data + "\" data-src=\"" + data + "\" width=\"35\" height=\"35\" class=\"rounded-circle mr-1 image_genrel\"  id=\"image_genrel\"  data-toggle=\"modal\" data-target=\"#exampleModalgenre\" />"
                    }, searchable: false, sortable: false
                },
                {
                    data: 'last_logintime_at',
                    name: 'last_logouttime_at',
                    "defaultContent": "-"
                },
                {
                    data: 'last_logouttime_at',
                    name: 'last_logouttime_at',
                    "defaultContent": "-"
                },
                {
                    data: 'status',
                    name: 'users.status',
                    "defaultContent": "-"
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    sortable: false,
                    responsivePriority: -1
                },
            ],
        });
    };
    initTable1();

    $("#delete-record").on("click", function () {
            var id = $("#id").val();
            $('#exampleModal').modal('hide');

            $.ajax({
                url: baseUrl + '/admin/user_master/user_delete_modal/' + id,
                type: "DELETE",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    if (data == 'Error') {
                        // console.log("@lang('messages.somethingWrong')");
                        // error("@lang('messages.somethingWrong')");
                    } else {
                        // console.log("@lang('messages.recordDelete')");
                        // success("@lang('messages.recordDelete')");
                        $('#kt_table_1').DataTable().clear().destroy();
                        initTable1();
                    }
                },
                error: function (data) {
                    // console.log("@lang('messages.oopserror')");
                    // error("@lang('messages.oopserror')", "@lang('messages.error')");
                }
            });
    });

});

// $(document).on('click', '.deleteUser', function() {
//     var userID = $(this).attr('data-userid');
//     $('#app_id').val(userID);
//     $('#applicantDeleteModal').modal('show');
// });
</script>
<script>
    $(document).ready(function(){
        $(document).on("click",".image_genrel",function(){
            var src= $(this).data('src');
            $(".dynamic-modal-content").attr('src',src);
        });
    });
</script>

@endsection
@endsection
