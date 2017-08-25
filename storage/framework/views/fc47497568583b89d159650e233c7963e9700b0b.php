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
$status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.active')];
$status_color = ['danger','success'];
?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo e(trans('adminlte_lang::message.list_matriculation')); ?> </h3>
                    <div class="pull-left box-tools">
                        <a href="<?php echo e(url('matriculation/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_matriculation')); ?>" >
                            <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_matriculation')); ?>

                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table id="table-matriculation" class="table-design display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            
                            <th class="col-md-1"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.client')); ?></th>
                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.note')); ?></th>
                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
                            <th class="col-md-2"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $matriculation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr class="bg-<?php echo e($status_color[$item->status]); ?>">
                                <td class="text-center"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?></td>
                                <td><?php echo e($item->client->name); ?></td>
                                <td><?php echo e($item->modality->name); ?></td>
                                <td><?php echo e($item->note); ?></td>
                                <td class="text-center"> <span class="label label-<?php echo e($status_color[$item->status]); ?>"><?php echo e($status[$item->status]); ?></span> </td>
                                <td>

                                    <a href="<?php echo e(route('matriculation.show',$item->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    

                                    <?php if($item->status != 1): ?>
                                        
                                        <a href="<?php echo e(route('matriculation.edit',$item->id)); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>" id="update-procedure">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php endif; ?>

                                        
                                        
                                            
                                        
                                        

                                        
                                        
                                            
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                        
                                        
                                        
                                            
                                        
                                        
                                    


                                        
                                        <a href="<?php echo e(url('payments/create?idCliente='.$item->client_id.'&idMatriculation='.$item->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.payments')); ?>">
                                            <i class="fa fa-money"></i>
                                        </a>
                                        
                                        

                                    
                                    <a href="#print" data-url="<?php echo e(url('matriculation')); ?>/<?php echo e($item->id); ?>/report" id="pop-new-window" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
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