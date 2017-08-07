<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong><?php echo e(trans('adminlte_lang::message.'.$type_people)); ?> </strong><span><?php echo e($people->name); ?></span>
                </h3>
                <div class="pull-right box-tools">
                    <a href="#" class="btn btn-primary btn-sm" data-dismiss="modal"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.close')); ?>">
                        <i class="fa  fa-close"></i> <?php echo e(trans('adminlte_lang::message.close')); ?>

                    </a>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->

            <div class="box-body">
                <?php echo $__env->make('people.show',['people' => $people,'setting'=>['photo'=>true,'contact'=>true,'report'=>false,'work'=>true,'type_people'=> $type_people]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
