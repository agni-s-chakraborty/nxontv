<?php use Request as Input; ?>
@extends('admin.admindashboard')

@section('title','Channel Genre Master')
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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
@endsection
@section('content')
    <div class="section-header mt-3">
        <h1>Other Info Master</h1>
        <hr>
    </div>
    <div class="section-body">
        @include('layout.errormessage')
        <div class="row-12 mr-4">

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Category</label>
                    <select class="form-control" id="category_type" name="category_type">
                        <option selected="true" disabled="disabled">Choose Category</option>
                        <option value="cast" >StarCast</option>
                        <option value="director" >Director</option>
                        <option value="writer" >Writer</option>
                        <option value="producter" >Producer</option>
                    </select>
                </div>
                <form class="form-group m-0 p-0  row-md-12 w-100" action="" method="POST" enctype="multipart/form-data" >
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Cast Name</label>
                            <input type="text" class="form-control cast_name" id="cast_name" name="cast_name" value="{{ old('cast_name') }}">
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Cast Image</label>
                            <input type="file" class="form-control" id="cast_image" name="cast_image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">About</label>
                            <input type="text" class="form-control cast_name" id="name" name="name" value="{{ old('name') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">About</label>
                            <input type="text" class="form-control cast_about" id="about" name="about" value="{{ old('about') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left  d-none">
                        <div class="form-group">
                            <label class="control-label">Best Film</label>
                            <input type="text" class="form-control cast_film" id="best_film" name="best_film" value="{{ old('best_film') }}" >
                        </div>
                    </div>
                    <div class="col-md-3    d-none">
                        <div class="form-group">
                            <label class="control-label">Award</label>
                            <input type="text" class="form-control cast_award" id="award" name="award" value="{{ old('award') }}" >
                        </div>
                    </div>
                    <div class="company-mas-gen  float-left  form-group col-md-3 d-none">
                        @if(isset($chennel_genre->id))
                            <input type="hidden" id="edit_id" name="edit_id" value="{{$chennel_genre->id}}">
                            <button class="btn btn-primary cast_buton submitbutton">Update</button>
                        @else
                            <button class="btn btn-primary cast_buton submitbutton">Add</button>
                        @endif
                    </div>
                    <div class="card-header-action-lge form-group reset d-none">
                        <a href="" class="btn btn-danger cast_buton btn-action">Reset</a>
                    </div>
                </form>
                <form class="form-group m-0 p-0   row-md-12 w-100" action=""  method="POST" enctype="multipart/form-data">
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Director Name</label>
                            <input type="text" class="form-control" id="director_name" name="director_name" value="{{ old('cast_name') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Director Image</label>
                            <input type="file" class="form-control" id="director_image" name="director_image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">About</label>
                            <input type="text" class="form-control director_about" id="about" name="about" value="{{ old('about') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left  d-none">
                        <div class="form-group">
                            <label class="control-label">Best Film</label>
                            <input type="text" class="form-control director_best_film" id="best_film" name="best_film" value="{{ old('best_film') }}" >
                        </div>
                    </div>
                    <div class="col-md-3    d-none">
                        <div class="form-group">
                            <label class="control-label">Award</label>
                            <input type="text" class="form-control director_award" id="award" name="award" value="{{ old('award') }}" >
                        </div>
                    </div>
                    <div class="company-mas-gen  float-left  form-group col-md-3 d-none">
                        @if(isset($chennel_genre->id))
                            <input type="hidden" id="edit_id" name="edit_id" value="{{$chennel_genre->id}}">
                            <button class="btn btn-primary director_buton submitbutton">Update</button>
                        @else
                            <button class="btn btn-primary director_buton submitbutton">Add</button>
                        @endif
                    </div>
                    <div class="card-header-action-lge form-group reset d-none">
                        <a href="" class="btn btn-danger director_buton btn-action">Reset</a>
                    </div>
                </form>
                <form class="form-group m-0 p-0  row-md-12 w-100" action=""  method="POST" enctype="multipart/form-data">
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Writer Name</label>
                            <input type="text" class="form-control" id="writer_name" name="writer_name" value="{{ old('cast_name') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Writer Image</label>
                            <input type="file" class="form-control" id="writer_image" name="writer_image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">About</label>
                            <input type="text" class="form-control writer_about" id="about" name="about" value="{{ old('about') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left  d-none">
                        <div class="form-group">
                            <label class="control-label">Best Film</label>
                            <input type="text" class="form-control writer_best_film" id="best_film"  name="best_film" value="{{ old('best_film') }}" >
                        </div>
                    </div>
                    <div class="col-md-3    d-none">
                        <div class="form-group">
                            <label class="control-label">Award</label>
                            <input type="text" class="form-control writer_award" id="award" name="award" value="{{ old('award') }}" >
                        </div>
                    </div>
                    <div class="company-mas-gen  float-left  form-group col-md-3 d-none">
                        @if(isset($chennel_genre->id))
                            <input type="hidden" id="edit_id" name="edit_id" value="{{$chennel_genre->id}}">
                            <button class="btn btn-primary writer_buton submitbutton">Update</button>
                        @else
                            <button class="btn btn-primary writer_buton submitbutton">Add</button>
                        @endif
                    </div>
                    <div class="card-header-action-lge form-group reset d-none">
                        <a href="" class="btn btn-danger writer_buton btn-action">Reset</a>
                    </div>
                </form>
                <form class="form-group m-0 p-0  row-md-12 w-100" action=""  method="POST" enctype="multipart/form-data">
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Producer Name</label>
                            <input type="text" class="form-control" id="producer_name" name="producer_name" value="{{ old('producer_name') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">Producer Image</label>
                            <input type="file" class="form-control" id="producer_image" name="producer_image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                        </div>
                    </div>
                    <div class="col-md-3  float-left d-none">
                        <div class="form-group">
                            <label class="control-label">About</label>
                            <input type="text" class="form-control producer_about" id="about" name="about" value="{{ old('about') }}" >
                        </div>
                    </div>
                    <div class="col-md-3  float-left  d-none">
                        <div class="form-group">
                            <label class="control-label">Best Film</label>
                            <input type="text" class="form-control producer_best_film" id="best_film" name="best_film" value="{{ old('best_film') }}" >
                        </div>
                    </div>
                    <div class="col-md-3    d-none">
                        <div class="form-group">
                            <label class="control-label">Award</label>
                            <input type="text" class="form-control producer_award" id="award" name="award" value="{{ old('award') }}" >
                        </div>
                    </div>
                    <div class="company-mas-gen  float-left  form-group col-md-3 d-none">
                        @if(isset($chennel_genre->id))
                            <input type="hidden" id="edit_id" name="edit_id" value="{{$chennel_genre->id}}">
                            <button class="btn btn-primary producer_buton submitbutton">Update</button>
                        @else
                            <button class="btn btn-primary  producer_buton submitbutton">Add</button>
                        @endif
                    </div>
                    <div class="card-header-action-lge form-group reset d-none">
                        <a href="" class="btn btn-danger producer_buton btn-action">Reset</a>
                    </div>
                </form>
            </div>

            <br>
        </div>
        <div class="row mt-5 ">
            <div class="col-12">
           
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Category</label>
                        <select class="form-control" id="category_type_show" name="category_type_show">
                            <option selected="true" disabled="disabled">Choose Category</option>
                            <option value="star_casts" >StarCast</option>
                            <option value="directors" >Director</option>
                            <option value="writers" >Writer</option>
                            <option value="producers" >Producer</option>
                        </select>
                    </div>
                </div>
               
                <div class="card view-head">
                    <div class="card-header">
                        <h4></h4>
                        <div class="card-header-form">
                           
                        </div>
                    </div>
                    <div class="card-body p-3">
                        
                        <br />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-head-sec" id="kt_table_1">
                                <thead id="thead_show">
                                <tr>
                                    <th style='font-size: 14px;'>Sl. no</th>
                                    <th class='align-middle' style='font-size: 14px;'>Category</th>
                                    <th class='align-middle' style='font-size: 14px;'>Name</th>
                                    <th class='align-middle' style='font-size: 14px;'>Image</th>
                                    <th class='align-middle' style='font-size: 14px;'>About</th>
                                    <th class='align-middle' style='font-size: 14px;'>Best film</th>
                                    <th class='align-middle' style='font-size: 14px;'>Award</th>
                                    <th class='align-middle' style='font-size: 14px;'>Action</th>
                                </tr>
                                </thead>
                               
                                    <tbody id="tbody_show">

                                    </tbody>
                                
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

        <!-- Image Functionality Modal -->
        <div id="exampleModalgenre" class="modal">
            <span class="close1">&times;</span>
            <div class="modal-content">
                <img class="dynamic-modal-content" src="" width="700px" height="500px"/>
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
    <script src="{{asset('admin/assets/js/otherInfoMaster.js')}}"></script>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   

<script>
   //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
            $("#category_type_show").on('change', function () {
            var type_drop = $(this).val();
            switch (type_drop) { 
                case 'star_casts': 
                    $("#thead_show").html("<tr><th style='font-size: 14px;'>Sl. no</th><th class='align-middle' style='font-size: 14px;'>Category</th><th class='align-middle' style='font-size: 14px;'>StarCast Name</th><th class='align-middle' style='font-size: 14px;'>StarCast Image</th><th class='align-middle' style='font-size: 14px;'>About</th><th class='align-middle' style='font-size: 14px;'>Best film</th><th class='align-middle' style='font-size: 14px;'>Award</th><th class='align-middle' style='font-size: 14px;'>Action</th></tr>");
                    //alert('yo');
                    break;
                case 'producers': 
                    $("#thead_show").html("<tr><th style='font-size: 14px;'>Sl. no</th><th class='align-middle' style='font-size: 14px;'>Category</th><th class='align-middle' style='font-size: 14px;'>Producer Name</th><th class='align-middle' style='font-size: 14px;'>Producer Image</th><th class='align-middle' style='font-size: 14px;'>About</th><th class='align-middle' style='font-size: 14px;'>Best film</th><th class='align-middle' style='font-size: 14px;'>Award</th><th class='align-middle' style='font-size: 14px;'>Action</th></tr>");
                    //alert('prototype Wins!');
                    break;
                case 'directors': 
                     $("#thead_show").html("<tr><th style='font-size: 14px;'>Sl. no</th><th class='align-middle' style='font-size: 14px;'>Category</th><th class='align-middle' style='font-size: 14px;'>Director Name</th><th class='align-middle' style='font-size: 14px;'>Director Image</th><th class='align-middle' style='font-size: 14px;'>About</th><th class='align-middle' style='font-size: 14px;'>Best film</th><th class='align-middle' style='font-size: 14px;'>Award</th><th class='align-middle' style='font-size: 14px;'>Action</th></tr>");
                    //alert('mootools Wins!');
                    break;
                case 'writers': 
                    $("#thead_show").html("<tr><th style='font-size: 14px;'>Sl. no</th><th class='align-middle' style='font-size: 14px;'>Category</th><th class='align-middle' style='font-size: 14px;'>Writer Name</th><th class='align-middle' style='font-size: 14px;'>Writer Image</th><th class='align-middle' style='font-size: 14px;'>About</th><th class='align-middle' style='font-size: 14px;'>Best film</th><th class='align-middle' style='font-size: 14px;'>Award</th><th class='align-middle' style='font-size: 14px;'>Action</th></tr>");
                    //alert('mootools Wins!');
                    break;		
                default:
                    alert('Select a category!');;
            }


            $.ajax({
                    url:"{{ url('other_info') }}",
                    data: {type_drop: type_drop},
                    data: {abc: "abc"}
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    type:'post',
                    success: function(result){
                        $("#tbody_show").html(result.msg+type_drop);
                        
                    }
            });
            
        });
    });
    </script>






    <script type="text/javascript">


        jQuery(document).ready(function() {

            //==================== Form Validation====================
            // $('#createform').validate({
            //     rules: {
            //         genre_name: {required: true, maxlength: 15,},
            //         genre_short_name: {required: true, maxlength: 2},
            //         genre_icon: {required: true, extension: "png|jpeg|jpg"}
            //     },
            //     submitHandler: function(form) {
            //         if ($("form").validate().checkForm()) {
            //             $(".submitbutton").attr("type", "button");
            //             $(".submitbutton").addClass("disabled");
            //             form.submit();
            //         }
            //     }
            // });
            //===================Load DataTable ======================
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
                        url: "{{route('admin.channel_genre_master.getchannelgenre')}}",
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        }
                    },
                    columns: [{data: 'id', name: 'id', searchable: false, orderable: false,},
                        {data: 'category_type', name: 'category_type', "defaultContent": "-"},
                        {data: 'cast_name', name: 'cast_name', "defaultContent": "-"},
                        {data: 'cast_image', name: 'cast_image', "defaultContent": "-"},
                        {data: 'about', name: 'about', "defaultContent": "-"},
                        {data: 'best_film', name: 'best_film', "defaultContent": "-"},
                        {data: 'award', name: 'award', "defaultContent": "-"},
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
            //===================== Delete Data Form Table ===========
            $("#delete-record").on("click", function () {
                var id = $("#id").val();
                $('#exampleModal').modal('hide');

                $.ajax({
                    url: baseUrl + '/admin/channel_genre_master/channel_genre_delete_modal/' + id,
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
    <script>
        //===================== Image Modal  ==========================
        // $(document).ready(function(){
        //     $(document).on("click",".image_genrel",function(){
        //         var src= $(this).data('src');
        //         $(".dynamic-modal-content").attr('src',src);
        //     });
        // });
    </script>
@endsection

