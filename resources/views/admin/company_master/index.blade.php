<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Company Master')
@section('css')
    <style>
    .error {
        color: red !important;
        font-size: 12px !important;
        letter-spacing: 0.5px !important;
    }
    </style>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    <div class="section-header mt-3">
        <h1>Company Master</h1>
        <hr>
    </div>
    <div class="section-body">
        @include('layout.errormessage')
        <div class="row-12 mr-4">
            {!! Form::model($company_edit,['route' =>'admin.company_master.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <!-- <div> -->
                        <label>Company Name</label>
                        {!! Form::text('company_name',Input::old('company_name'), ['class' =>
                        'form-control','id'=>"company_name",'name'=>'company_name','placeholder'=>'Enter Company Name']) !!}
                    <!-- </div> -->
                </div>
                <div class="form-group col-md-3">
                    <label>PAN</label>
                    {!! Form::text('pan_number',Input::old('pan_number'), ['class' =>
                    'form-control','id'=>"pan_number",'name'=>'pan_number','placeholder'=>'Enter PAN']) !!}
                </div>
                <div class="form-group col-md-3">
                    <label>Representative Name</label>
                    {!! Form::text('representative_name',Input::old('representative_name'), ['class' =>
                    'form-control','id'=>"representative_name",'name'=>'representative_name','placeholder'=>'Enter Representative Name']) !!}
                </div>
                <div class="form-group col-md-3">
                    <label>Mobile Number</label>
                    {!! Form::text('contact',Input::old('contact'),['onchange'=>'showContact(this.value);','class' =>
                    'form-control','id'=>"contact",'name'=>'contact','placeholder'=>'+00 000 0000 000']) !!}
                </div>
                <div class="form-group col-md-3">
                    <label>Address</label>
                    {!! Form::textarea('address',Input::old('address'), ['class' =>
                    'form-control','id'=>'address','rows'=>2,'placeholder'=>'Enter Address']) !!}
                </div>
                <div class="company-mas-um form-group col-md-1">
                    @if(isset($company_edit->id))
                        <input type="hidden" id="edit_id" name="edit_id" value="{{$company_edit->id}}">
                        <button id="kt_login_signin_submit" class="btn btn-primary ">Update</button>
                    @else
                        <button id="kt_login_signin_submit" class="btn btn-primary">Add</button>
                    @endif
                </div>
                <div class="card-header-action-um form-group col-md-1">
                    <a href="{{ route('admin.company_master.index') }}" class="btn btn-danger btn-action ml-2">Reset</a>
                </div>
            </div>
            {!! Form::close() !!}
            <br>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card view-head">
                   <div class="card-header">
                        <h4></h4>
                        <div class="card-header-form">
                            <br>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                          <p></p>
                            <table class="table table-striped table-bordered table-head-sec" id="kt_table_1">
                                <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th style="font-size: 14px;">Company Name</th>
                                    <th class="align-middle" style="font-size: 14px;">PAN</th>
                                    <th class="align-middle" style="font-size: 14px;">Representative Name</th>
                                    <th class="align-middle" style="font-size: 14px;">Mobile Number</th>
                                    <th class="align-middle" style="font-size: 14px;">Address</th>
                                    <th class="align-middle" style="font-size: 14px;">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Functionality Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete this record ?
                    </div>
                    <input type="hidden" name="id" id="id" value="" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn green" id="delete-record">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{url('admin/assets/datatable/validate.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{url('admin/assets/datatable/dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#createform').validate({
                rules: {
                    company_name: {required: true, maxlength: 50,},
                    pan_number: {required: true, minlength: 10, maxlength: 10},
                    contact: {required: true, minlength: 13, maxlength: 13,},
                    address: {required: true,},
                    representative_name: {required: true,}
                },
                submitHandler: function(form) {
                    if ($("form").validate().checkForm()) {
                        $(".submitbutton").attr("type", "button");
                        $(".submitbutton").addClass("disabled");
                        form.submit();
                    }
                }
            });
            // $('#contact').val($('#contact').val() + '+');
            var initTable1 = function() {
                var table = $('#kt_table_1');

                // begin first table
                table.DataTable({
                    responsive: true,
                    searchDelay: 500,
                    processing: true,
                    serverSide: false,
                    autoWidth:false,
                    "columnDefs": [
                        {"className": "dt-center", "targets": "_all"}
                    ],
                    // order: [],
                    ajax: {
                        url: "{{route('admin.company_master.getcompany')}}",
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        }
                    },

                    columns: [
                        {data: 'company_name', name: 'company_name', "defaultContent": "-"},
                        {data: 'pan_number', name: 'pan_number', "defaultContent": "-"},
                        {data: 'representative_name', name: 'representative_name', "defaultContent": "-"},
                        {data: 'contact', name: 'contact', "defaultContent": "-"},
                        {data: 'address', name: 'address', "defaultContent": "-"},
                        {data: 'action', name: 'action',
                            searchable: false,
                            sortable: false,
                            className : "text-center",
                            responsivePriority: -1
                        },
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        'excel', 'csv', 'pdf', 'copy'
                    ],
                });
            };
            initTable1();
    //  Delete Data Form DataTables
            $("#delete-record").on("click", function () {
                    var id = $("#id").val();
                    $('#exampleModal').modal('hide');

                    $.ajax({
                        url: baseUrl + '/admin/company_master/company_delete_modal/' + id,
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

