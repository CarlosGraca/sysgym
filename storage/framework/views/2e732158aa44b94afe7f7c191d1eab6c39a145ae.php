<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.matriculation')); ?> <?php echo e(trans('adminlte_lang::message.of')); ?> <?php echo e($matriculation->client->name); ?>

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
                <h3 class="box-title">
                    <strong><?php echo e(trans('adminlte_lang::message.matriculation')); ?> <?php echo e(trans('adminlte_lang::message.of')); ?>: </strong>
                    <span>
                        <a href="#show" id="people_show_popup" data-url="<?php echo e(route('clients.show',$matriculation->client->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.client')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.client_details')); ?>">
                            <?php echo e($matriculation->client->name); ?>

                        </a>
                    </span>
                </h3>
                <div class="pull-right box-tools">
                    <a href="<?php echo e(url('matriculation')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list_matriculation')); ?>">
                        <i class="fa  fa-list"></i>
                    </a>
                    <?php if($matriculation->status == 1): ?>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_matriculation')): ?>
                        <a href="<?php echo e(route('matriculation.edit',$matriculation->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa  fa-edit"></i>
                        </a>
                        <?php endif; ?>

                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('cancel_matriculation')): ?>
                        <a href="#cancel" data-toggle="tooltip" class="btn btn-primary btn-sm" id="cancel-matriculation" title="<?php echo e(trans('adminlte_lang::message.cancel')); ?>" data-key="<?php echo e($matriculation->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$matriculation->client->name); ?>">
                            <i class="fa fa-ban"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('publish_matriculation')): ?>
                        <a href="#publish" data-toggle="tooltip"  class="btn btn-primary btn-sm" id="publish-matriculation" title="<?php echo e(trans('adminlte_lang::message.publish_matriculation')); ?>" data-key="<?php echo e($matriculation->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$matriculation->client->name); ?>">
                            <i class="fa fa-check"></i>
                        </a>
                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if($matriculation->status == 2): ?>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('approve_matriculation')): ?>
                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.approve')); ?>" id="approve-matriculation" data-key="<?php echo e($matriculation->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$matriculation->client->name); ?>">
                            <i class="fa fa-thumbs-o-up"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('reject_matriculation')): ?>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.reject')); ?>" id="reject-matriculation" data-key="<?php echo e($matriculation->id); ?>" data-name="<?php echo e(trans('adminlte_lang::message.of').' '.$matriculation->client->name); ?>">
                            <i class="fa fa-thumbs-o-down"></i>
                        </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($matriculation->status == 3): ?>
                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('edit_payment')): ?>
                        <a href="<?php echo e(route('payments.edit',$matriculation->payment->id)); ?>" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.payments')); ?>">
                            <i class="fa fa-money"></i>
                        </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <a href="<?php echo e(url('matriculation')); ?>/<?php echo e($matriculation->id); ?>/report" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                        <i class="fa fa-print"></i>
                    </a>

                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        

                         <div class="row">
                            <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.client_information')); ?></strong></span>
                            <hr class="h-divider" >
                            <div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
                                <div class="form-group form-group-sm">
                                    <img  src="<?php echo e(asset( $matriculation->client->avatar )); ?>" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                 <ul class="list-group list-group-unbordered">
                                     <li class="list-group-item">
                                         <i class="fa fa-user"></i>  <b><?php echo e(trans('adminlte_lang::message.name')); ?>: </b>
                                         <a href="#show" id="people_show_popup" data-url="<?php echo e(route('clients.show',$matriculation->client->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.client')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.client_details')); ?>"> <?php echo e($matriculation->client->name); ?> </a>
                                     </li>
                                     <li class="list-group-item">
                                         <i class="fa fa-mobile-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.mobile')); ?>: </b>
                                         <a> <?php echo e($matriculation->client->mobile); ?> </a>
                                     </li>
                                     
                                 </ul>
                             </div>

                             <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                 <ul class="list-group list-group-unbordered">

                                     <li class="list-group-item">
                                         <i class="fa fa-at"></i>  <b><?php echo e(trans('adminlte_lang::message.email')); ?>: </b>
                                         <a> <?php echo e($matriculation->client->email); ?> </a>
                                     </li>
                                     <li class="list-group-item">
                                         <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.phone')); ?>: </b>
                                         <a> <?php echo e($matriculation->client->phone); ?> </a>
                                     </li>
                                 </ul>
                             </div>
                        </div>

                        
                        <div class="row">
                            <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.matriculation_information')); ?></strong></span>
                            <hr class="h-divider" >

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.create_date')); ?>: </b>
                                        <a> <?php echo e(\Carbon\Carbon::parse( $matriculation->created_at)->format('d/m/Y')); ?> </a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-building-o"></i>  <b><?php echo e(trans('adminlte_lang::message.branch')); ?>: </b>
                                        <a> <?php echo e($matriculation->branch->name); ?> </a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-user"></i>  <b><?php echo e(trans('adminlte_lang::message.employee')); ?>: </b>
                                        <a> <?php echo e($matriculation->user->name); ?> </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <i class="fa fa-certificate"></i>  <b><?php echo e(trans('adminlte_lang::message.status')); ?>: </b>
                                      <span class="label label-<?php echo e($status_color[$matriculation->status]); ?>">    <?php echo e($status[$matriculation->status]); ?>  </span>
                                    </li>

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
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>