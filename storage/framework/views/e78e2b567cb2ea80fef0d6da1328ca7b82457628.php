<div class="row">
    <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.schedule')); ?></strong></span>
    <hr class="h-divider" >
    <?php echo Form::hidden('office_hours_id', null, ['class'=>'form-control','id'=>'office_hours_id']); ?>

    <?php echo Form::hidden('flag', 1, ['class'=>'form-control','id'=>'flag']); ?>

    <span id="last-schedules_id" style="display:none;"><?php echo e($last_schedules != null ? $last_schedules->id : "0"); ?></span>
    <div class="col-md-4 col-sm-10 col-xs-10">
        <div class="form-group form-group-sm">
            <?php echo Form::label('week_day',trans('adminlte_lang::message.week_day') ); ?>

            <?php echo Form::select('week_day', $weeks, null , ['class'=>'form-control','id'=>'branch_week','placeholder'=>' (SELECT WEEK DAY) ']); ?>

        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('start_time',trans('adminlte_lang::message.start_time') ); ?>

            <?php echo Form::time('start_time', null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('end_time',trans('adminlte_lang::message.end_time') ); ?>

            <?php echo Form::time('end_time', null , ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-1 col-sm-1 col-xs-2">
        <div class="form-group form-group-sm">
            <?php echo Form::label('','Add',['style'=>'visibility: hidden;'] ); ?>

            <?php echo Form::button('<i class="fa fa-plus"></i>', ['class'=>'form-control btn btn-primary btn-sm','id'=>'add-office_hours','data-action'=>'create']); ?>

        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-clock-o"></i> <?php echo e(trans('adminlte_lang::message.schedule')); ?></h3>
            </div><!-- /.box-header -->

            <div class="box-body">
                <table id="table-office_hours" class="table table-bordered table-striped">

                    <thead>
                    <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.week_day')); ?></th>
                    <th class="col-md-4"><?php echo e(trans('adminlte_lang::message.start_time')); ?></th>
                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.end_time')); ?></th>
                    <th class="col-md-1 action_button"></th>
                    </thead>

                    <tbody>
                    <?php if(isset($schedules)): ?>
                        <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr class="office_hours_table" data-key="<?php echo e($schedule->id); ?>"  data-week="<?php echo e($schedule->week_day); ?>">
                                <td class="week_name" data-value="<?php echo e($schedule->week_day); ?>"><?php echo e(trans('adminlte_lang::message.'.$schedule->week_day)); ?></td>
                                <td class="start_time" ><?php echo e($schedule->start_time); ?></td>
                                <td class="end_time" ><?php echo e($schedule->end_time); ?></td>
                                <td class="action_button">
                                    <a href="#!copy" class="copy_schedule" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.copy')); ?>"><i class="fa fa-clone"></i></a>
                                    <a href="#!edit" class="edit_schedule" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#!remove" class="remove_schedule" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.remove')); ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>