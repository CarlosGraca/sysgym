<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><span id="pTitle"></span></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <span id="pName"></span>?</p>
            </div>
            <div class="modal-footer">
                <?php echo Form::open(['method' => 'DELETE', "id"=>"delForm"]); ?>

                      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>Delete</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">
                      <i class="glyphicon glyphicon-remove"></i> Close</button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
