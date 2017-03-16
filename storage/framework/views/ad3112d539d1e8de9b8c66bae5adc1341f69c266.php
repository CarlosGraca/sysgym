<div class="modal fade" id="modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		    <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Detalhes do Item</h4>
            </div>
			<div class="modal-body"></div>
			<div class="modal-footer">
                <span class="pull-left">
                &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a> - Todos os Direitos Reservados
                </span>
                    <span class="pull-right">
                    Versão: 1.0
                </span>
			</div>
		</div>
	</div>
</div>