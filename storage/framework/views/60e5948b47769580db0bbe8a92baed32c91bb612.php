<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.update_patient')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.update_patient')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong><?php echo e(trans('adminlte_lang::message.patient')); ?>: </strong><span><?php echo e($patient->name); ?></span>
	              </h3>
                    <div class="pull-right box-tools">
                            <a href="<?php echo e(\Illuminate\Support\Facades\URL::previous()); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
                                 <i class="fa  fa-arrow-left"></i>
                            </a>

                            <a href="<?php echo e(route('patients.show',$patient->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>")>
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="#!edit" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-patient-button" style="display: none;">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#!save" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.save')); ?>" id="edit-patient">
                                 <i class="fa fa-save"></i>
                            </a>
                    </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					<?php echo Form::model($patient, ['method'=>'PATCH','route'=>['patients.update', $patient->id],'id'=>'patient-form','files'=>true]); ?>

						<?php echo $__env->make('patients.form', ['type'=>'update','patient'=>$patient], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>