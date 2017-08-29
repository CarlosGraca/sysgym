dathead>
    <meta charset="UTF-8">
    <title> <?php echo e(trans('adminlte_lang::message.app_name')); ?> - <?php echo $__env->yieldContent('htmlheader_title', 'Your title here'); ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="apple-touch-icon" sizes="57x57" href="/img/logo/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/logo/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/logo/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/logo/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/logo/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/logo/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/logo/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/logo/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/logo/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/logo/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/logo/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logo/favicon-16x16.png">
    <link rel="manifest" href="/img/logo/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/logo/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- TOKEN -->
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />

    <!-- BOOTSTRAP 3.3.4 PLUGIN -->
    <link href="<?php echo e(asset('/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- FONT AWESOME PLUGIN -->
    <link href="<?php echo e(asset('/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- iONICONS PLUGIN -->
    <link href="<?php echo e(asset('/plugins/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/colorbox.css')); ?>">

    <!-- DATA TABLES PLUGIN -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.css')); ?>"/> -->
  
    <!-- <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/extensions/ColVis/css/dataTables.colVis.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css')); ?>"/> -->

    <link href="/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/extensions/responsive/css/dataTables.responsive.css')); ?>"/> 


    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">

    <!-- SELECT2 PLUGIN -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/select2/select2.min.css')); ?>">

    <!-- Theme style -->
    <link href="<?php echo e(asset('/css/AdminLTE.css')); ?>" rel="stylesheet" type="text/css" />



    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo e(asset('/css/skins/_all-skins.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- iCHECK PLUGIN -->
    <link href="<?php echo e(asset('/plugins/iCheck/square/blue.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- JQUERY UI PLUGIN -->
    <link href="  <?php echo e(asset('/plugins/jQueryUI/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- TOASTR PLUGIN -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/toastr/toastr.css')); ?>" type="text/css" />

    <!-- DATA RANGE PIRCKER PLUGIN -->
    <link href="<?php echo e(asset('/plugins/daterangepicker/daterangepicker-bs3.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- FULL CALENDAR PLUGIN -->
    <link href="<?php echo e(asset('/plugins/fullcalendar/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/plugins/fullcalendar/fullcalendar.print.css')); ?>" rel="stylesheet" type="text/css" media="print"/>

    <!-- JQUERY CONTEXT MENU PLUGIN -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/jquery-contextmenu/dist/jquery.contextMenu.min.css')); ?>" type="text/css" />


    <!-- DEVELOPMENT STYLE SHEETS -->
    <link href="<?php echo e(asset('/css/search.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/css/default.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <?php echo $__env->yieldContent('invoice',null); ?>

    <style type="text/css">
      /*.tabela > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
          padding: 1px 1px 1px 8px;
      }*/

      .h-divider{
          margin-top:5px;
          margin-bottom:5px;
          height: 1px;
          border-top:3px solid #3C8DBC;
          size: 30px;
          margin-left: 15px;
          margin-right: 15px;
      }
      .title{
          padding-top: 15px;
          margin-left: 15px;
          text-transform: uppercase;
      }
        .error{
            color: #f44336;
            opacity: 1;
            font-size: 11px;
        }

        .avatar{
            border: 2px solid #e4e4e4;
        }
        

        @media (max-width: 767px) {
            .fixed .content-wrapper, .fixed .right-side {
                padding-top: 30px;
            }
        }

        @media (max-width: 767px){
            .main-sidebar, .left-side {
                padding-top: 45px;
            }
        }

        .fixed .content-wrapper, .fixed .right-side {
            padding-top: 28px;
        }

        .navbar-nav > .user-menu > .dropdown-menu > .user-footer {
            background-color: #3c8dbc;
            padding: 10px;
            
        }

        .navbar-nav > .user-menu > .dropdown-menu > .user-footer a{
            color: #ffffff;
        }
    </style>



</head>
