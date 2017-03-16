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
							<h3 class="box-title">Agenda List</h3>
						</div>
						<div class="box-body no-padding">
							<!-- Custom tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">CONSULT TO CONFIRM</a></li>
									<li><a href="#tab_2" data-toggle="tab">CONSULT CANCELED</a></li>
									<li class="pull-right"></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1"  style="position: relative; height: 250px;">

										<?php if(count($agenda) == 0): ?>
											<div class="text-center">
												<img src="<?php echo e(asset('img/no_agenda_regist.png')); ?>" alt="" style="margin: 20px 0;">
												<p>Congratulations! <br>All consult agenda for today is already confirmed.</p>
											</div>

										<?php else: ?>
											<?php echo $__env->make('components.consult_agenda_list',['consult_agenda'=>$agenda,'table_name'=>'table_row_confirm','type'=>'confirm'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										<?php endif; ?>

									</div>
									<!-- /.tab-pane -->
									<div class="tab-pane" id="tab_2"  style="position: relative; height: 250px;">

										<?php if(count($canceled) == 0): ?>
											<div class="text-center">
												<img src="<?php echo e(asset('img/no_agenda_regist.png')); ?>" alt="" style="margin: 20px 0;">
												<p>Congratulations! <br>No Consult Canceled.</p>
											</div>

										<?php else: ?>
											<?php echo $__env->make('components.consult_agenda_list',['consult_agenda'=>$canceled,'table_name'=>'table_row_cancel','type'=>'cancel'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										<?php endif; ?>

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