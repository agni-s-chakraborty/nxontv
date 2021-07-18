<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Languages Master')
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
    <h1>Language Master</h1>
    <hr>
</div>
<div class="section-body">
    @include('layout.errormessage')
    <div class="row">
        {!! Form::model($languages_edit,['route' =>'admin.languages_master.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Language Name</label>
                {!! Form::text('languages_name',Input::old('languages_name'), ['class' =>
                'form-control','id'=>"languages_name",'name'=>'languages_name','placeholder'=>'Enter Language Name']) !!}
            </div>
            <div class="form-group col-md-3">
                <label>Language short name (3 Alphabet)</label>
                {!! Form::text('languages_short_name',Input::old('languages_short_name'), ['class' =>
                'form-control','id'=>"languages_short_name",'name'=>'languages_short_name','placeholder'=>'Enter Language short name']) !!}
            </div>
            <div class="form-group col-md-2">

            </div>
            <div class="company-mas-lge form-group col-md-1">
                @if(isset($languages_edit->id))
                    <input type="hidden" id="edit_id" name="edit_id" value="{{$languages_edit->id}}">
                    <button class="btn btn-primary submitbutton">Update</button>
                @else
                    <button class="btn btn-primary submitbutton">Add</button>
                @endif
            </div>
            <div class="card-header-action-lge form-group col-md-1">
                <a href="{{ route('admin.languages_master.index') }}" class="btn btn-danger btn-action">Reset</a>
            </div>
        </div>
        <div class="form-group col-md-12"></div><br>
        {!! Form::close() !!}
    </div>

    @include('admin.languages_master.listing')
</div>
@section('scripts')

<script type="text/javascript" src="{{url('admin/assets/datatable/validate.js')}}"></script>
<script type="text/javascript" src="{{url('admin/assets/datatable/dataTables.min.js')}}"></script>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

<script type="text/javascript">
$(document).ready(function() {
    $('#createform').validate({
        rules: {
            languages_name: {
                required: true,
                maxlength: 50,
            },
            languages_short_name: {
                required: true,
                minlength: 3,
                maxlength: 3,
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

$(document).ready(function() {

    var initTable1 = function() {
        var table = $('#kt_table_1');

        // begin first table
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: false,
            serverSide: false,
            // order: [],
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
            ],
            ajax: {
                url: "{{route('admin.languages_master.getlanguages')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'languages_name',
                    name: 'languages_name',
                    "defaultContent": "-"
                },
                {
                    data: 'languages_short_name',
                    name: 'languages_short_name',
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
            url: baseUrl + '/admin/languages_master/languages_delete_modal/' + id,
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
</script>
@endsection
@endsection
