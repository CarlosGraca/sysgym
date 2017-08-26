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
    <a href="<?php echo e(url('/home')); ?>" class="logo hidden-xs">
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
                <a href="<?php echo e(url('company')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.company')); ?> - <?php echo e(\Auth::user()->tenant->name); ?>">
                    <img  src="<?php echo e(url('/')); ?>/<?php echo e(\Auth::user()->tenant->logo); ?>" class="user-image" alt="Cinque Terre" >
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span ><span class="name_company"><?php echo e(\Auth::user()->tenant->company_name); ?></span></span>
                </a>
            </li>
            <li class="user user-menu">
                <a style="margin: 0 -15px;">
                    <span class="hidden-xs"> <span>|</span></span>
                </a>
            </li>
            <li class="user user-menu">
                <a style="cursor: pointer;" data-toggle="tooltip" data-key="<?php echo e(\Auth::user()->branch_id); ?>" <?php if(count(\auth::user()->branch_permission) > 1): ?> class="branch-select" <?php endif; ?> title="<?php echo e(trans('adminlte_lang::message.branch_select_title')); ?>">
                    <span class="hidden-xs"> 
                        
                        <span id="clock"></span>
                    </span>
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

                        <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo e(url('/')); ?>/<?php echo e(Auth::user()->avatar); ?>" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                          <span class="hidden-xs">
                                <span class="users-list-name" style="color: #fff; display: table-cell; max-width: 100px;"><?php echo e(Auth::user()->name); ?></span> 
                                </span>
                            </span> 
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo e(url('/')); ?>/<?php echo e(Auth::user()->avatar); ?>" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo e(Auth::user()->name); ?>

                                    <small><?php echo e(Auth::user()->role->display_name); ?> </small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <a href="<?php echo e(url('accounts')); ?>"><i class="fa fa-user"></i><?php echo e(trans('adminlte_lang::message.profile_settings')); ?></a>
                                
                                <a href="<?php echo e(url('/login-activity')); ?>"><i class="fa fa-btn fa-list"></i>Login Activity</a>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(url('/lockscreen')); ?>">
                                    <i class="fa fa-lock"></i> <?php echo e(trans('adminlte_lang::message.lockscreen')); ?></a>
                                </div>
                                <div class="pull-right">

                                    <a href="<?php echo e(url('/logout')); ?>" 
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> <?php echo e(trans('adminlte_lang::message.signout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                  
                

            </ul>
        </div>
    </nav>
</header>
