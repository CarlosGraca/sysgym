<?php
    $company = \App\Models\Tenant::where('id',\Auth::user()->tenant_id)->first();
    $branch = \App\Models\Branch::where('id',(\Auth::user() ? \Auth::user()->branch_id : 0))->first();
?>
<!-- Main Header -->
<header class="main-header">

<style type="text/css">
    .navbar-nav > .user-menu > .dropdown-menu > .user-body {
    padding: 5px;
    border-bottom: 1px solid #f4f4f4;
    border-top: 1px solid #dddddd;
}
</style>

    <!-- Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="<?php echo e(url('/img/clinic/logo.png')); ?>" class="img-circle" alt="Cinque Terre" style="float: left; width: 30px; height: 30px; margin-right: 10px;  margin-top: -2px;">
                </div>
            </div>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="<?php echo e(url('/img/clinic/logo.png')); ?>" class="img-circle" alt="Cinque Terre"
                          style="float: left; width: 30px; height: 30px; margin-right: 10px;  margin-top: -2px;">
                </div>
                <div class="pull-left info">
                    <b>S</b>ys<b>G</b>ym
                </div>
            </div>


        </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"><?php echo e(trans('adminlte_lang::message.togglenav')); ?></span>
        </a>
        <div class="navbar-custom-menu pull-left">
            <ul class="nav navbar-nav">

            <li class="user user-menu">
                <a href="<?php echo e(url('company')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.company')); ?> - <?php echo e($company->name); ?>">
                    <img  src="<?php echo e(url('/')); ?>/<?php echo e($company->logo); ?>" class="user-image" alt="Cinque Terre" >
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><span class="name_company"><?php echo e($company->company_name); ?></span></span>
                </a>
            </li>
            <li class="user user-menu">
                <a style="margin: 0 -15px;">
                    <span class="hidden-xs"> <span>|</span></span>
                </a>
            </li>
            <li class="user user-menu">
                <a style="cursor: pointer;" data-toggle="tooltip" data-key="<?php echo e(\Auth::user()->branch_id); ?>" class="branch-select" title="<?php echo e(trans('adminlte_lang::message.branch_select_title')); ?>">
                    <span class="hidden-xs"> <span> <i class="fa fa-building"></i> <?php echo e($branch != null ? $branch->name : trans('adminlte_lang::message.all_branch')); ?></span>  <span id="clock"></span></span>
                </a>
            </li>
        </ul>
        </div>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


               

               
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('adminlte_lang::message.login')); ?></a></li>
                <?php else: ?>
                    <!-- NOTIFICATION MENU -->


                    <!-- MESSAGE MENU -->

                    <!-- User Account Menu
                    <li class="dropdown user user-menu">
                        <!- Menu Toggle Button ->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!- The user image in the navbar->
                            <img src='/uploads/<?php echo e(Auth::user()->avatar); ?>' class="user-image" alt="User Image"/>
                            <!- hidden-xs hides the username on small devices so only the image appears. ->
                            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!- The user image in the menu ->
                            <li class="user-header">
                                <img src='/uploads/<?php echo e(Auth::user()->avatar); ?>' class="img-circle" alt="User Image" />
                               <p>
                                    <?php echo e(Auth::user()->name); ?>

                                    <!- <small><?php echo e(trans('adminlte_lang::message.login')); ?> Nov. 2012</small>->
                                </p>
                            </li>
                            <!- Menu Body ->
                            <li class="user-body">
                            <a href="<?php echo e(url('auth/profile')); ?>"><i class="fa fa-user"></i> <?php echo e(trans('adminlte_lang::message.profile')); ?></a>
                                <!-<div class="col-xs-4 text-center">
                                    <a href="#"><?php echo e(trans('adminlte_lang::message.profile')); ?></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?php echo e(trans('adminlte_lang::message.sales')); ?></a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#"><?php echo e(trans('adminlte_lang::message.friends')); ?></a>
                                </div>
                            </li>
                             Menu Footer
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> <?php echo e(trans('adminlte_lang::message.lock')); ?></a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> <?php echo e(trans('adminlte_lang::message.signout')); ?></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                  -->


                <li class="user user-menu">
                  <a href="<?php echo e(url('accounts')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.profile')); ?>">
                    <img  src="<?php echo e(url('/')); ?>/<?php echo e(Auth::user()->avatar); ?>" class="user-image" alt="Cinque Terre" >
                              <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">
                        <span class="users-list-name" style="color: #fff; display: table-cell; max-width: 100px;"><?php echo e(Auth::user()->name); ?></span> | <span> <?php echo e(Auth::user()->role->display_name); ?> </span>
                    </span>
                  </a>
                </li>

                <li>
                    <?php if(\Auth::user()->action_button == 'sign_out'): ?>
                        <a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-sign-out"></i> <?php echo e(trans('adminlte_lang::message.signout')); ?></a>
                    <?php endif; ?>

                    <?php if(\Auth::user()->action_button == 'lock_screen'): ?>
                        <a href="<?php echo e(url('/lockscreen')); ?>"><i class="fa fa-lock"></i> <?php echo e(trans('adminlte_lang::message.lockscreen')); ?></a>
                    <?php endif; ?>
                </li>

                  <?php endif; ?>

                <!-- Control Sidebar Toggle Button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>
