<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.patient')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('patients')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">

        <?php if($patient->status == 0): ?>
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissible" role="info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><i class="fa fa-info-circle"></i></strong> <?php echo e(trans('adminlte_lang::message.msg_disabled_patient')); ?>

                </div>
            </div>

        <?php endif; ?>

        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="<?php echo e(asset($patient->avatar)); ?>" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center"><?php echo e($patient->name); ?></h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.patient_profile')); ?></h3>
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(url('patients')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.patients_list')); ?>">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="<?php echo e(url('patients')); ?>/<?php echo e($patient->id); ?>/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.print')); ?>">
                            <i class="fa fa-print"></i>
                        </a>
                        <?php if($patient->status == 1): ?>
                            <a href="<?php echo e(route('patients.edit',$patient->id)); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"> <i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_data')); ?></a></li>
                                <li><a href="#documents" data-toggle="tab"><i class="fa fa-folder-open-o"></i> <?php echo e(trans('adminlte_lang::message.documents')); ?></a></li>
                                <li><a href="#agenda" data-toggle="tab"><i class="fa fa-calendar"></i> <?php echo e(trans('adminlte_lang::message.agenda')); ?></a></li>
                                <li><a href="#consult" data-toggle="tab"><i class="fa fa-heartbeat"></i> <?php echo e(trans('adminlte_lang::message.consult')); ?></a></li>
                                <li><a href="#odontograma" data-toggle="tab"><img src="<?php echo e(asset('/img/icon/odontograma_teeth.png')); ?>" > <?php echo e(trans('adminlte_lang::message.odontograma')); ?></a></li>
                                <li><a href="#budget" data-toggle="tab"><img src="<?php echo e(asset('/img/icon/budget-calculator-20.png')); ?>" width="14"> <?php echo e(trans('adminlte_lang::message.budget')); ?></a></li>
                                <li><a href="#payments" data-toggle="tab"><img src="<?php echo e(asset('/img/icon/credit-card-swipe-20.png')); ?>" width="14"> <?php echo e(trans('adminlte_lang::message.payments')); ?></a></li>
                                
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
                                                    <a> <?php echo e($patient->name); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-venus-mars"></i>  <b><?php echo e(trans('adminlte_lang::message.genre')); ?>: </b>
                                                    <a> <?php echo e(trans('adminlte_lang::message.'.$patient->genre)); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-heart"></i>  <b><?php echo e(trans('adminlte_lang::message.civil_state')); ?>: </b>
                                                    <a><?php echo e(trans('adminlte_lang::message.'.$patient->civil_state.'')); ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-birthday-cake"></i>  <b><?php echo e(trans('adminlte_lang::message.birthday')); ?>: </b>
                                                    <a><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $patient->birthday)->format('d-m-Y')); ?></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b><?php echo e(trans('adminlte_lang::message.nationality')); ?>: </b>
                                                    <a> <?php echo e($patient->nationality); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b><?php echo e(trans('adminlte_lang::message.bi')); ?>: </b>
                                                    <a> <?php echo e($patient->bi); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b><?php echo e(trans('adminlte_lang::message.nif')); ?>: </b>
                                                    <a><?php echo e($patient->nif); ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-users"></i>  <b><?php echo e(trans('adminlte_lang::message.parents')); ?>: </b>
                                                    <a><?php echo e($patient->parents); ?></a>
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
                                                    <a> <?php echo e($patient->address); ?>, <?php echo e($patient->city); ?>, <?php echo e($patient->island->name); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b><?php echo e(trans('adminlte_lang::message.email')); ?>: </b>
                                                    <a> <?php echo e($patient->email); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.phone')); ?>: </b>
                                                    <a><?php echo e($patient->phone); ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-mobile"></i>  <b><?php echo e(trans('adminlte_lang::message.mobile')); ?>: </b>
                                                    <a><?php echo e($patient->mobile); ?></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b><?php echo e(trans('adminlte_lang::message.zip_code')); ?>: </b>
                                                    <a> <?php echo e($patient->zip_code); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-globe"></i>  <b><?php echo e(trans('adminlte_lang::message.website')); ?>: </b>
                                                    <a> <?php echo e($patient->website); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-facebook-official"></i>  <b><?php echo e(trans('adminlte_lang::message.facebook')); ?>: </b>
                                                    <a><?php echo e($patient->facebook); ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-shield"></i>  <b><?php echo e(trans('adminlte_lang::message.has_secure')); ?>: </b>
                                                    <a><?php echo e($patient->has_secure == 1 ? trans('adminlte_lang::message.yes') : trans('adminlte_lang::message.not')); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- WORK INFORMATION -->
                                    <div class="row">
                                        <span ><strong class="title"> <i class="fa fa-briefcase"></i> <?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-map-marker"></i>  <b><?php echo e(trans('adminlte_lang::message.address')); ?>: </b>
                                                    <a> <?php echo e($patient->work_address); ?> </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b><?php echo e(trans('adminlte_lang::message.profession')); ?>: </b>
                                                    <a> <?php echo e($patient->profession); ?> </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.work_phone')); ?>: </b>
                                                    <a> <?php echo e($patient->work_phone); ?> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                <?php if($patient->has_secure == 1): ?>
                                    <!-- SECURE INFORMATION -->
                                        <div class="row">
                                            <span ><strong class="title"> <i class="fa fa-shield"></i> <?php echo e(trans('adminlte_lang::message.secure_information')); ?></strong></span>
                                            <hr class="h-divider" >
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <i class="fa fa-shield"></i>  <b><?php echo e(trans('adminlte_lang::message.secure_agency')); ?>: </b>
                                                        <a href="<?php echo e(route('secure_agency.show',$patient->secure_card->secure_agency->id)); ?>"> <?php echo e($patient->secure_card->secure_agency->name); ?> </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa fa-id-card-o"></i>  <b><?php echo e(trans('adminlte_lang::message.secure_number')); ?>: </b>
                                                        <a> <?php echo e($patient->secure_card->secure_number); ?> </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa fa-quote-left"></i>  <b><?php echo e(trans('adminlte_lang::message.note')); ?>: </b>
                                                        <a> <?php echo e($patient->secure_card->note); ?> </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.start_date')); ?>: </b>
                                                        <a> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $patient->secure_card->start_date)->format('d/m/Y')); ?> </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.end_date')); ?>: </b>
                                                        <a> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $patient->secure_card->end_date)->format('d/m/Y')); ?> </a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                
                                </div>
                                <!-- /.tab-pane -->

                                <!-- DOCUMENTS TABLE-->
                                <div class="tab-pane" id="documents">

                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>

                                    <?php echo Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]); ?>

                                        <?php echo Form::hidden('item_id', $patient->id, ['class'=>'form-control','id'=>'item_id']); ?>

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

                                <?php
                                    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.scheduled'),trans('adminlte_lang::message.confirmed'),trans('adminlte_lang::message.expired')];
                                    $status_color = ['danger','info','success','default'];
                                ?>

                                <!-- AGENDA OF CONSULT -->
                                <div class="tab-pane" id="agenda">
                                    <table id="table-consult_agenda" class="table table-bordered table-striped table-design">

                                        <thead>
                                            <tr>
                                                <th class="col-md-2"  align="center"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                                                <th class="col-md-2"  align="center"><?php echo e(trans('adminlte_lang::message.time')); ?></th>
                                                <th class="col-md-2"  align="center"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
                                                
                                                
                                                <th class="col-md-3"  align="center"><?php echo e(trans('adminlte_lang::message.doctor')); ?></th>
                                                <th class="col-md-2"  align="center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
                                                <th class="col-md-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $consult_agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td  align="center"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $agenda->date )->format('d/m/Y')); ?></td>
                                                <td><?php echo e($agenda->start_time); ?> - <?php echo e($agenda->end_time); ?></td>
                                                <td><?php echo e($agenda->consult_type->name); ?></td>
                                                
                                                
                                                <td><?php echo e($agenda->doctor->name); ?></td>
                                                <td  align="center"> <span class="label label-<?php echo e($status_color[$agenda->status]); ?>"> <?php echo e($status[$agenda->status]); ?></span> </td>

                                                <td align="center">
                                                    <a href="#!view" data-url="<?php echo e(route('consult_agenda.show',$agenda->id)); ?>" data-toggle="tooltip"  data-title="<?php echo e(trans('adminlte_lang::message.details_consult_agenda')); ?>" data-placement="left" class="show-agenda-modal" title="<?php echo e(trans('adminlte_lang::message.view')); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    
                                                        
                                                            
                                                        

                                                        
                                                            
                                                        

                                                        
                                                            
                                                        

                                                    
                                                        
                                                            
                                                        
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                
                                <div class="tab-pane" id="consult">

                                    <table id="table-consult" class="table table-bordered table-striped table-design">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.doctor')); ?></th>
                                            <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.discount')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.value_exec')); ?></th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.tab-pane -->

                                
                                <div class="tab-pane" id="odontograma">

                                    
                                        
                                            

                                            
                                                
                                                
                                            
                                            
                                        
                                        <!-- /.box-header -->
                                        <div class="box-body text-center" style="display: block;">
                                            <img src="<?php echo e(asset('/img/clinic/odontograma.png')); ?>" alt="">
                                        </div>
                                        <!-- /.box-body -->
                                    
                                </div>
                                <!-- /.tab-pane -->

                                
                                <div class="tab-pane" id="budget">
                                    <table id="table-budget" class="table table-bordered table-striped table-design">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                                            <th class="col-md-5" style="text-align: center"><?php echo e(trans('adminlte_lang::message.creator')); ?></th>
                                            <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.status')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?></th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                
                                <div class="tab-pane" id="payments">

                                    <table id="table-payment" class="table table-bordered table-striped table-design">
                                        <thead>
                                        <tr>
                                            <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.date')); ?></th>
                                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.branch')); ?></th>
                                            <th class="col-md-2" style="text-align: center"><?php echo e(trans('adminlte_lang::message.payment_method')); ?></th>
                                            <th class="col-md-3" style="text-align: center"><?php echo e(trans('adminlte_lang::message.note')); ?></th>
                                            <th class="col-md-1" style="text-align: center"><?php echo e(trans('adminlte_lang::message.value')); ?></th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

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