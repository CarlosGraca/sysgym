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
    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
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
                        <a href="#show" id="people_show_popup" data-url="<?php echo e(route('clients.show',$matriculation->client_id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.client')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.client_details')); ?>">
                            <?php echo e($matriculation->client->name); ?>

                        </a>
                    </span>
                </h3>
                <div class="pull-right box-tools">
                    <a href="<?php echo e(url('matriculation')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list_matriculation')); ?>">
                        <i class="fa  fa-list"></i> <?php echo e(trans('adminlte_lang::message.list_matriculation')); ?>

                    </a>
                        <a href="<?php echo e(route('matriculation.edit',$matriculation->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa  fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

                        </a>

                        <a href="<?php echo e(url('payments/create?idCliente='.$matriculation->client_id)); ?>" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.payments')); ?>">
                            <i class="fa fa-money"></i> <?php echo e(trans('adminlte_lang::message.payments')); ?>

                        </a>

                        <a href="<?php echo e(url('matriculation')); ?>/<?php echo e($matriculation->id); ?>/report" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i> <?php echo e(trans('adminlte_lang::message.print')); ?>

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
                                    
                                        
                                        
                                    
                                    
                                        
                                        
                                    
                                </ul>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                        
                                            
								                
                                            
                                            
                                                
                                            
                                        
                                    </div><!-- /.box-header -->

                                    <div class="box-body no-padding">
                                        <table id="table-matriculation_modality" class="table table-bordered table-striped">
                                            <thead id="matriculation_without_secure">
                                                <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
                                                <th class="col-md-3 text-center"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
                                            </thead>
                                            
                                            
                                                
                                                <tr class="matriculation_table">
                                                    <td class="modality" data-value="<?php echo e($matriculation->modality->id); ?>" ><?php echo e($matriculation->modality->name); ?></td>
                                                    <td class="price text-center" data-value="<?php echo e($matriculation->modality->price); ?>" ><?php echo e($Defaults->currency($matriculation->modality->price)); ?></td>
                                                </tr>
                                                
                                            

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