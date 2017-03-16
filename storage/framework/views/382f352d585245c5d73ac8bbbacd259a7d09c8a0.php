<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.patient')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.secure_agency')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="<?php echo e(asset($agency->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center"><?php echo e($agency->name); ?></h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.agency_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('secure_agency')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.list')); ?>">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="<?php echo e(url('secure_agency')); ?>/<?php echo e($agency->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="<?php echo e(route('secure_agency.edit',$agency->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                <li><a href="#insured" data-toggle="tab"><?php echo e(trans('adminlte_lang::message.insured')); ?></a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
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
                                                    <a> <?php echo e($agency->name); ?> </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b><?php echo e(trans('adminlte_lang::message.nif')); ?>: </b>
                                                    <a><?php echo e($agency->nif); ?></a>
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
                                                    <a> <?php echo e($agency->address); ?>, <?php echo e($agency->city); ?>, <?php echo e($agency->island->name); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b><?php echo e(trans('adminlte_lang::message.email')); ?>: </b>
                                                    <a href="mailto:<?php echo e($agency->email); ?>"> <?php echo e($agency->email); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.phone')); ?>: </b>
                                                    <a href="tel:<?php echo e($agency->phone); ?>"><?php echo e($agency->phone); ?></a>
                                                </li>

                                                <li class="list-group-item">
                                                    <i class="fa fa-facebook-official"></i>  <b><?php echo e(trans('adminlte_lang::message.facebook')); ?>: </b>
                                                    <a><?php echo e($agency->facebook); ?></a>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b><?php echo e(trans('adminlte_lang::message.zip_code')); ?>: </b>
                                                    <a> <?php echo e($agency->zip_code); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-globe"></i>  <b><?php echo e(trans('adminlte_lang::message.website')); ?>: </b>
                                                    <?php echo link_to($agency ? $agency->website : null, $title = null, $attributes = ['target'=>'blank'], $secure = null); ?>

                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-fax"></i>  <b><?php echo e(trans('adminlte_lang::message.fax')); ?>: </b>
                                                    <a href="tel:<?php echo e($agency->fax); ?>"><?php echo e($agency->fax); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- /.tab-pane -->

                                <!-- INSURED TABLE-->
                                <div class="tab-pane" id="insured">
                                    <table id="table-insured" class="table table-bordered table-striped table-design">
                                        <thead>
                                        <tr>
                                            <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.insured_category')); ?></th>
                                            <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
                                            <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.secure_number')); ?></th>
                                            <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.start_date')); ?></th>
                                            <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.end_date')); ?></th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $insureds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insured): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $patient = \App\Patient::where(['secure_card_id'=>$insured->id,'has_secure'=>1])->first(); ?>
                                                <?php $employee = \App\Employee::where(['secure_card_id'=>$insured->id,'has_secure'=>1])->first(); ?>

                                            <?php if(count($patient) != 0 || count($employee) != 0): ?>
                                                <tr>
                                                    <td><?php echo e(count($patient) != 0 ?  trans('adminlte_lang::message.patient')  : trans('adminlte_lang::message.employee')); ?></td>
                                                    <td><?php echo e(count($patient) != 0 ? $patient->name : $employee->name); ?></td>
                                                    <td><?php echo e($insured->secure_number); ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $insured->start_date)->format('d-m-Y')); ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $insured->end_date)->format('d-m-Y')); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(count($patient) != 0 ? route('patients.show',$patient->id) : route('employees.show',$employee->id)); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.show_details')); ?>" data-remote='false'><i class="fa fa-address-card"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">


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