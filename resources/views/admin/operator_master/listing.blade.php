<div class="row">
    <div class="col-12">
        <div class="card view-head">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-head-sec" id="kt_table_1">
                        <thead>
                            <tr>
                                <th class="align-middle" style="font-size: 14px;">SI NO</th>
                                <th class="align-middle" style="font-size: 14px;">Operator Name</th>
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
