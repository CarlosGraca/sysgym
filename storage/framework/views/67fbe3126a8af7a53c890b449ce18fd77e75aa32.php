<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.client')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('clients')); ?>

<?php $__env->stopSection(); ?>

<?php $defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
$status = $defaults->getStatus();
$status_color = $defaults->getStatusColor();
?>



<?php $__env->startSection('main-content'); ?>
    <div class="row">

        <?php if($client->status == 0): ?>
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissible" role="info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><i class="fa fa-info-circle"></i></strong> <?php echo e(trans('adminlte_lang::message.msg_disabled_client')); ?>

                </div>
            </div>

        <?php endif; ?>

        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="<?php echo e(asset($client->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center"><?php echo e($client->name); ?></h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.client_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('clients')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.clients_list')); ?>">
                            <i class="fa fa-list"></i> <?php echo e(trans('adminlte_lang::message.clients_list')); ?>

                        </a>

                        <?php if($client->status == 1): ?>
                            
                            <a href="<?php echo e(route('clients.edit',$client->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                                <i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

                            </a>
                            
                        <?php endif; ?>

                        <a href="<?php echo e(url('clients')); ?>/<?php echo e($client->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i> <?php echo e(trans('adminlte_lang::message.print')); ?>

                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"> <i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                <li><a href="#documents" data-toggle="tab"> <i class="fa fa-folder-open-o"></i> <?php echo e(trans('adminlte_lang::message.documents')); ?></a></li>
                                
                                
                                
                                <li><a href="#matriculation" data-toggle="tab"><i class="fa fa-cube"></i> <?php echo e(trans('adminlte_lang::message.matriculation')); ?></a></li>
                                
                                
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="personal_data">
                                    <?php echo $__env->make('people.show',['people'=>$client,'setting'=>['photo'=>false,'contact'=>true,'report'=>false,'work'=>true,'type_people'=>'client']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <!-- /.tab-pane -->

                                <!-- DOCUMENTS TABLE-->
                                <div class="tab-pane" id="documents">

                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>

                                    <?php echo Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]); ?>

                                        <?php echo Form::hidden('item_id', $client->id, ['class'=>'form-control','id'=>'item_id']); ?>

                                        <?php echo Form::hidden('flag', 1, ['class'=>'form-control','id'=>'flag']); ?>

                                        <?php echo $__env->make('files.form', ['type'=>'create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo Form::close(); ?>


                                    <table id="table-documents" class="table table-bordered table-striped">
                                        <thead>
                                          <tr>

                                            <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.file_name')); ?></th>
                                              <th class="col-md-5" style="text-align: center"><?php echo e(trans('adminlte_lang::message.description')); ?></th>
                                              <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.file_type')); ?></th>
                                            <th class="col-md-1"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $Files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr class="file_document" data-key="<?php echo e($file->id); ?>">
                                                    <td class="name_original"><?php echo e($file->name_original); ?> </td>
                                                    <td class="description"><?php echo e($file->description); ?> </td>
                                                    <td class="media_type" style="text-align: center"><?php echo e($file->media_type); ?></td>
                                                    <td>
                                                        <a href="#!preview" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.preview')); ?>" class="file-preview" data-url="<?php echo e(url('files')); ?>/<?php echo e($file->id); ?>/preview" style="visibility: <?php echo e($file->media_type != 'doc' ? 'visible':'hidden'); ?>;"><i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="<?php echo e(url('files')); ?>/<?php echo e($file->id); ?>/download" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.download')); ?>" ><i class="fa fa-download"></i>
                                                        </a>
                                                        <a href="#!remove" data-url="<?php echo e(url('files')); ?>/<?php echo e($file->id); ?>/remove" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.remove')); ?>" class="file-remove"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.tab-pane -->

                                <!-- AGENDA OF CONSULT -->
                                
                                    
                                    

                                        
                                            
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                        
                                            
                                                
                                                
                                                
                                                
                                                

                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                        
                                    
                                
                                

                                
                                

                                    
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                        

                                        
                                    

                                
                                <!-- /.tab-pane -->

                                
                                

                                    
                                        
                                            

                                            
                                                
                                                
                                            
                                            
                                        
                                        
                                        
                                            
                                        
                                        
                                    
                                
                                <!-- /.tab-pane -->

                                <!-- BUDGET -->
                                <div class="tab-pane" id="matriculation">

                                   <?php
                                   $matriculation_status = [trans('adminlte_lang::message.inactive'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
                                   $matriculation_status_color = ['danger','success'];
                                   ?>

                                    <table id="table-matriculation" class="table table-hover table-design">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                                            <th class="col-md-5" style="text-align: center"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
                                            <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $client->matriculation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="bg-<?php echo e($matriculation_status_color[$item->status]); ?>">
                                                <td class="date text-center"><?php echo e(\Carbon\Carbon::parse( $item->created_at )->format('d/m/Y')); ?></td>
                                                <td><?php echo e($item->modality->name); ?></td>
                                                <td><?php echo e($defaults->currency($item->modality->price)); ?></td>
                                                <td class="status text-center"> <span class="label label-<?php echo e($matriculation_status_color[$item->status]); ?>"><?php echo e($matriculation_status[$item->status]); ?></span>  </td>
                                                <td class="text-center">
                                                    <a href="<?php echo e(route('matriculation.show',$item->id)); ?>" target="_blank" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('payments.create','idCliente='.$client->id.'&idMatriculation='.$item->id)); ?>"  title='<?php echo e(trans('adminlte_lang::message.payment')); ?>' target="_blank" >
                                                        <i class="fa fa-money"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                
                                


                                    
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                        
                                        
                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                                
                                                
                                            
                                            
                                        
                                        
                                    

                                
                                <!-- /.tab-pane -->

                                

                                    

                                        
                                            
                                              
                                                
                                              

                                            
                                            
                                            
                                            
                                            
                                            
                                                
                                            
                                        

                                        
                                              
                                                
                                              

                                            
                                            
                                            
                                                
                                            
                                        

                                    

                                
                                <!-- /.tab-pane -->


                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
        </div>
        <!-- /.col -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>