<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <?php $branch = \App\Branch::where('id',Auth::user()->branch_id)->first(); ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="<?php echo e(url('/')); ?>/<?php echo e(Auth::user()->avatar); ?>" class="img-circle" alt="Cinque Terre" >
                </div>
                <div class="pull-left info">
                    <p>
                        <a class="users-list-name" href="#" data-toggle="tooltip"  data-placement="bottom" title="<?php echo e(Auth::user()->name); ?>" style="max-width:150px;"><?php echo e(Auth::user()->name); ?></a>
                    </p>
                    <!-- Status -->
                    <a href="#">
                        <!--
                            <i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?>

                        -->
                            <?php echo e(trans('adminlte_lang::message.branch')); ?> : <?php echo e($branch != null ? $branch->name : trans('adminlte_lang::message.all_branch')); ?>

                    </a>
                </div>
            </div>
        <?php endif; ?>

        <!-- search form (Optional) --
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.search')); ?>..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> 536621
        -- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('adminlte_lang::message.menu')); ?></li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span><?php echo e(trans('adminlte_lang::message.home')); ?></span></a></li>

            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_client_page')): ?>
                <li><a href="<?php echo e(url('clients')); ?>"><i class='fa fa-user'></i> <span><?php echo e(trans('adminlte_lang::message.clients')); ?></span></a></li>
            <?php endif; ?>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_employee_page')): ?>
            <li><a href="<?php echo e(url('employees')); ?>"><i class='fa fa-user-md'></i> <span><?php echo e(trans('adminlte_lang::message.employees')); ?></span></a></li>
            <?php endif; ?>

            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_modality_page')): ?>
            <li><a href="<?php echo e(url('modalities')); ?>"><i class='fa fa-file-o'></i> <span><?php echo e(trans('adminlte_lang::message.modalities')); ?></span></a></li>
            <?php endif; ?>

            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_matriculation_page')): ?>
            <li><a href="<?php echo e(url('matriculation')); ?>"><i class='fa fa-file-o'></i> <span><?php echo e(trans('adminlte_lang::message.matriculation')); ?></span></a></li>
            <?php endif; ?>

            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_payment_page')): ?>
            <li><a href="<?php echo e(url('payments')); ?>"><i class='fa fa-money'></i> <span><?php echo e(trans('adminlte_lang::message.payments')); ?></span></a></li>
            <?php endif; ?>

            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_setting_page')): ?>
            <li class="treeview">
                <a href="#setting" id="setting"><i class='fa fa-gears'></i> <span><?php echo e(trans('adminlte_lang::message.settings')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_company_page')): ?>
                    <li><a href="<?php echo e(url('company')); ?>"> <i class='fa fa-building'></i> <?php echo e(trans('adminlte_lang::message.company')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_branch_page')): ?>
                    <li><a href="<?php echo e(url('branches')); ?>"> <i class='fa fa-building-o'></i> <?php echo e(trans('adminlte_lang::message.branches')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_employee_category_page')): ?>
                    <li><a href="<?php echo e(url('category')); ?>"> <i class='fa fa-users'></i> <?php echo e(trans('adminlte_lang::message.category')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_users_page')): ?>
                    <li><a href="<?php echo e(url('users')); ?>"> <i class='fa fa-user-secret'></i> <?php echo e(trans('adminlte_lang::message.users')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_roles_page')): ?>
                    <li><a href="<?php echo e(url('roles')); ?>"> <i class='fa fa-key'></i> <?php echo e(trans('adminlte_lang::message.roles')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_permissions_page')): ?>
                    <li><a href="<?php echo e(url('permissions')); ?>"> <i class='fa fa-pagelines'></i> <?php echo e(trans('adminlte_lang::message.permissions')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <li><a href="<?php echo e(url('help')); ?>"><i class='fa fa-question'></i> <span><?php echo e(trans('adminlte_lang::message.help')); ?></span></a></li>
            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('view_system_page')): ?>
            <li><a href="<?php echo e(url('system')); ?>"> <i class='fa fa-wrench'></i> <span><?php echo e(trans('adminlte_lang::message.system')); ?></span></a></li>
            <?php endif; ?>
            <li><a href="#about_system" id="about_system" data-url="<?php echo e(url('about-system')); ?>"><i class='fa fa-info'></i> <span><?php echo e(trans('adminlte_lang::message.about_odontsoft')); ?></span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
