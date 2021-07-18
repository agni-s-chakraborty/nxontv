<div class="row">
    <div class="col-12">
        <div class="card view-head">
            <!-- <div class="card-header">
                <h4></h4>
                <div class="card-header-form">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-head-sec" id="kt_table_1">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th class="align-middle" style="font-size: 14px;">Company Name</th>
                                <th class="align-middle" style="font-size: 14px;">Channel Name</th>
                                <th class="align-middle" style="font-size: 14px;">Channel Gener</th>
                                <th class="align-middle" style="font-size: 14px;">Channel Language</th>
                                <th class="align-middle" style="font-size: 14px;">Channel TRP</th>
                                <th class="align-middle" style="font-size: 14px;">Status</th>
                                <th class="align-middle" style="font-size: 14px;">Action</th>
                            </tr>
                        </thead>
                        <!-- <tr class="table-fd">
                            <td>001</td>
                            <td class="align-middle">Ep Service</td>
                            <td class="align-middle">Ep Service</td>
                            <td class="align-middle">Ep Service Ep Service Ep Service</td>
                            <td class="align-middle">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="View"
                                    id="modal-5"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                    id="modal-7"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger1 btn-action" data-toggle="tooltip" title="Delete"
                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr> -->

                    </table>
                </div>
            </div>

            <!-- <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span
                                    class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div> -->

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
