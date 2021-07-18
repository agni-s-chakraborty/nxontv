<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Contact Master')
@section('css')
<style>
.error {
    color: red !important;
    font-size: 12px !important;
    letter-spacing: 0.5px !important;
}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css"> -->
@endsection
@section('content')
<div class="section-header">
    <h1>Contact Master</h1>
    <hr>
</div>
<div class="section-body">
    @include('layout.errormessage')
    <div class="row">        
        {!! Form::model($contact_edit,['route' =>'admin.contact_master.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}

            <div class="form-row" id="dynamic_field">
                <div class="form-group col-md-3">
                    <label>Select Channel Name</label>
                    <select class="form-control" id="channel_id" name="addmore[0][channel_id]">
                    <!-- <select class="form-control" id="company_id" name="addmore[0][company_id]"> -->
                        <option selected="true" disabled="disabled">Choose Channel Name</option>
                        @foreach($select_channel_name as $key_c=>$channel_names)
                            <?php 
                                $selected = '';
                                if(isset($contact_edit->channel_id) && $key_c == $contact_edit->channel_id)
                                    $selected = 'selected';
                            ?> 
                            <option value="{{$key_c}}" {!! $selected !!}>{{$channel_names}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Select Company Name</label>
                    <select class="form-control" id="company_id" name="addmore[0][company_id]">
                    <!-- <select class="form-control" id="channel_id" name="addmore[0][channel_id]"> -->
                        <option selected="true" disabled="disabled">Choose Company Name</option>
                        @foreach($select_compny_name as $key=>$compny_names)
                            <?php 
                                $selected = '';
                                if(isset($contact_edit->company_id) && $key == $contact_edit->company_id)
                                    $selected = 'selected';
                            ?> 
                            <option value="{{$key}}" {!! $selected !!}>{{$compny_names}}</option>
                        @endforeach
                    </select>

                    <!-- <select class="form-control" id="channel_id" name="addmore[0][channel_id]">
                        <option selected="true" disabled="disabled">Choose Company Name</option>
                        @foreach($select_compny_name as $key=>$compny_names)
                            <option value="{{$key}}">{{$compny_names}}</option>
                        @endforeach
                    </select> -->
                </div>

                <div class="form-group col-md-3">
                    <label>Contact Person</label>
                    {!! Form::text('contact_person',Input::old('contact_person'), ['class' => 'form-control','id'=>"contact_person",'name'=>'addmore[0][contact_person]','placeholder'=>'Enter Contact Person']) !!}
                    <!-- <input type="text" class="form-control" id="contact_person" name="addmore[0][contact_person]" placeholder="Enter Contact Person"> -->
                </div>
                <div class="form-group col-md-3">
                    <label>Email</label>
                    {!! Form::text('email',Input::old('email'), ['class' => 'form-control','id'=>"email",'name'=>'addmore[0][email]','placeholder'=>'Enter email']) !!}
                    <!-- <input type="email" class="form-control" id="email" name="addmore[0][email]" placeholder="Enter Email"> -->
                </div>
                <div class="form-group col-md-3">
                    <label>Contact</label>
                    {!! Form::text('contact',Input::old('contact'), ['class' => 'form-control','id'=>"contact",'name'=>'addmore[0][contact]','placeholder'=>'Enter Contact']) !!}
                    <!-- <input type="text" class="form-control" id="contact" name="addmore[0][contact]" placeholder="Enter Contact"> -->
                </div>
                <div class="form-group col-md-3">
                    <label>Landline</label>
                    {!! Form::text('landline',Input::old('landline'), ['class' => 'form-control','id'=>"landline",'name'=>'addmore[0][landline]','placeholder'=>'Enter Landline']) !!}
                    <!-- <input type="text" class="form-control" id="landline" name="addmore[0][landline]" placeholder="Enter landline"> -->
                </div>

                <div class="form-group contact-sec col-md-2">
                    <a class="btn btn-primary btn-action mr-1 addButton" data-toggle="tooltip" title="" data-original-title="Add"><i class="fas fa-plus"></i></a>
                </div>
                <div class="form-group col-md-12"></div>
                <div class="form-group col-md-12"></div>
                <div class="form-group col-md-12"></div>
                <div class="company-mas-con form-group col-md-1">
                @if(isset($contact_edit->id))
                    <input type="hidden" id="edit_id" name="edit_id" value="{{$contact_edit->id}}">
                    <button class="btn btn-primary submitbutton" type="submit"  name="submitbutton" id="submitbutton">Update</button>
                @else
                    <button class="btn btn-primary submitbutton" type="submit"  name="submitbutton" id="submitbutton">Add</button>
                @endif
            
                </div>
                <div class="card-header-action-con form-group col-md-1">
                    <a href="{{route('admin.contact_master.index')}}" class="btn btn-danger btn-action">Reset</a>
                </div><br>
            </div>
        {!! Form::close() !!}
    </div><br>
</div>
@include('admin.contact_master.listing')

@section('scripts')
<script type="text/javascript" src="{{url('admin/assets/datatable/validate.js')}}"></script>
<script type="text/javascript" src="{{url('admin/assets/datatable/dataTables.min.js')}}"></script>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#createform').validate({
            rules: {
                company_id: {
                    required: true,
                },
                channel_id: {
                    required: true,
                },
                contact_person: {
                    required: true,
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true
                },
                contact: {
                    required: true,
                },
                landline: {
                    required: true,
                    maxlength: 50,
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
</script> -->
<script type="text/javascript">
    var i = 0;
    $('.addButton').click(function(){  
        i++;  
        $('#dynamic_field').append(
            '<div id="row'+i+'" class="form-row"><div class="form-group col-md-2"><label>Contact Person</label><input type="text" class="form-control" id="contact_person" name="addmore['+i+'][contact_person]" placeholder="Enter Contact Person"></div><div class="form-group col-md-2"><label>Email</label><input type="email" class="form-control" id="email" name="addmore['+i+'][email]" placeholder="Enter Email"></div><div class="form-group col-md-2"><label>Contact</label><input type="text" class="form-control" id="contact" name="addmore['+i+'][contact]" placeholder="Enter Contact"></div><div class="form-group col-md-2"><label>Landline</label><input type="text" class="form-control" id="landline" name="addmore['+i+'][landline]" placeholder="Enter landline"></div><div class="form-group contact-sec col-md-2"><a id="'+i+'" class="btn btn-danger btn-action mr-1 btn_remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-minus"></i></a></div></div>'
        );  
    });

    $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
    });

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
                url: "{{route('admin.contact_master.getpostcontact')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [{
                    data: 'channel.channel_name',
                    name: 'channel_name',
                    "defaultContent": "-"
                },
                {
                    data: 'company.company_name',
                    name: 'company_name',
                    "defaultContent": "-"
                },
                {
                    data: 'contact_person',
                    name: 'contact_person',
                    "defaultContent": "-"
                }, 
                {
                    data: 'email',
                    name: 'email',
                    "defaultContent": "-"
                },
                {
                    data: 'contact',
                    name: 'contact',
                    "defaultContent": "-"
                },
                {
                    data: 'landline',
                    name: 'landline',
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
            url: baseUrl + '/admin/contact_master/contact_delete_modal/' + id,
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
</script>
@endsection
@endsection