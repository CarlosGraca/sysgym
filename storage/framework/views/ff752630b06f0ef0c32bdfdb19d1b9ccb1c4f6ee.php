<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.role')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.role')); ?>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('main-content'); ?>
    <div class="row">
        

            
            
                
                    
                        
                        
                    

                    
                
                
            
            


        
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.role_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('roles')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list')); ?>">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="<?php echo e(url('roles')); ?>/<?php echo e($role->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="<?php echo e(route('roles.edit',$role->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                
                                <li><a href="#users" data-toggle="tab"><i class="fa fa-user-secret"></i> <?php echo e(trans('adminlte_lang::message.users')); ?></a></li>
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
                                                    <a> <?php echo e($role->name); ?> </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-quote-left"></i>  <b><?php echo e(trans('adminlte_lang::message.description')); ?>: </b>
                                                    <a> <?php echo e($role->label); ?> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span ><strong class="title"><i class="fa fa-key"></i> <?php echo e(trans('adminlte_lang::message.permissions')); ?></strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-12">
                                            <table id="table-permission" class="table table-bordered table-striped table-design">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
                                                    <th class="col-md-10"><?php echo e(trans('adminlte_lang::message.description')); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $role->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr>
                                                        <td class="name"><?php echo e($permission->name); ?> </td>
                                                        <td class="description"><?php echo e($permission->label); ?> </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                
                                


                                
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="users">

                                    

                                    <div class="row">
                                        
                                        
                                        <div class="col-lg-12">
                                            <table id="table-users" class="table table-bordered table-striped table-design">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
                                                    <th class="col-md-10"><?php echo e(trans('adminlte_lang::message.email')); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($user->roles->first()->id == $role->id): ?>

                                                        <tr>
                                                            <td class="name"><?php echo e($user->name); ?> </td>
                                                            <td class="email"><?php echo e($user->email); ?> </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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