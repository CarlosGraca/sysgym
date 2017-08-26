<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.report')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice'); ?>
    <style>@page  { size: A4 }</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice-body-class'); ?>
A4
<?php $__env->stopSection(); ?>


<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
$status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
$status_color = ['danger','default','info','success','warning'];
?>
<?php $__env->startSection('main-content'); ?>
    <section class="sheet padding-10mm">
        <!-- title row -->
        <div class="row" style="margin-top:0;">
            <div class="col-lg-12">
                <div class="row invoice-title">
                    <div class="col-lg-12">
                        
                        <div class="col-lg-2">
                            <img  src="<?php echo e(asset($company->logo)); ?>" id="logo" alt="Cinque Terre" height="120" class="pull-left">
                        </div>
                        <div class="col-lg-10" style="vertical-align: middle; display: table-cell;">
                            
                        </div>
                    </div>
                </div>

                
                <div class="row" style="margin-top:20px;">
                    <div class="col-lg-12 invoice-info">
                        <?php echo $__env->make('people.show',['people' =>  $matriculation->client,'setting'=>['photo'=>true,'contact'=>false,'report'=>true,'work'=>false, 'type_people'=>'client']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

                
                <div class="row">
                    <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.matriculation_information')); ?></strong></span>
                    <hr class="h-divider" >

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.date')); ?>: </b>
                                <a> <?php echo e(\Carbon\Carbon::parse($matriculation->created_at)->format('d/m/Y')); ?> </a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-user-secret"></i>  <b><?php echo e(trans('adminlte_lang::message.employee')); ?>: </b>
                                <a> <?php echo e($matriculation->user->name); ?> </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <i class="fa fa-quote-left"></i>  <b><?php echo e(trans('adminlte_lang::message.note')); ?>: </b>
                                <a> <?php echo e($matriculation->note); ?> </a>
                            </li>

                        </ul>
                    </div>
                </div>

                
                <div class="row">
                    <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.modality')); ?></strong></span>
                    <hr class="h-divider" >

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.list_modality')); ?></h3>
                                <div class="pull-right">
                                    <span style="margin-right: 20px;">
                                        <b><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?>: </b><span id="matriculation-sum-discount" data-value="<?php echo e($matriculation->total_discount); ?>"> <?php echo e($Defaults->currency($matriculation->total_discount)); ?> </span>
                                    </span>
                                    <span>
                                        <b><?php echo e(trans('adminlte_lang::message.total')); ?>: </b><span id="matriculation-sum-total" data-value="<?php echo e($matriculation->total); ?>"> <?php echo e($Defaults->currency($matriculation->total)); ?> </span>
                                    </span>
                                </div>
                            </div><!-- /.box-header -->

                            <div class="box-body no-padding">
                                <table id="table-matriculation_modality" class="table table-bordered table-striped">
                                    <thead id="matriculation_without_secure">
                                        <th class="col-md-4 text-center"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
                                        <th class="col-md-3 text-center"><?php echo e(trans('adminlte_lang::message.price_with_iva')); ?></th>
                                        <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.iva')); ?> (%)</th>
                                        <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.discount')); ?></th>
                                        <th class="col-md-3 text-center"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
                                    </thead>

                                    <?php $__currentLoopData = $matriculation->modality->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modality): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="matriculation_table" data-key="<?php echo e($modality->id); ?>" data-total="<?php echo e($modality->total); ?>">
                                            <td class="modality" data-value="<?php echo e($modality->modality_id); ?>" ><?php echo e($modality->modality->name); ?></td>
                                            <td class="price text-center" data-value="<?php echo e($modality->price); ?>" ><?php echo e($Defaults->currency($modality->price)); ?></td>
                                            <td class="iva text-center" data-value="<?php echo e($modality->iva); ?>" ><?php echo e($modality->iva); ?> %</td>
                                            <td class="discount text-center" data-value="<?php echo e($modality->discount); ?>" ><?php echo e($Defaults->currency($modality->discount)); ?></td>
                                            <td class="total_price text-center" data-value="<?php echo e($modality->total); ?>" ><?php echo e($Defaults->currency($modality->total)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.report', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>