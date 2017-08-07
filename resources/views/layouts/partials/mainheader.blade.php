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
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="{{ url('/img/clinic/logo.png') }}" class="img-circle" alt="Cinque Terre" style="float: left; width: 30px; height: 30px; margin-right: 10px;  margin-top: -2px;">
                </div>
            </div>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <div class="user-panel">
                <div class="pull-left image">
                    <img  src="{{ url('/img/clinic/logo.png') }}" class="img-circle" alt="Cinque Terre"
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
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <div class="navbar-custom-menu pull-left">
            <ul class="nav navbar-nav">

            <li class="user user-menu">
                <a href="{{ url('company') }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.company') }} - {{ \Auth::user()->tenant->name }}">
                    <img  src="{{ url('/') }}/{{\Auth::user()->tenant->logo}}" class="user-image" alt="Cinque Terre" >
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><span class="name_company">{{ \Auth::user()->tenant->company_name }}</span></span>
                </a>
            </li>
            <li class="user user-menu">
                <a style="margin: 0 -15px;">
                    <span class="hidden-xs"> <span>|</span></span>
                </a>
            </li>
            <li class="user user-menu">
                <a style="cursor: pointer;" data-toggle="tooltip" data-key="{{ \Auth::user()->branch_id }}" class="branch-select" title="{{ trans('adminlte_lang::message.branch_select_title') }}">
                    <span class="hidden-xs"> <span> <i class="fa fa-building"></i> {{ \Auth::user()->branch_id != 0 ? \Auth::user()->branch->name : trans('adminlte_lang::message.all_branch') }}</span>  <span id="clock"></span></span>
                </a>
            </li>
        </ul>
        </div>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


               {{--  <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 0 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li> --}}

               {{--  <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 0 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li> --}}
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- NOTIFICATION MENU -->


                    <!-- MESSAGE MENU -->

                    <!-- User Account Menu
                    <li class="dropdown user user-menu">
                        <!- Menu Toggle Button ->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!- The user image in the navbar->
                            <img src='/uploads/{{Auth::user()->avatar}}' class="user-image" alt="User Image"/>
                            <!- hidden-xs hides the username on small devices so only the image appears. ->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!- The user image in the menu ->
                            <li class="user-header">
                                <img src='/uploads/{{Auth::user()->avatar}}' class="img-circle" alt="User Image" />
                               <p>
                                    {{ Auth::user()->name }}
                                    <!- <small>{{ trans('adminlte_lang::message.login') }} Nov. 2012</small>->
                                </p>
                            </li>
                            <!- Menu Body ->
                            <li class="user-body">
                            <a href="{{ url('auth/profile') }}"><i class="fa fa-user"></i> {{ trans('adminlte_lang::message.profile') }}</a>
                                <!-<div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                                </div>
                            </li>
                             Menu Footer
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> {{ trans('adminlte_lang::message.lock') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> {{ trans('adminlte_lang::message.signout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                  -->


                <li class="user user-menu">
                  <a href="{{ url('accounts') }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.profile') }}">
                    <img  src="{{ url('/') }}/{{Auth::user()->avatar}}" class="user-image" alt="Cinque Terre" >
                              <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">
                        <span class="users-list-name" style="color: #fff; display: table-cell; max-width: 100px;">{{ Auth::user()->name }}</span> | <span> {{  Auth::user()->role->display_name }} </span>
                    </span>
                  </a>
                </li>

                <li>
                    @if(\Auth::user()->action_button == 'sign_out')
                        <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('adminlte_lang::message.signout') }}</a>
                    @endif

                    @if(\Auth::user()->action_button == 'lock_screen')
                        <a href="{{ url('/lockscreen') }}"><i class="fa fa-lock"></i> {{ trans('adminlte_lang::message.lockscreen') }}</a>
                    @endif
                </li>

                  @endif

                <!-- Control Sidebar Toggle Button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>
        </div>
    </nav>
</header>
