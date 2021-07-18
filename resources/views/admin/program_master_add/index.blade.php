<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Program Master')
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
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="section-header">
    <h1>Program Master</h1>
    <hr>
</div>
<div class="section-body">
    @include('layout.errormessage')
    <div class="row">
        {!! Form::model($edit_data,['route' => 'admin.program_master_add.store','class'=>'needs-validation','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <div class="input-group prgm-sec">
                        <select class="form-control" id="search_chennal_name" name="search_chennal_name" onchange="searchChennalName()">
                            <option selected="true" disabled="disabled">Search All Chanel</option>
                            @foreach ($select_chennalName as $search_all_chennal )
                                <option value="{{$search_all_chennal}}">{{$search_all_chennal}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label>Select Module</label>
                    <select class="form-control" id="upload_module" name="upload_module">
                        <option selected="true" disabled="disabled">Choose Module</option>
                        <option value="News Module">News Module</option>
                        <option value="Entertainment Module">Entertainment Module</option>
                        <option value="Sports Module">Sports Module</option>
                        <option value="Movie Module">Movie Module</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <div class="input-group prgm-sec">
                        <input type="text" name="program_name" id="program_name" class="form-control" placeholder="Enter Program Name" required>
                    </div>
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="company-mas-ch form-group col-md-1">
                    @if(isset($edit_data->id))
                        <input type="hidden" id="edit_id" name="edit_id" value="{{$edit_data->id}}">
                        <button class="btn btn-primary submitbutton">Update</button>
                    @else
                        <button class="btn btn-primary submitbutton">Add</button>
                    @endif
                </div>
                <div class="card-header-action-ch form-group col-md-1">
                    <a href="{{ route('admin.program_master_add.index') }}" class="btn btn-danger btn-action">Reset</a>
                </div>

            </div>
            <div class="form-group col-md-12"></div><br>
        {!! Form::close() !!}
    </div>

    @include('admin.program_master_add.listing')
</div>


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('.addbuttonk').click(function(){
            alert('add successfully');
        });
        $('.updatebuttonk').click(function(){
            alert('update successfully');
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        // Initialize select2
        $("#search_chennal_name").select2();
    });

    function searchChennalName() {
        var x = document.getElementById("search_chennal_name").value;
        $('#search_name').val(x);
    }
</script>
<script type="text/javascript">
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
                    url: "{{route('admin.program_master_add.getpostprogram')}}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'program_name',
                        name: 'program_name',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'search_chennal_name',
                        name: 'search_chennal_name',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'upload_module',
                        name: 'upload_module',
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
                url: baseUrl + '/admin/program_master_add/program_add_delete_modal/' + id,
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
