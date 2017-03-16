<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <?php $branch = \App\Branch::where('id',Auth::user()->logged_branch)->first(); ?>
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
        </form>
        -- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo e(trans('adminlte_lang::message.menu')); ?></li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span><?php echo e(trans('adminlte_lang::message.home')); ?></span></a></li>
           <!--<li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-qrcode'></i> <span><?php echo e(trans('adminlte_lang::message.tests')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li><a href="<?php echo e(url('tests')); ?>"><?php echo e(trans('adminlte_lang::message.list_test')); ?></a></li>
                     <li><a href="<?php echo e(url('sheets')); ?>"><span><?php echo e(trans('adminlte_lang::message.evaluation_sheet')); ?></span></a></li>
                </ul>
            </li>-->
            <li><a href="<?php echo e(url('patients')); ?>"><i class='fa fa-user'></i> <span><?php echo e(trans('adminlte_lang::message.patients')); ?></span></a></li>
            <li><a href="<?php echo e(url('employees')); ?>"><i class='fa fa-user-md'></i> <span><?php echo e(trans('adminlte_lang::message.employees')); ?></span></a></li>
            <li><a href="<?php echo e(url('agenda')); ?>"><i class='fa fa-calendar'></i> <span><?php echo e(trans('adminlte_lang::message.agenda')); ?></span></a></li>
            <li><a href="<?php echo e(url('campaign_messages')); ?>"><i class='fa fa-envelope'></i> <span><?php echo e(trans('adminlte_lang::message.campaign_message')); ?></span></a></li>
            <li class="treeview">
                <a href="#setting" id="setting"><i class='fa fa-gears'></i> <span><?php echo e(trans('adminlte_lang::message.settings')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('company')); ?>"> <i class='fa fa-building'></i> <?php echo e(trans('adminlte_lang::message.company')); ?></a></li>
                    <li><a href="<?php echo e(url('branches')); ?>"> <i class='fa fa-building-o'></i> <?php echo e(trans('adminlte_lang::message.branches')); ?></a></li>
                    <li><a href="<?php echo e(url('secure_agency')); ?>"> <i class='fa fa-shield'></i> <?php echo e(trans('adminlte_lang::message.secure_agency')); ?></a></li>
                    <li><a href="<?php echo e(url('secure_comparticipation')); ?>"> <i class='fa fa-shield'></i> <?php echo e(trans('adminlte_lang::message.secure_comparticipation')); ?></a></li>
                    <li><a href="<?php echo e(url('consult_type')); ?>"> <i class='fa fa-stethoscope'></i> <?php echo e(trans('adminlte_lang::message.consult_type')); ?></a></li>
                    <li><a href="<?php echo e(url('users')); ?>"> <i class='fa fa-user-secret'></i> <?php echo e(trans('adminlte_lang::message.users')); ?></a></li>
                    <li><a href="<?php echo e(url('category')); ?>"> <i class='fa fa-users'></i> <?php echo e(trans('adminlte_lang::message.category')); ?></a></li>
                    <li><a href="<?php echo e(url('license')); ?>"> <i class='fa fa-key'></i> <?php echo e(trans('adminlte_lang::message.license')); ?></a></li>
                    <li><a href="<?php echo e(url('system')); ?>"> <i class='fa fa-wrench'></i> <?php echo e(trans('adminlte_lang::message.system')); ?></a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(url('help')); ?>"><i class='fa fa-question'></i> <span><?php echo e(trans('adminlte_lang::message.help')); ?></span></a></li>
            <li><a href="#about_system" id="about_system" url="<?php echo e(url('about_system')); ?>"><i class='fa fa-info'></i> <span><?php echo e(trans('adminlte_lang::message.about_odontsoft')); ?></span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
