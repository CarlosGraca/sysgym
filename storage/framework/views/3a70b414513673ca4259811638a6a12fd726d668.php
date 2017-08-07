<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.employees_category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.employees_category')); ?>

<?php $__env->stopSection(); ?>

<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.employees_category_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('employees_category')); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list')); ?>">
                            <i class="fa fa-list"></i> <?php echo e(trans('adminlte_lang::message.employees_category_list')); ?>

                        </a>
                        <a href="<?php echo e(route('employees_category.edit',$employees_category->id)); ?>" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

                        </a>
                        <a href="<?php echo e(url('employees_category')); ?>/<?php echo e($employees_category->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i> <?php echo e(trans('adminlte_lang::message.print')); ?>

                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                <li><a href="#employees" data-toggle="tab"><i class="fa fa-users"></i> <?php echo e(trans('adminlte_lang::message.employees')); ?></a></li>
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
                                                    <a> <?php echo e($employees_category->name); ?> </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-money"></i>  <b><?php echo e(trans('adminlte_lang::message.salary_base')); ?>: </b>
                                                    <a> <?php echo e($Defaults->currency($employees_category->salary_base)); ?> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="employees">

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
                                                <?php $__currentLoopData = $employees_category->employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($employee->name); ?> </td>
                                                        <td><?php echo e($employee->email); ?> </td>
                                                    </tr>
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