<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('clients')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.clients')); ?>

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
	              <h3 class="box-title">  <?php echo e(trans('adminlte_lang::message.clients_list')); ?> </h3>
	              <div class="pull-left box-tools">
                      <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_client')): ?>
                          <a href="<?php echo e(url('clients/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_client')); ?>">
                              <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_client')); ?>

                          </a>
                    <?php endif; ?>
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
								<?php echo Form::label('add-matriculation_modality','ADD',['style'=>'visibility: hidden;'] ); ?>

								<a href="#!add-modality" class="btn btn-primary btn-sm" style="display: table;" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.search')); ?>" id="search-client">
									<i class="fa fa-search"></i> <?php echo e(trans('adminlte_lang::message.search')); ?>

								</a>
							</div>
						</div>

					</div>

	                <table id="table-client" class="table table-hover table-design">
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
                          <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="bg-<?php echo e($status_color[$client->status]); ?> client-row">
                                    
									<td><?php echo e($client->name); ?></td>
                                    <td><?php echo e($client->email); ?></td>
                                    <td><?php echo e($client->mobile); ?> / <?php echo e($client->phone); ?></td>
                                    <td><?php echo e(trans('adminlte_lang::message.'.$client->genre)); ?></td>
                                    <td><?php echo e($client->address); ?></td>
                                    <td>
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_client')): ?>
										<a href="<?php echo e(route('clients.show',$client->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>">
                                            <i class="fa fa-eye"></i>
										</a>
                                        <?php endif; ?>

										<?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_client')): ?>
											<a href="<?php echo e(route('clients.edit',$client->id)); ?>" style="display: <?php echo e($client->status == 1 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="update-client" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" >
												<i class="fa fa-edit"></i>
											</a>
										<?php endif; ?>

                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('disable_client')): ?>
                                        <a href="#disable" style="display: <?php echo e($client->status == 1 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="disable-client" title="<?php echo e(trans('adminlte_lang::message.disable')); ?>" data-key="<?php echo e($client->id); ?>" data-name="<?php echo e($client->name); ?>">
                                            <i class="fa fa-user-o"></i>
                                        </a>
                                        <?php endif; ?>


                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('enable_client')): ?>
                                        <a href="#enable" style="display: <?php echo e($client->status == 0 ? 'initial' :'none'); ?>;" data-toggle="tooltip" id="enable-client" title="<?php echo e(trans('adminlte_lang::message.enable')); ?>" data-key="<?php echo e($client->id); ?>" data-name="<?php echo e($client->name); ?>">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <?php endif; ?>

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