<?php
    $system = \App\System::all()->first();
    \Carbon\Carbon::setLocale($system->lang);
?>
<!-- USERS LIST -->
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-users"></i> <?php echo e(trans('adminlte_lang::message.recent_users')); ?></h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            <?php $__currentLoopData = $recent_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li>
                    <img src="<?php echo e(asset($user->avatar)); ?>" alt="User Image" >
                    <a class="users-list-name" href="<?php echo e($user->employee_id != 0 ? route('employees.show',$user->employee_id) : ''); ?>" data-toggle="tooltip" title="<?php echo e($user->name); ?>"><?php echo e($user->name); ?></a>
                    <span class="users-list-date"><?php echo e(\Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
        <!-- /.users-list -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="<?php echo e(url('users')); ?>" class="uppercase"><?php echo e(trans('adminlte_lang::message.view_all_users')); ?></a>
    </div>
    <!-- /.box-footer -->
</div>
<!--/.box -->