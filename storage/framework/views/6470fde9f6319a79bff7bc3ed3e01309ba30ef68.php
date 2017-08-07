<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.setup_system')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <!-- BEGIN VALIDATION FORM WIZARD -->
    <div class="row" style="margin-top: 10px; ">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span> <i class="fa fa-gears"></i> <?php echo e(trans('adminlte_lang::message.setup_system')); ?></span>
                    </h3>
                </div>
                <div class="box-body">
                    <div id="setup_wizard" class="form-wizard form-wizard-horizontal">
                            <div class="form-wizard-nav">
                                <div class="progress active">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped"></div>
                                </div>
                                <ul class="nav nav-justified nav-tabs-custom" id="nav-tab">
                                    <li class="active" data-key="1"><a href="#step1" data-toggle="tab"><span class="step"><i class="fa fa-building"></i></span> <span class="title"><?php echo e(trans('adminlte_lang::message.company')); ?></span></a></li>
                                    <li data-key="2"><a href="#step2" data-toggle="tab"><span class="step"><i class="fa fa-user-secret"></i></span> <span class="title"><?php echo e(trans('adminlte_lang::message.user')); ?></span></a></li>
                                    <li data-key="3"><a href="#step3" data-toggle="tab"><span class="step"><i class="fa fa-wrench"></i></span> <span class="title"><?php echo e(trans('adminlte_lang::message.system')); ?></span></a></li>
                                </ul>
                            </div><!--end .form-wizard-nav -->
                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="step1">
                                    <div class="col-lg-12">
                                    <br/><br/>
                                        
                                            
                                        
                                    </div>
                                </div><!--end #step1 -->
                                <div class="tab-pane" id="step2">
                                    <div class="col-lg-12">
                                        <br/><br/>
                                        
                                            
                                        
                                    </div>
                                </div><!--end #step2 -->
                                <div class="tab-pane" id="step3">
                                    <div class="col-lg-12">
                                        <br/><br/>
                                        
                                            
                                        
                                    </div>
                                </div><!--end #step3 -->
                                <div class="col-lg-12">
                                    <ul class="pager wizard">
                                        <li class="previous"><a class="btn-raised" href="javascript:void(0);"><i class="fa fa-arrow-left"></i> Previous</a></li>
                                        <li class="next"><a class="btn-raised" href="javascript:void(0);">Next <i class="fa fa-arrow-right"></i></a></li>
                                        <li class="pull-right submit" style="display: none;"><a class="btn-raised" href="javascript:void(0);" id="send">Submit <i class="fa fa-send"></i></a></li>
                                    </ul>
                                </div>
                        </div>

                    </div><!--end #rootwizard -->
                </div>



                    <div class="box-footer">
                        <span>
                            &copy <?php echo e(date('Y')); ?> - <a href="<?php echo e(url('/')); ?>"><?php echo e(config('app.name')); ?></a> - <?php echo e(trans('adminlte_lang::message.copyright')); ?>

                        </span>
                        <span class="pull-right hidden-xs">
                            <?php echo e(trans('adminlte_lang::message.version')); ?>:  <?php echo e(config('app.version')); ?>

                        </span>
                    </div>
            </div><!--end .col -->
        </div>
    </div><!--end .row -->
    <!-- END VALIDATION FORM WIZARD -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>