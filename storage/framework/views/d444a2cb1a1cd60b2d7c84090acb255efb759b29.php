<?php $__env->startSection('htmlheader_title'); ?>
	home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	<?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
  Dashboard
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-md-8 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $__env->make('components.tools_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

				<div class="col-lg-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Consult Agenda List</h3>
							<div class="pull-right box-tools">
                                <label for="datepicker" class="add-on"><i class="icon-calendar"></i></label>
                                
							</div>
						</div>
						<div class="box-body no-padding">
							<!-- Custom tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#consult_confirm" data-toggle="tab"><img src="<?php echo e(asset('/img/icon/calendar_scheduled.png')); ?>" alt=""> CONSULT SCHEDULED</a></li>
									<li><a href="#consult_cancel" data-toggle="tab"><i class="fa fa-calendar-times-o"></i> CONSULT CANCELED</a></li>
									<li class="pull-right"></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="consult_confirm"  style="position: relative; height: 250px;">

										<?php echo $__env->make('consult_agenda.confirm_consult_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

									</div>
									<!-- /.tab-pane -->
									<div class="tab-pane" id="consult_cancel"  style="position: relative; height: 250px;">

										<?php echo $__env->make('consult_agenda.cancel_consult_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

									</div>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div>

						</div>
					</div>

				</div>

			</div>


		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $__env->make('dashboard.index',[], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
				<div class="col-lg-12">
					<?php echo $__env->make('users.user_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>