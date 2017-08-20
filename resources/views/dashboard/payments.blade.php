
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="fa fa-money"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.total_payment') }}</span>
                    <span class="info-box-number">{{ $total_p }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green">
                    <i class="fa fa-money"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.amount_received') }}</span>
                    <span class="info-box-number">{{$Defaults->currency($amounts[0]->total_payments)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow">
                    <i class="fa fa-money"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.free') }}</span>
                    <span class="info-box-number">{{$free}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <!-- DONUT CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.amount_per_month') }}</h3>
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
                    <div id="dash-payement-month"></div>
                    <?= $lava->render('ColumnChart', 'AmountMonth', 'dash-payement-month'); ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-4">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.amount_per_modality') }}</h3>
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
                    <div id="dash-modality">
                        <div id="chart">
                        </div>
                        <div id="control">
                        </div>
                    </div>
         
                    <?= $lava->render('Dashboard', 'AmountModality', 'dash-modality'); ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
    </div>