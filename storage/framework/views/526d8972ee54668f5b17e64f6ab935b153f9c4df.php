<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.branch')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.branch')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="<?php echo e(asset($branch->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center"><?php echo e($branch->name); ?></h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.branch_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('branches')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list')); ?>">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="<?php echo e(url('branches')); ?>/<?php echo e($branch->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="<?php echo e(route('branches.edit',$branch->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                <li><a href="#officeHours" data-toggle="tab"><?php echo e(trans('adminlte_lang::message.office_hours')); ?></a></li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="personal_data">
                                    <!-- PERSONAL INFORMATION -->
                                    <div class="row">
                                        <span ><strong class="title"> <i class="fa fa-id-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-user"></i>  <b><?php echo e(trans('adminlte_lang::message.name')); ?>: </b>
                                                    <a> <?php echo e($branch->name); ?> </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b><?php echo e(trans('adminlte_lang::message.manager')); ?>: </b>
                                                    <a><?php echo e($branch->manager); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- CONTACT INFORMATION -->
                                    <div class="row">
                                        <span ><strong class="title"> <i class="fa fa-phone"></i> <?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-map-marker"></i>  <b><?php echo e(trans('adminlte_lang::message.address')); ?>: </b>
                                                    <a> <?php echo e($branch->address); ?>, <?php echo e($branch->city); ?>, <?php echo e($branch->island->name); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b><?php echo e(trans('adminlte_lang::message.email')); ?>: </b>
                                                    <a> <?php echo e($branch->email); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.phone')); ?>: </b>
                                                    <a><?php echo e($branch->phone); ?></a>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b><?php echo e(trans('adminlte_lang::message.zip_code')); ?>: </b>
                                                    <a> <?php echo e($branch->zip_code); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-fax"></i>  <b><?php echo e(trans('adminlte_lang::message.fax')); ?>: </b>
                                                    <a><?php echo e($branch->fax); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- /.tab-pane -->

                                <!-- OFFICE HOURS TABLE-->
                                <div class="tab-pane" id="officeHours">
                                
                                    

                                        
                                        
                                        
                                        
                                        

                                        
                                        
                                            
                                                
                                                    
                                                    
                                                    
                                                
                                            
                                        
                                        
                                    
                                    



                                    
                                        
                                            
                                            
                                                
                                                    
                                                
                                            
                                        

                                        

                                            <table id="table-office_hours" class="table table-bordered table-striped">

                                                <thead>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.monday')); ?></th>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.tuesday')); ?></th>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.wednesday')); ?></th>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.thursday')); ?></th>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.friday')); ?></th>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.saturday')); ?></th>
                                                    <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.sunday')); ?></th>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($aux)): ?>
                                                    <tr>
                                                        <?php $__currentLoopData = $aux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <td style="text-align: center; padding: 2px;">
                                                                <hr style="margin-top: 0; border: 0px">
                                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <span> <?php echo e($i['start_time']); ?> </span>
                                                                    <hr>
                                                                    <span> <?php echo e($i['end_time']); ?> </span>
                                                                    <hr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </tr>
                                                <?php endif; ?>


                                                </tbody>
                                            </table>
                                        
                                    


                                </div>
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