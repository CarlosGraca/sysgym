<head>
    <meta charset="UTF-8">
    <title> <?php echo e(trans('adminlte_lang::message.app_name')); ?> - <?php echo $__env->yieldContent('htmlheader_title', 'Your title here'); ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- TOKEN -->
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />

    <!-- BOOTSTRAP 3.3.4 PLUGIN -->
    <link href="<?php echo e(asset('/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- FONT AWESOME PLUGIN -->
    <link href="<?php echo e(asset('/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- iONICONS PLUGIN -->
    <link href="<?php echo e(asset('/plugins/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES PLUGIN -->
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/extensions/ColVis/css/dataTables.colVis.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css')); ?>"/>

    <!--<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />-->

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




    <style type="text/css">
      .tabela > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
          padding: 1px 1px 1px 8px;
      }

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


    </style>

</head>
