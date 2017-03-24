<!-- BAR CHART -->
<div class="box box-success">
  <div class="box-header with-border">
    <i class="fa fa-bar-chart"></i>
    <h3 class="box-title" id='chart-title'><?php echo e(trans('adminlte_lang::message.chart_bar_title')); ?></h3>

    <div class="box-tools">

      <div class="btn-group pull-right">
        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-angle-down"></i></button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#" id='bar'>Bar Graphic</a></li>
          <li><a href="#" id='line'>Line Graphic</a></li>
        </ul>
      </div>

      <button type="button" class="btn btn-primary btn-sm daterange pull-right" style='margin-right:5px;' data-toggle="tooltip" title="Date range">
        <i class="fa fa-calendar"></i>
        <span class="range-date"></span>
      </button>
        <!--
          <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
            <i class="fa fa-minus"></i></button>
        -->

    </div>
  </div>
  <div class="box-body">
    <div class="chart">
        <?php echo $__env->make('dashboard.bar_chart',[], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
  </div>
  <!-- /.box-body -->
  
    
  
</div>
<!-- /.box -->
