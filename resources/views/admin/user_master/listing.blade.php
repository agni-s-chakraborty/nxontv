    <div class="row">
        <div class="col-12">
            <div class="card view-head">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-head-sec" id="kt_table_1">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th style="font-size: 14px;">User Name</th>
                                    <th class="align-middle" style="font-size: 14px;">Role</th>
                                    <th class="align-middle" style="font-size: 14px;">Email</th>
                                    <th class="align-middle" style="font-size: 14px;">Profile Picture</th>
                                    <th class="align-middle" style="font-size: 14px;">Login Time</th>
                                    <th class="align-middle" style="font-size: 14px;">LogOut Time</th>
                                    <th class="align-middle" style="font-size: 14px;">Status</th>
                                    <th class="align-middle" style="font-size: 14px;">Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <form class="">
                        <div class="row">
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Login Time</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>LogOut Time</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <button class="d-none" id="fire-modal-2-submit"></button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke"> <button type="submit" class="btn btn-primary btn-shadow"
                        id="">Submit</button></div>
            </div>
        </div>
    </div> -->



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


<div id="exampleModalgenre" class="modal">
    <span class="close1">&times;</span>
    <div class="modal-content">
        <img class="dynamic-modal-content" src="" width="700px" height="500px"/>
    </div>
</div>
