<?php use Request as Input; ?>
@extends('admin.admindashboard')
@section('title','Channel Guide')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css">
@endsection
@section('content')

<section class="section">

    <div class="section-header">
      <h1>Channel Guide</h1>
      <hr>
    </div>

    <div class="section-body">
        <div class="row">
            {!! Form::model($edit_data,['route' =>'admin.channel_guide.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label> Select Operator</label>
                        <select class="form-control" name="operator_name" id="operator_name">
                            @foreach($select_operator as $key=>$select_operator)
                                <?php
                                    $selected = '';
                                    if(isset($edit_data->operator_name) && $key == $edit_data->operator_name)
                                        $selected = 'selected';
                                ?>
                                <option value="{{$select_operator}}" {!! $selected !!}>{{$select_operator}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="chennal_file">Choose File.</label>
                        <input type="file" class="form-control" name="chennal_file" id="chennal_file">
                    </div>
                    <div class="form-group col-md-6 importclass">
                        <button class="btn btn-primary">Import</button>
                        {{-- <a href="#" class="btn btn-danger btn-action">Export</a> --}}
                    </div>
                    <div class="form-group col-md-3">
                        <label for="chennal_name">Channel Name</label>
                        {!! Form::text('chennal_name',Input::old('chennal_name'), ['class' => 'form-control','id'=>"chennal_name",'name'=>'chennal_name','placeholder'=>'Enter Channel Name']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        <label for="hd_sd">HD/SD</label>
                        <select class="form-control" name="hd_sd" id="hd_sd">
                            <option value="HD">HD</option>
                            <option value="SD">SD</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lcn">LCN</label>
                        {!! Form::text('lcn',Input::old('lcn'), ['class' => 'form-control','id'=>"lcn",'name'=>'lcn','placeholder'=>'Enter LCN']) !!}
                    </div>
                    <div class="company-mas form-group col-md-1">
                        @if(isset($edit_data->id))
                            <input type="hidden" id="edit_id" name="edit_id" value="{{$edit_data->id}}">
                            <button class="btn btn-primary submitbutton">Update</button>
                        @else
                            <button class="btn btn-primary">Add</button>
                        @endif
                    </div>
                    <div class="card-header-action form-group col-md-1">
                        <a href="{{ route('admin.channel_guide.index') }}" class="btn btn-danger btn-action">Reset</a>
                    </div>
                </div>
                <div class="form-group col-md-12"></div>
                <br>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card view-head">
                <div class="card-header">
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-head-sec" id="kt_table_1">
                            <thead>
                            <tr>
                                <th class="align-middle">Channel Name</th>
                                <th class="align-middle">HD/SD</th>
                                <th class="align-middle">LCN</th>
                                <th class="align-middle">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Functionality Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
                <input type="hidden" name="id" id="id" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="delete-record">Yes</button>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
<script type="text/javascript" src="{{url('admin/assets/datatable/validate.js')}}"></script>
<script type="text/javascript" src="{{url('admin/assets/datatable/dataTables.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#createform').validate({
            rules: {
                operator_name: {
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

    });

    $(document).ready(function() {
        var initTable1 = function() {
            var table = $('#kt_table_1');
            // begin first table
            table.DataTable({
                responsive: true,
                searchDelay: 500,
                "columnDefs": [
                    {"className": "dt-center", "targets": "_all"}
                ],
                ajax: {
                    url: "{{route('admin.channel_guide.getpostchannelguide')}}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [
                    {name: 'chennal_name', "defaultContent": "-"},
                    {data: 'hd_sd', name: 'hd_sd', "defaultContent": "-"},
                    {data: 'lcn', name: 'lcn', "defaultContent": "-"},
                    {data: 'action', name: 'action', searchable: false, sortable: false, responsivePriority: -1},
                ],
            });
        };
        initTable1();

        $("#delete-record").on("click", function () {
                var id = $("#id").val();
                $('#exampleModal').modal('hide');

                $.ajax({
                    url: baseUrl + '/admin/channel_guide/channel_guide_delete_modal/' + id,
                    type: "DELETE",
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data == 'Error') {
                        } else {
                            $('#kt_table_1').DataTable().clear().destroy();
                            initTable1();
                        }
                    },
                    error: function (data) {
                    }
                });
        });
    });
    </script>
@endsection
@endsection
