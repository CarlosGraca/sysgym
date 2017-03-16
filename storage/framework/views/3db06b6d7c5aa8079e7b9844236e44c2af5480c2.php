<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
		<?php echo Form::hidden('consult_id', ($type == 'update' ? $consult_type->id : null), ['class'=>'form-control','id'=>'consult_type_id']); ?>

		<?php echo Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

		<span ><strong class="title" style="text-align: left;"><?php echo e(trans('adminlte_lang::message.mouth')); ?></strong></span>
		<hr class="h-divider" >
		<?php echo $__env->make('consult.mouth_object', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<?php echo $__env->make('budget.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!--
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.consult_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('patient',trans('adminlte_lang::message.patient')); ?>

					<?php echo Form::text('patient', ($type == 'update' ? $consult_type->patient : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

					<?php echo Form::email('email', ($type == 'update' ? $patient->email : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

					<?php echo Form::text('mobile', ($type == 'update' ? $patient->mobile : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

					<?php echo Form::text('phone', ($type == 'update' ? $patient->phone : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('has_secure',trans('adminlte_lang::message.has_secure') ); ?>

					<?php echo Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $patient->has_secure : null) , ['class'=>'form-control','id'=>'has_secure']); ?>

				</div>
			</div>
		</div>


		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.procedure_consult')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo e(trans('adminlte_lang::message.procedure_consult')); ?></h3>
							<div class="pull-left box-tools">
								<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_test')); ?>">
									<i class="fa fa-plus"></i>
								</a>
							</div><!-- /. tools --
						</div><!-- /.box-header --

						<div class="box-body">
							<table id="table-consult_procedure" class="table table-bordered table-striped">
								<thead>
								<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
			</div>
		</div>
-->
	</div>
</div>