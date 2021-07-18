<?php use Request as Input; ?>
@extends('admin.admindashboard')
@section('title','Upload')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1>Upload</h1>
      <hr>
   </div>
   <div class="section-body">
    @include('layout.errormessage')
        <div class="row">
            <div class="col-12">
                <div class="card view-head">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="container">
                                <h4>Sample Format of Excel Upload</h4>
                                <img src="{{ asset('admin/assets/img/upload_image_news_banner.png')}}" alt="upload image banner" style="width: inherit;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- <br> --}}
        <div class="row">
            {!! Form::open(['route' => 'admin.upload_menu.store','id'=>'createform','name'=>'createform','enctype'=>'multipart/form-data']) !!}
                <div class="form-row">
                    {{-- <div class="form-group col-md-3">
                        <label>Select Module</label>
                        <select class="form-control" id="upload_module" name="upload_module">
                            <option selected="true" disabled="disabled">Choose Module</option>
                            <option value="news_module">News Module</option>
                            <option value="entertainment_module">Entertainment Module</option>
                            <option value="sports_module">Sports Module</option>
                            <option value="movie_module">Movie Module</option>
                        </select>
                    </div> --}}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <div class="input-group prgm-sec">
                                <select class="form-control" id="search_chennal_name" name="search_chennal_name" onchange="searchChennalName()">
                                    <option selected="true" disabled="disabled">Search All Chanel</option>
                                    @foreach ($select_chennalName as $search_all_chennal )
                                        <option value="{{$search_all_chennal}}">{{$search_all_chennal}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="search_name" id="search_name" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                        </div>
                        <div class="form-group col-md-3">
                            <label> Select File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload_file" name="upload_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                <label class="custom-file-label" for="upload_file">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="company-mas-up form-group col-md-2">
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </div>
                <div class="form-group" style="margin-left: 656px;text-align: -webkit-center;margin-top: -60px;">
                    <input type="button" class="btn btn-primary" value="Build EPG" disabled />
                </div>
                <div class="form-group col-md-12">
                </div>
                <br>
                {!! Form::close() !!}
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card view-head">
                    <div class="card-header" style="background: #e09898;padding-left: 220px;">
                        <h6 style="color:red;">To Update Program name with new name, simply click update, else select all other filed from dropdowns to Add new Program </h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-head-sec">
                                <tr>
                                    <th class="align-middle" style="font-size: 14px;">ExcelProgName</th>
                                    <th class="align-middle" style="font-size: 14px;">Avaible Programs</th>
                                    <th class="align-middle" style="font-size: 14px;">Action</th>
                                    <th class="align-middle" style="font-size: 14px;"></th>
                                    <th class="align-middle" style="font-size: 14px;"></th>
                                </tr>
                                @if(!empty($show_update_match_Data))
                                    @foreach ( $show_update_match_Data as $show_match_Datas)
                                    <?php
                                        $first_character = substr($show_match_Datas->program_name, 0, 1);
                                        $chennal_show_Data =  App\Models\ProgramMasterAdd::where('program_name', 'LIKE', $first_character . '%')->get();
                                    ?>
                                        <tr>
                                            <td>{{$show_match_Datas->program_name}}</td>
                                            <td>
                                                <div class="col-12">
                                                    <select class="form-control" name="update_chenal_name" id="update_chenal_name">
                                                        @foreach ($chennal_show_Data as $key=>$chennal_show_Datas )
                                                            <option value="{{ $chennal_show_Datas->program_name }}">{{$chennal_show_Datas->program_name}}</option>
                                                        @endforeach
                                                  </select>
                                                </div>
                                            </td>
                                            <td>Update / Insert</td>
                                            <td><a href="{{ route('admin.upload_menu.add_excel_program',$show_match_Datas->id) }}" class="btn btn-dark addbuttonk">ADD</a></td>
                                            <td><a href="{{ route('admin.upload_menu.update_excel_program',$show_match_Datas->id) }}" class="btn btn-dark updatebuttonk">Update</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                            @if(count($show_update_match_Data) > 1)
                                <div class="d-flex justify-content-center">
                                    {!! $show_update_match_Data->links('pagination::bootstrap-4') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @include('admin.upload.upload_listing')
    </div>
   </div>
</section>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
{{-- <script>
    $(document).ready(function(){
        $(".addbuttonk").on("click", function () {
            var id = $(".classid").html();
            console.log(id);
            $.ajax({
                url: baseUrl + '/admin/add_excel_program/add/' + id,
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                },
                error: function (data) {

                }
            });
        });

        $(".updatebuttonk").on("click", function () {
            var id = $("#var_id").val();
            console.log(id);
            $.ajax({
                url: baseUrl + '/admin/add_excel_program/update/' + id,
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                },
                error: function (data) {

                }
            });
        });
    });
</script> --}}
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
                // processing: true,
                // serverSide: true,
                // order: [],
                ajax: {
                    url: "{{route('admin.upload_menu.getuploadmenu')}}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'program_name',
                        name: 'program_name',
                        "defaultContent": "-"
                    },
                    {
                        data: 'genre',
                        name: 'genre',
                        "defaultContent": " "
                    },
                    {
                        data: 'date',
                        name: 'date',
                        "defaultContent": "-"
                    },
                    {
                        data: 'time',
                        name: 'time',
                        "defaultContent": "-"
                    },
                    {
                        data: 'duration',
                        name: 'duration',
                        "defaultContent": "-"
                    },
                    {
                        data: 'description',
                        name: 'description',
                        "defaultContent": "-"
                    },
                    {
                        data: 'episodeno',
                        name: 'episodeno',
                        "defaultContent": "-"
                    },
                    {
                        data: 'show_wise_description',
                        name: 'show_wise_description',
                        "defaultContent": "-"
                    },
                    {
                        data: 'channel_name',
                        name: 'channel_name',
                        "defaultContent": " "
                    },
                ],
            });
        };
        initTable1();
    });
</script>
@endsection
@endsection
