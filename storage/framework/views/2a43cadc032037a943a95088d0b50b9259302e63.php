<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.patient_profile')); ?> - <?php echo e($patient->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <!-- Main content -->
    <section class="invoice" id="download-content">

        <div class="row no-print">
            <div class="col-xs-12">
                <span style="display: none;" id='id'><?php echo e($patient->id); ?></span>
                <a href="#" id="close-page" onclick="window.close();" class="btn btn-default pull-right"><i class="fa fa-close"></i> Close</a>
                <a href="#" id="print-page" onclick="window.print();" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</a>
                <!--
                    <a href="#" id="btn-download" type='tests' class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-cloud-download"></i> Download</a>
                -->
                <a href="#" id="btn-email" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-envelope"></i> Email</a>
            </div>
        </div>

        <!-- title row -->
        <div class="row" style="margin-top:0;">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style="padding: 10px 0 0 10px; -webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 5px;">
                            <img  src="<?php echo e(asset($company->logo)); ?>" id="logo" alt="Cinque Terre" height="120" class="pull-left">
                    </div>
                </div>

                <!-- PATIENT INFORMATION -->
                <div class="row" style="margin-top:20px;">

                    <div class="col-lg-12 invoice-info">

                        <div class="row" style="margin-top:20px;">
                            <span ><strong class="title"> <i class="fa fa-id-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
                            <hr class="h-divider">
                            <!-- info row -->
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col"  style="width: 20%;">
                                    <img class="thumbnail avatar" src="<?php echo e(asset($patient->avatar)); ?>" style="max-width: 100%; width: 240px; margin: 0 auto; z-index: -1; margin-bottom: 10px;">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 40%;">
                                    <address>
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
                                                <i class="fa fa-circle-o-notch"></i>  <b><?php echo e(trans('adminlte_lang::message.civil_state')); ?>: </b>
                                                <a><?php echo e(trans('adminlte_lang::message.'.$patient->civil_state.'')); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fa fa-birthday-cake"></i>  <b><?php echo e(trans('adminlte_lang::message.birthday')); ?>: </b>
                                                <a><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $patient->birthday)->format('d-m-Y')); ?></a>
                                            </li>
                                        </ul>
                                    </address>
                                </div><!-- /.col -->
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 40%;">
                                    <address>
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
                                    </address>
                                </div><!-- /.col -->
                        </div>

                        <!-- CONTACT INFORMATION -->
                        <div class="row">
                            <span ><strong class="title"> <i class="fa fa-id-card-o"></i> <?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
                            <hr class="h-divider">
                            <!-- info row -->
                            <div class="invoice-info">
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 50%;">
                                    <address>
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
                                    </address>
                                </div><!-- /.col -->
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 50%;">
                                    <address>
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
                                    </address>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>


                        <!-- WORK INFORMATION -->
                        <div class="row">
                            <span ><strong class="title"> <i class="fa fa-briefcase"></i> <?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
                            <hr class="h-divider">
                            <!-- info row -->
                            <div class="invoice-info">
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 50%;">
                                    <address>
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
                                    </address>
                                </div><!-- /.col -->
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 50%;">
                                    <address>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.work_phone')); ?>: </b>
                                                <a> <?php echo e($patient->work_phone); ?> </a>
                                            </li>
                                        </ul>
                                    </address>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>

                    <?php if($patient->has_secure == 1): ?>
                        <!-- SECURE INFORMATION -->
                        <div class="row">
                            <span ><strong class="title"> <i class="fa fa-shield"></i> <?php echo e(trans('adminlte_lang::message.secure_information')); ?></strong></span>
                            <hr class="h-divider">
                            <!-- info row -->
                            <div class="invoice-info">
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 50%;">
                                    <address>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <i class="fa fa-shield"></i>  <b><?php echo e(trans('adminlte_lang::message.secure_agency')); ?>: </b>
                                                <a> <?php echo e($patient->secure_card->secure_agency->name); ?> </a>
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
                                    </address>
                                </div><!-- /.col -->
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-col" style="width: 50%;">
                                    <address>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.start_date')); ?>: </b>
                                                <a> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $patient->secure_card->start_date)->format('d-m-Y')); ?> </a>
                                            </li>
                                            <li class="list-group-item">
                                                <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.end_date')); ?>: </b>
                                                <a> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $patient->secure_card->end_date)->format('d-m-Y')); ?> </a>
                                            </li>

                                        </ul>
                                    </address>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>
                        <?php endif; ?>
                    </div>

                </div>



            </div><!-- /.col -->
        </div>
        <!-- END PATIENT INFORMATION -->

        <!-- FOOTER -->
        <div class="main-footer">
            <!--
            <address style="margin-bottom: 10px; margin-left: 10px" class="text-center pull-left">
                <span><?php echo e($company->name); ?></span><br>
                <b><i class="fa fa-phone" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.phone')); ?>"></i></b> <span><?php echo e($company->phone); ?></span> | <b><i class="fa fa-fax" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.fax')); ?>"></i></b> <span><?php echo e($company->fax); ?></span> <br>
                <b><i class="fa fa-at" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.email')); ?>"></i></b> <span><?php echo e($company->email); ?></span> <br>
                <b><i class="fa fa-address-card" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.nif')); ?>"></i></b> <span><?php echo e($company->nif); ?></span> | <b><i class="fa fa-address-book" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.zip_code')); ?>"></i></b> <span><?php echo e($company->zip_code); ?></span> <br>
                <b><i class="fa fa-map-marker" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.location')); ?>"></i></b> <span><?php echo e($company->address); ?>, <?php echo e($company->city); ?>, <?php echo e($company->island->name); ?></span> <br>
                <b><i class="fa fa-globe" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.website')); ?>"></i></b> <span><?php echo e($company->website); ?></span>
            </address>
            -->
                <span class="pull-left">
                    Copyright &copy; 2016 - OdontSoft - All rights reserved
                </span>

                <span class="pull-right">

                        <?php echo e(\Carbon\Carbon::now()->format('d-m-Y')); ?>


                </span>

        </div>
        <!-- END FOOTER -->

        <!-- PATIENT ODONTOGRAM INFORMATION
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-12">

                <div class="col-lg-12" style="border:1px solid darkgray; -webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;">

                    <div class="row text-center">
                        <h4>Odontograma</h4>
                    </div>

                    <!-- info row --
                    <div class="row invoice-info text-center" style="margin: 5px;">

                        <img src="<?php echo e(asset('img/clinic/odontograma.png')); ?>" alt="">

                    </div><!-- /.row

                </div>
            </div><!-- /.col
        </div>
        <!-- END PATIENT ODONTOGRAM INFORMATION --


-->


    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.report', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>