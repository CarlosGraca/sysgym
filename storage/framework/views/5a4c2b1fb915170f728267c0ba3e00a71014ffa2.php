<?php
    $system = \App\Models\System::where('id',\Auth::user()->branch_id)->first();
   \Carbon\Carbon::setLocale(count($system) > 0 ? $system->lang : 'en'); 
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<?php $__env->startSection('htmlheader'); ?>
    <?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<style>

    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }

    #client-avatar{
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .content-wrapper {
        background: url('<?php echo e(asset( count($system) > 0 ? $system->background_image : 'img/background.jpg' )); ?>') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .layout-boxed {
        background: url('<?php echo e(asset( count($system) > 0 ? $system->background_image : 'img/background.jpg' )); ?>') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }



    .list_image{
        border-radius: 50%;
        max-width: 100%;
        height: auto;
    }

</style>

<body class=" <?php echo e(count($system) > 0 ? $system->theme : 'skin-blue'); ?> sidebar-mini <?php echo e(count($system) > 0 ? $system->layout : 'fixed'); ?>">
<div class="wrapper">

    <?php echo $__env->make('layouts.partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"
         
    >

        <?php echo $__env->make('layouts.partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <?php echo $__env->yieldContent('main-content'); ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php echo $__env->make('layouts.partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.shared.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts.shared.modal_del', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.shared.croppie_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top:50px;">
        <img src="<?php echo e(asset('img/gears.gif')); ?>" />
    </div>

    <!--
    <div style="position:fixed; bottom: 15px; right: 15px;">
        <a href="#" class="btn btn-app"><i class="fa fa-comments"></i></a>
    </div>
    -->
</div><!-- ./wrapper -->

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
