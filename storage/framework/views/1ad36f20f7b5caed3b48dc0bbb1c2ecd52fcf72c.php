<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.patients')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.patients')); ?>

<?php $__env->stopSection(); ?>


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

	                <table id="table-patient" class="table table-bordered table-striped table-design">
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
                                <tr>
                                    
									<td><?php echo e($patient->name); ?></td>
                                    <td><?php echo e($patient->email); ?></td>
                                    <td><?php echo e($patient->mobile); ?> / <?php echo e($patient->phone); ?></td>
                                    <td><?php echo e(trans('adminlte_lang::message.'.$patient->genre)); ?></td>
                                    <td><?php echo e($patient->address); ?></td>
                                    <td>
										<a href="<?php echo e(route('patients.show',$patient->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>" data-remote='false'><i class="fa fa-eye"></i>
										</a>

										<a href="<?php echo e(route('patients.edit',$patient->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" data-remote='false'><i class="fa fa-edit"></i>
										</a>

                                        <a href="#remove" data-toggle="modal" data-target="#confirmDelete" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-product_id="<?php echo e($patient->id); ?>" data-product_name="<?php echo e($patient->id); ?>">
                                            <i class="fa fa-user-times"></i>
                                        </a>

                                        <!--
                                            <a href="<?php echo e(url('tests/pdf/')); ?>/<?php echo e($patient->id); ?>" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>


                                            -->
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