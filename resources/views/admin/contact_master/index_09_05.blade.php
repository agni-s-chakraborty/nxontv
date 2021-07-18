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
                    <select class="form-control" id="channel_id" name="channel_id[]" id="channel_id0" data-id="0">
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
                    <select class="form-control" id="company_id" name="company_id[]" id="company_id0" data-id="0">
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
                </div>

                @if(isset($contact_edit->id))               
                    <?php $contact_person_data = json_decode($contact_edit->contact_person);?>
                    <?php $contact_data = json_decode($contact_edit->contact) ?>
                    <?php $landline_data = json_decode($contact_edit->landline) ?>
                    <?php $email_data = json_decode($contact_edit->email) ?>

                    <input type="hidden" name="contactdemo" id="contactdemo"  data-id="<?php echo count($contact_person_data);  ?>">
                    @foreach($contact_person_data as $key=>$contact_person_datas)
                        <?php  $index = $key+1; ?>
                        <div class="form-row" id="row<?php echo $index;?>">                        
                            <div class="form-group col-md-2">
                                <label>Contact Person</label>  
                                <input type="text" placeholder="Enter contact person" class="form-control" name="contact_person[]" id="contact_person{{$key}}" value="{{ $contact_person_datas }}" data-id="{{$key}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Email</label>
                                <input type="text" placeholder="Enter email" class="form-control" name="email[]" id="email{{$key}}" value="{{ $email_data[$key] }}" data-id="{{$key}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Mobile Number</label>
                                <input type="text" placeholder="Enter mobile number" class="form-control" name="contact[]" id="contact{{$key}}" value="{{ $contact_data[$key] }}" data-id="{{$key}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Landline</label>
                                <input type="text" placeholder="Enter landline" class="form-control" name="landline[]" id="landline{{$key}}" value="{{ $landline_data[$key] }}" data-id="{{$key}}">
                            </div>
                            @if($key >= 1)
                                <div class="form-group contact-sec col-md-2">
                                    <a id="{{$index}}" class="btn btn-danger btn-action mr-1 btn_remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else 
                    <div class="form-group col-md-3">
                        <label>Contact Person</label>  
                        <input type="text" placeholder="Enter contact person" class="form-control" name="contact_person[]" id="contact_person0" data-id="0">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="text" placeholder="Enter email" class="form-control" name="email[]" id="email0" data-id="0">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Mobile Number</label>
                        <input type="text" placeholder="Enter mobile number" class="form-control" name="contact[]" id="contact0" data-id="0">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Landline</label>
                        <input type="text" placeholder="Enter landline" class="form-control" name="landline[]" id="landline0" data-id="0">
                    </div>
                @endif

                <div class="form-group contact-sec col-md-2">
                    <a class="btn btn-primary btn-action mr-1 addButton" data-toggle="tooltip" title="" data-original-title="Add"><i class="fa fa-plus"></i></a>
                </div>

                <div class="form-group col-md-12"></div>
                <div class="row add_field">
                </div>
                <div class="form-group col-md-12"></div>
                <div class="form-group col-md-12"></div>
                <div class="company-mas-con form-group col-md-1">
                    @if(isset($contact_edit->id))
                        <input type="hidden" id="edit_id" name="edit_id" value="{{$contact_edit->id}}">
                        <button class="btn btn-primary btn-action submitbutton" type="submit"  name="submitbutton" id="submitbutton">Update</button>
                    @else
                        <button class="btn btn-primary btn-action submitbutton" type="submit"  name="submitbutton" id="submitbutton">Add</button>
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
<!-- <script type="text/javascript" src="{{url('admin/assets/datatable/validate.js')}}"></script> -->
<script type="text/javascript" src="{{url('admin/assets/datatable/dataTables.min.js')}}"></script>
<script type="text/javascript">
    var count_editid = $('#contactdemo').attr("data-id");
    if(typeof(count_editid) !== 'undefined'){
        var count = parseInt(count_editid);
    }else{
        var count = 1;
    }

    $('.addButton').click(function(){  
        count++;  
        var html = '';
        html += '<div class="form-row" id="row'+count+'">';
        html += '<div class="form-group col-md-2"><label>Contact Person</label><input type="text" placeholder="Enter contact person" class="form-control" name="contact_person[]" id="contact_person"' + count + '" data-id="' + count + '"></div>';
        html += '<div class="form-group col-md-2"><label>Email</label><input type="text" placeholder="Enter email" class="form-control" name="email[]" id="email"' + count + '" data-id="' + count + '"></div>';
        html += '<div class="form-group col-md-2"><label>Mobile Number</label><input type="text" placeholder="Enter mobile number" class="form-control" name="contact[]" id="contact"' + count + '" data-id="' + count + '"></div>';
        html += '<div class="form-group col-md-2"><label>Landline</label><input type="text" placeholder="Enter landline" class="form-control" name="landline[]" id="landline"' + count + '" data-id="' + count + '"></div>';
        html += '<div class="form-group contact-sec col-md-2"><a id="'+count+'" class="btn btn-danger btn-action mr-1 btn_remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-minus"></i></a></div>';
        html += '</div>';

        $('.add_field').append(html);
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
            // searchDelay: 500,
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
                    //
                } else {                        
                    //
                    $('#kt_table_1').DataTable().clear().destroy();
                    initTable1();
                }
            },
            error: function (data) {         
                //
            }
        });
    });
</script>
@endsection
@endsection