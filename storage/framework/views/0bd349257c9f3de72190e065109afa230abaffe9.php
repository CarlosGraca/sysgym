<div class="modal fade" id="croppie_modal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
		    <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Image Crop Preview</h4>
            </div>
			<div class="modal-body"></div>
			<div class="modal-footer">
                <span class="pull-left">
                &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a> - <?php echo e(trans('adminlte_lang::message.copyright')); ?>

                </span>
                    <span class="pull-right">
                    <?php echo e(trans('adminlte_lang::message.version')); ?>: <?php echo e(config('app.version')); ?>

                </span>
			</div>
		</div>
	</div>
</div>