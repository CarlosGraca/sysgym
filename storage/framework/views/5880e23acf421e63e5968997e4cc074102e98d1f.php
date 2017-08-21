<div class="row">

   <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.total_client')); ?></span>
                <span class="info-box-number"><?php echo e($total_a + $total_i); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.clients_active')); ?></span>
                <span class="info-box-number"><?php echo e($total_a); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans('adminlte_lang::message.clients_inactive')); ?></span>
                <span class="info-box-number"><?php echo e($total_i); ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<div class="row">
        <div class="col-md-8">
            <!-- DONUT CHART -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.client_per_date')); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="dash-client-date"></div>
                    <?= $lava->render('ColumnChart', 'ClientPerDate', 'dash-client-date'); ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-4">
            <!-- BAR CHART -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.client_per_modality')); ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">     
                    <div id="dash-client">
                        <div id="chart">
                        </div>
                        <div id="control">
                        </div>
                    </div>
         
                    <?= $lava->render('PieChart', 'ClientModality', 'dash-client'); ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
    </div>