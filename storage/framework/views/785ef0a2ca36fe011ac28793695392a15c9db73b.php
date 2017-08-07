<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.modality')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.modality')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="<?php echo e(asset($modality->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center"><?php echo e($modality->name); ?></h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.modality_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('modalities')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list')); ?>">
                            <i class="fa fa-list"></i> <?php echo e(trans('adminlte_lang::message.list_modality')); ?>

                        </a>
                        <a href="<?php echo e(route('modalities.edit',$modality->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

                        </a>
                        <a href="<?php echo e(url('modalities')); ?>/<?php echo e($modality->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i> <?php echo e(trans('adminlte_lang::message.print')); ?>

                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                
                                <li><a href="#students" data-toggle="tab"><i class="fa fa-user"></i> Student</a></li>
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
                                                    <a> <?php echo e($modality->name); ?> </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-money"></i>  <b><?php echo e(trans('adminlte_lang::message.price')); ?>: </b>
                                                    <a><?php echo e($Defaults->currency($modality->price)); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span ><strong class="title"><i class="fa fa-clock-o"></i> <?php echo e(trans('adminlte_lang::message.schedule')); ?></strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-12">
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
                                    </div>
                                
                                </div>
                                <!-- /.tab-pane -->

                                
                                


                                
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="students">



                                    <table id="table-office_hours" class="table table-bordered table-striped">

                                        <thead>
                                        <th class="col-md-5" ><?php echo e(trans('adminlte_lang::message.name')); ?></th>
                                        <th class="col-md-2 text-center" ><?php echo e(trans('adminlte_lang::message.price_with_iva')); ?></th>
                                        <th class="col-md-1 text-center" ><?php echo e(trans('adminlte_lang::message.iva')); ?> (%)</th>
                                        <th class="col-md-2 text-center" ><?php echo e(trans('adminlte_lang::message.discount')); ?></th>
                                        <th class="col-md-2 text-center" ><?php echo e(trans('adminlte_lang::message.total')); ?></th>
                                        </thead>
                                        <tbody>

                                        
                                            
                                            
                                                
                                                
                                                
                                                
                                                
                                            
                                            
                                        


                                        </tbody>
                                    </table>

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