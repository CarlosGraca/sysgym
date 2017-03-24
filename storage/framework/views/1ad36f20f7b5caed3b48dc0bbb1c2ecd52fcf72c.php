<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.patients')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.patients')); ?>

<?php $__env->stopSection(); ?>

<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">  <?php echo e(trans('adminlte_lang::message.patients_list')); ?> </h3>
	              <div class="pull-left box-tools">
	                  <a href="<?php echo e(url('patients/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_patient')); ?>">
						  <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_patient')); ?>

	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					<div class="row" style="display: none;">

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="form-group form-group-sm">
								<?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

								<?php echo Form::text('name', null , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="form-group form-group-sm">
								<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

								<?php echo Form::email('email', null , ['class'=>'form-control']); ?>

							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="form-group form-group-sm">
								<?php echo Form::submit('Pesquisar', null , ['class'=>'form-control']); ?>

							</div>
						</div>

					</div>

	                <table id="table-patient" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.email')); ?></th>
		                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.contacts')); ?></th>
                            <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.genre')); ?></th>
		                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.address')); ?></th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$patient->status]); ?> patient-row">
                                    
									<td><?php echo e($patient->name); ?></td>
                                    <td><?php echo e($patient->email); ?></td>
                                    <td><?php echo e($patient->mobile); ?> / <?php echo e($patient->phone); ?></td>
                                    <td><?php echo e(trans('adminlte_lang::message.'.$patient->genre)); ?></td>
                                    <td><?php echo e($patient->address); ?></td>
                                    <td>
										<a href="<?php echo e(route('patients.show',$patient->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>">
                                            <i class="fa fa-eye"></i>
										</a>

										<a href="<?php echo e(route('patients.edit',$patient->id)); ?>" style="display: <?php echo e($patient->status == 1 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="update-patient" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" >
                                            <i class="fa fa-edit"></i>
										</a>

                                        <a href="#disable" style="display: <?php echo e($patient->status == 1 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="disable-patient" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($patient->id); ?>" data-name="<?php echo e($patient->name); ?>">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: <?php echo e($patient->status == 0 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="enable-patient" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($patient->id); ?>" data-name="<?php echo e($patient->name); ?>">
                                            <i class="fa fa-user"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		                <tbody>
                    </table>
	            </div>
	        </div>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>