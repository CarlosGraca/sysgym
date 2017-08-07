<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.employee')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail avatar-employee" src="<?php echo e(asset($employee->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center"><?php echo e($employee->name); ?></h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.employee_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('employees')); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list')); ?>">
                            <i class="fa fa-list"></i> <?php echo e(trans('adminlte_lang::message.employees_list')); ?>

                        </a>
                        <?php if($employee->status == 1): ?>
                            
                                <a href="<?php echo e(route('employees.edit',$employee->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                                    <i class="fa fa-edit"></i> <?php echo e(trans('adminlte_lang::message.edit')); ?>

                                </a>
                            
                        <?php endif; ?>

                        <a href="<?php echo e(url('employees')); ?>/<?php echo e($employee->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
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
                                
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="personal_data">

                                    <?php echo $__env->make('people.show',['people'=>$employee,'setting'=>['photo'=>false,'contact'=>true,'report'=>false,'work'=>true,'type_people'=>'employee']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                                    
                                        
                                    
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="documents">

                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>

                                    <?php echo Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]); ?>

                                        <?php echo Form::hidden('item_id', $employee->id, ['class'=>'form-control','id'=>'item_id']); ?>

                                        <?php echo Form::hidden('flag', 2, ['class'=>'form-control','id'=>'flag']); ?>

                                        <?php echo $__env->make('files.form', ['type'=>'create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo Form::close(); ?>


                                    <table id="table-documents" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="col-md-7"><?php echo e(trans('adminlte_lang::message.file_name')); ?></th>
                                            <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.file_type')); ?></th>
                                            <th class="col-md-2"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $Files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="file_document" data-key="<?php echo e($file->id); ?>">
                                                <td class="name_original"><?php echo e($file->name_original); ?> </td>
                                                <td class="media_type" style="text-align: center"><?php echo e($file->media_type); ?></td>
                                                <td>
                                                    <a href="#!preview" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.view')); ?>" class="file-preview" data-url="<?php echo e(url('files')); ?>/<?php echo e($file->id); ?>/preview" style="visibility: <?php echo e($file->media_type != 'doc' ? 'visible':'hidden'); ?>;"><i class="fa fa-eye"></i>
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