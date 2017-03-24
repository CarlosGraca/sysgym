<div class="row">
	<div class="col-lg-12">
		<div class="box box-default">
			<div class="box-header with-border">
			  <h3 class="box-title">
                  <!--
				 <strong><?php echo e(trans('adminlte_lang::message.note')); ?>: </strong><span><?php echo e($consult_agenda->note); ?></span>
				 -->
			  </h3>
				<div class="pull-right box-tools">

					<a href="#!view" class="btn btn-primary btn-sm show-agenda-modal" data-url="<?php echo e(route('consult_agenda.show',$consult_agenda->id)); ?>" data-toggle="tooltip"  data-title="<?php echo e(trans('adminlte_lang::message.details_consult_agenda')); ?>" data-placement="top" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
						<i class="fa fa-eye"></i>
					</a>

                    <?php if($consult_agenda->status == 1): ?>

                        <a href="#!edit" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-consult_agenda-button" style="display: none;">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="#!save" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-consult_agenda">
                             <i class="fa fa-save"></i>
                        </a>

                    <?php endif; ?>

                    <a href="#close" class="btn btn-primary btn-sm" data-dismiss="modal" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.close')); ?>">
                        <i class="fa  fa-close"></i>
                    </a>
				</div><!-- /. tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<?php echo Form::model($consult_agenda, ['method'=>'PATCH','route'=>['consult_agenda.update', $consult_agenda->id],'id'=>'consult_agenda-form','files'=>true]); ?>

					<?php echo $__env->make('consult_agenda.form', ['type'=>'update','consult_agenda'=>$consult_agenda], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>

