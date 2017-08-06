
<div class="modal fade" id="modal-agenda" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel-Agenda">Detalhes do Item</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <span class="pull-left">
                &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a> - <?php echo e(trans('adminlte_lang::message.copyright')); ?>

                </span>
                <span class="pull-right">
                    <?php echo e(trans('adminlte_lang::message.version')); ?>:  <?php echo e(config('app.version')); ?>

                </span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		    <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
			<div class="modal-body"></div>
			<div class="modal-footer">
                <span class="pull-left">
                &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a> - <?php echo e(trans('adminlte_lang::message.copyright')); ?>

                </span>
                    <span class="pull-right">
                    <?php echo e(trans('adminlte_lang::message.version')); ?>:  <?php echo e(config('app.version')); ?>

                </span>
			</div>
		</div>
	</div>
</div>

