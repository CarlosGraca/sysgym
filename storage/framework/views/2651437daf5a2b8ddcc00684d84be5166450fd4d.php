<div class="row">
    <div class="col-lg-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong><?php echo e(trans('adminlte_lang::message.client')); ?>: </strong><span><?php echo e($client->name); ?></span>
                </h3>
                <div class="pull-right box-tools">
                    <a href="#" class="btn btn-primary btn-sm" data-dismiss="modal" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.close')); ?>">
                        <i class="fa  fa-close"></i>
                    </a>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->

            <div class="box-body">
                <?php echo $__env->make('people.show',['people' =>  $client,'setting'=>['photo'=>true,'contact'=>true,'report'=>false,'work'=>true,'type_people'=>'client']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
