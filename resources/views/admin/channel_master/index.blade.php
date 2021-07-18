<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Channel Master')
@section('css')
<style>
.error {
    color: red !important;
    font-size: 12px !important;
    letter-spacing: 0.5px !important;
}
</style>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"/> -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="section-header">
    <h1>Channel Master</h1>
    <hr>
</div>
<div class="section-body">
    @include('layout.errormessage')
    <div class="row">
        {!! Form::model($chennel,['route' => 'admin.channel_master.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
            <div class="form-row">
                <input type="hidden" id="channel_logo_1" value="{{$getChannelLogoone}}">
                <input type="hidden" id="channel_logo_2" value="{{$getChannelLogotwo}}">
                <input type="hidden" id="channel_logo_3" value="{{$getChannelLogothree}}">

                <div class="form-group col-md-3">
                    <label>Select Company Name</label>
                    <select class="form-control" id="company_id" name="company_id">
                        <option selected="true" disabled="disabled">Choose Company Name</option>
                        @foreach($select_compny_name as $key=>$compny_names)
                            <?php
                                $selected = '';
                                if(isset($chennel->company_id) && $key == $chennel->company_id)
                                    $selected = 'selected';
                            ?>
                            <option value="{{$key}}" {!! $selected !!}>{{$compny_names}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Channel Name</label>
                    {!! Form::text('channel_name',Input::old('channel_name'), ['class' => 'form-control','id'=>"channel_name",'name'=>'channel_name','placeholder'=>'Enter Channel Name']) !!}
                </div>
                <div class="form-group col-md-3">
                    <label>Select Channel Genre</label>
                    <select class="form-control" id="channel_genre_id" name="channel_genre_id">
                        <option selected="true" disabled="disabled">Choose Channel Genre</option>
                        @foreach($select_genre_name as $key=>$genre_names)

                            <?php
                                $selected = '';
                                if(isset($chennel->channel_genre_id) && $key == $chennel->channel_genre_id)
                                    $selected = 'selected';
                            ?>

                            <option value="{{$key}}" {!! $selected !!}>{{$genre_names}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Select Channel Language</label>
                    <select class="form-control" id="languages_id" name="languages_id">
                        <option selected="true" disabled="disabled">Choose Channel Language</option>
                        @foreach($select_languages_name as $key=>$languages_names)
                            <?php
                                $selected = '';
                                if(isset($chennel->languages_id) && $key == $chennel->languages_id)
                                    $selected = 'selected';
                            ?>
                            <option value="{{$key}}" {!! $selected !!}>{{$languages_names}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Channel Description</label>
                    {!! Form::textarea('channel_description',Input::old('channel_description'), ['class' =>'form-control','id'=>'channel_description','name'=>'channel_description','rows'=>1,'placeholder'=>'Enter Channel Description']) !!}
                </div>
                <div class="form-group col-md-3">
                    <label>Region</label>
                    {!! Form::text('region',Input::old('region'), ['class' => 'form-control','id'=>"region",'name'=>'region','placeholder'=>'Enter Region']) !!}
                </div>
                <div class="form-group col-md-3">
                    <label>Channel Catchup</label>
                    <select class="form-control" id="channel_catchup" name="channel_catchup">
                        <!-- <option selected="true" disabled="disabled">Choose Channel Catchup</option> -->
                        @foreach($select_channel_catchup as $key=>$channel_catchup)
                            <?php
                                $selected = '';
                                if(isset($chennel->channel_catchup) && $key == $chennel->channel_catchup)
                                    $selected = 'selected';
                            ?>
                            <option value="{{$key}}" {!! $selected !!}>{{$channel_catchup}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Channel TRP</label>
                    {!! Form::number('channel_trp',Input::old(empty('channel_trp') ? !empty('channel_trp'): 1) , ['step' => '1', 'min' => '1', 'max' => '100','class' => 'form-control','id'=>"channel_trp",'name'=>'channel_trp','placeholder'=>'1']) !!}
                </div>

                <div class="form-group col-md-3">
                    <label>Status</label>
                    <select class="form-control" id="status" name="status">
                        @foreach($select_status as $key=>$status)

                            <?php
                                $selected = '';
                                if(isset($chennel->status) && $key == $chennel->status)
                                    $selected = 'selected';
                            ?>
                            <option value="{{$key}}" {!! $selected !!}>{{$status}}</option>

                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Channel Logo1 (720 x 540)</label>
                    <div>
                        <input type="file" class="form-control" id="channel_logo_1" name="channel_logo_1" accept="image/jpeg,image/jpg,image/png">
                        <!-- <label for="channel_logo_1">Choose file</label> -->
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Channel Logo2 (720 x 720)</label>
                    <div>
                        <input type="file" class="form-control" id="channel_logo_2" name="channel_logo_2" accept="image/jpeg,image/jpg,image/png">
                        <!-- <label for="channel_logo_2">Choose file</label> -->
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Channel Logo3 (151 x 85)</label>
                    <div>
                        <input type="file" class="form-control" id="channel_logo_3" name="channel_logo_3" accept="image/jpeg,image/jpg,image/png">
                        <!-- <label for="channel_logo_3">Choose file</label> -->
                    </div>
                </div>
                <div class="company-mas-ch form-group col-md-1">
                    @if(isset($chennel->id))
                    <input type="hidden" id="edit_chennal_id" name="edit_chennal_id" value="{{$chennel->id}}">
                        <button class="btn btn-primary submitbutton">Update</button>
                    @else
                        <button class="btn btn-primary submitbutton">Add</button>
                    @endif
                </div>
                <div class="card-header-action-ch form-group col-md-1">
                    <a href="{{ route('admin.channel_master.index') }}" class="btn btn-danger btn-action">Reset</a>
                </div>

            </div>
            <div class="form-group col-md-12"></div><br>
        {!! Form::close() !!}
    </div>

    @include('admin.channel_master.listing')
    @include('admin.channel_master.show')
</div>


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#createform').validate({
        rules: {
            company_id: {
                required: true,
            },
            channel_genre_id: {
                required: true,
            },
            languages_id: {
                required: true,
            },
            channel_name: {
                required: true,
                maxlength: 50,
            },
            channel_description: {
                required: true,
            },
            region: {
                required: true,
                maxlength: 50,
            },
            channel_catchup: {
                required: true,
            },
            channel_trp: {
                required: true,
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


    var initTable1 = function() {
        var table = $('#kt_table_1');

        // begin first table
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            // processing: true,
            serverSide: false,
            // order: [],
            columnDefs: [
                {"className": "dt-center", "targets": "_all"}
            ],
            ajax: {
                url: "{{route('admin.channel_master.getpostchannel')}}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [{
                    data: 'company.company_name',
                    name: 'company_name',
                    "defaultContent": "-"
                },
                {
                    data: 'channel_name',
                    name: 'channel_name',
                    "defaultContent": "-"
                },
                {
                    data: 'chanelgenre.genre_name',
                    name: 'genre_name',
                    "defaultContent": "-"
                },
                {
                    data: 'languages.languages_name',
                    name: 'languages_name',
                    "defaultContent": "-"
                },
                {
                    data: 'channel_trp',
                    name: 'channel_trp',
                    "defaultContent": "-"
                },
                {
                    data: 'status',
                    name: 'status',
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
            url: baseUrl + '/admin/channel_master/channel_delete_modal/' + id,
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
