<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.matriculation')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.matriculation')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
$status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
$status_color = ['danger','default','info','success','warning'];
?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.list_matriculation')); ?> </h3>
                    <div class="pull-left box-tools">
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('add_matriculation')): ?>
                        <a href="<?php echo e(url('matriculation/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_matriculation')); ?>" >
                            <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_matriculation')); ?>

                        </a>
                        <?php endif; ?>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table id="table-matriculation" class="table table-hover table-design">
                        <thead>
                        <tr>
                            
                            <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.client')); ?></th>
                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.employee')); ?></th>
                            <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?></th>
                            <th class="col-md-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $matriculation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr class="bg-<?php echo e($status_color[$item->status]); ?>">
                                
                                <td class="date text-center"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?></td>
                                <td class="client"><?php echo e($item->client->name); ?></td>
                                <td class="user"><?php echo e($item->user->name); ?></td>
                                <td class="status text-center"> <?php echo e($status[$item->status]); ?> </td>
                                <td class="total"><?php echo e($Defaults->currency($item->total)); ?></td>
                                <td class="total_with_desc"><?php echo e($Defaults->currency($item->total_discount)); ?></td>
                                <td class="matriculation_btn">
                                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_matriculation')): ?>
                                    <a href="<?php echo e(route('matriculation.show',$item->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if($item->status == 1): ?>
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_matriculation')): ?>
                                        <a href="<?php echo e(route('matriculation.edit',$item->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="update-procedure">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php endif; ?>

                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('publish_matriculation')): ?>
                                        <a href="#publish" data-toggle="tooltip" id="publish-matriculation" title="<?php echo e(trans('adminlte_lang::message.publish_matriculation')); ?>" data-key="<?php echo e($item->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$item->client->name); ?>">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <?php endif; ?>

                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('cancel_matriculation')): ?>
                                        <a href="#cancel" data-toggle="tooltip" id="cancel-matriculation" title="<?php echo e(trans('adminlte_lang::message.cancel')); ?>" data-key="<?php echo e($item->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$item->client->name); ?>">
                                            <i class="fa fa-ban"></i>
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($item->status == 2): ?>
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('approve_matriculation')): ?>
                                        <a href="#approve" data-toggle="tooltip" id="approve-matriculation" title="<?php echo e(trans('adminlte_lang::message.approve')); ?>" data-key="<?php echo e($item->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$item->client->name); ?>">
                                            <i class="fa fa-thumbs-o-up"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('reject_matriculation')): ?>
                                        <a href="#reject" data-toggle="tooltip" id="reject-matriculation" title="<?php echo e(trans('adminlte_lang::message.reject')); ?>" data-key="<?php echo e($item->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$item->client->name); ?>">
                                            <i class="fa fa-thumbs-o-down"></i>
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($item->status == 3): ?>
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_payment')): ?>
                                        <a href="<?php echo e(route('payments.edit',$item->payment->id)); ?>" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.payments')); ?>">
                                            <i class="fa fa-money"></i>
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    
                                    <a href="<?php echo e(url('matriculation')); ?>/<?php echo e($item->id); ?>/report" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                                        <i class="fa fa-print"></i>
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