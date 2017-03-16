<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.license_generator')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
    <?php echo e(trans('adminlte_lang::message.license_generator')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?php echo e(trans('adminlte_lang::message.license_generator')); ?>

                    </h3>
                    <div class="pull-right box-tools">
                        <a href="#"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save">
                            <i class="fa fa-save"></i>
                        </a>
                    </div><!-- /. tools -->

                    <div class="pull-right box-tools">
                        <a href="<?php echo e(\Illuminate\Support\Facades\URL::previous()); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.back')); ?>">
                            <i class="fa  fa-arrow-left"></i>
                        </a>

                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.generate')); ?>" id="generate-license">
                            <i class="fa fa-gears"></i>
                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <?php echo Form::open(['route'=>'license_generate.store', 'id'=>'license-generator-form','files'=>true]); ?>

                    <div class="row">
                        <?php echo Form::hidden('license_id', null, ['class'=>'form-control','id'=>'license_id']); ?>

                        <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.information')); ?></strong></span>
                        <hr class="h-divider" >
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group form-group-sm">
                                <?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

                                <?php echo Form::text('name', null , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group form-group-sm">
                                <?php echo Form::label('email',trans('adminlte_lang::message.email')); ?>

                                <?php echo Form::email('email', null , ['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group form-group-sm">
                                <?php echo Form::label('duration',trans('adminlte_lang::message.duration') ); ?>

                                <?php echo Form::number('duration',null , ['class'=>'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group form-group-sm">
                                <?php echo Form::label('time',trans('adminlte_lang::message.time')); ?>

                                <?php echo Form::select('time', [ 'day' => trans('adminlte_lang::message.day'),'month'=>trans('adminlte_lang::message.month'),'year'=>trans('adminlte_lang::message.year')],null, ['class'=>'form-control','placeholder' => ' (SELECT TIME) ']); ?>

                            </div>
                        </div>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>