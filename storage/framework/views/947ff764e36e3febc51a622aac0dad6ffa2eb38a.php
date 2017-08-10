<?php $__env->startSection('htmlheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.payments')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  <?php echo e(trans('adminlte_lang::message.payments')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
					  <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_payment')): ?>
					  <a href="<?php echo e(url('payments/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_payment')); ?>">
	                       <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_payment')); ?>

	                  </a>
					  <?php endif; ?>
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-payments" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    
							  <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
							  <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.client')); ?></th>
							  <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.payment_method')); ?></th>
							  <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.value_pay')); ?></th>
							  <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
							  <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="payments_table">
                          <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr data-key="<?php echo e($payment->id); ?>">
									<td class="date text-center"><?php echo e(\Carbon\Carbon::parse($payment->created_at)->format('d/m/Y')); ?></td>
									<td class="name"><?php echo e($payment->client_id); ?></td>
									<td class="payment_method"><?php echo e(trans('adminlte_lang::message.'.($payment->payment_method != null ? $payment->payment_method : 'none'))); ?></td>
									<td class="paid"><?php echo e($Defaults->currency($payment->value_pay)); ?></td>
									<td class="total"><?php echo e($Defaults->currency($payment->total)); ?></td>
									<td class="status"><?php echo e($payment->status); ?></td>
									<td>
										
										<a href="<?php echo e(route('payments.edit',$payment->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="edit-payments">
											<i class="fa fa-edit"></i>
										</a>
										
										<a href="#"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.cancel')); ?>" data-key="<?php echo e($payment->id); ?>" data-name="<?php echo e($payment->note); ?>">
											<i class="fa fa-ban"></i>
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