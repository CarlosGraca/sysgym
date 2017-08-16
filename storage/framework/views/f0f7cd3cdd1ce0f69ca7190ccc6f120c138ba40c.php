<div class="row">
	<?php echo Form::hidden('branch_id', ($type == 'update' ? $branch->id : null), ['class'=>'form-control','id'=>'branch_id']); ?>

	<?php echo Form::hidden('item_id', ($type == 'update' ? $branch->id : null), ['class'=>'form-control','id'=>'item_id']); ?>


	<span id="last-schedules_id" style="display:none;"><?php echo e($last_schedules != null ? $last_schedules->id : "0"); ?></span>

    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#personal_information" data-toggle="tab"><i class="fa fa-address-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_information')); ?></a>
				</li>
				<li>
					<a href="#office_hours" data-toggle="tab"><i class="fa fa-clock-o"></i> <?php echo e(trans('adminlte_lang::message.office_hours')); ?></a>
				</li>
			</ul>
			<div class="tab-content">

				<!-- profile -->
				<div class="tab-pane active" id="personal_information">

					<div class="row">
						<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
						<hr class="h-divider" >

						<div class="col-md-3 col-sm-6 text-center">
							<img  src="<?php echo e(asset(($type == 'update' ? $branch->avatar : 'img/round-logo.jpg'))); ?>" class="img-thumbnail avatar-branch" alt="Cinque Terre" width="150" height="150">
							<div style="margin-top: 10px">
								<div class="col-xs-12 text-center">
									<div class="form-group" data-type='branch'>
										<?php echo Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]); ?>

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-9 col-sm-6 col-xs-12">
							<div class="form-group form-group-sm">
								<?php echo Form::label('name','(*) '.trans('adminlte_lang::message.name')); ?>

								<?php echo Form::text('name', ($type == 'update' ? $branch->name : null) , ['class'=>'form-control']); ?>

							</div>
						</div>

						<div class="col-md-9 col-sm-6 col-xs-12">
							<div class="form-group form-group-sm">
								<?php echo Form::label('manager',trans('adminlte_lang::message.manager')); ?>

								<?php echo Form::text('manager', ($type == 'update' ? $branch->manager : null) , ['class'=>'form-control']); ?>

							</div>
						</div>

					</div>
					<div class="row">
						<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
						<hr class="h-divider" >

						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="form-group form-group-sm">
								<?php echo Form::label('email',trans('adminlte_lang::message.email')); ?>

								<?php echo Form::email('email', ($type == 'update' ? $branch->email : null), ['class'=>'form-control']); ?>

							</div>
						</div>

						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="form-group form-group-sm">
								<?php echo Form::label('phone','(*) '.trans('adminlte_lang::message.phone')); ?>

								<?php echo Form::tel('phone', ($type == 'update' ? $branch->phone : null) , ['class'=>'form-control']); ?>

							</div>
						</div>

						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="form-group form-group-sm">
								<?php echo Form::label('fax',trans('adminlte_lang::message.fax')); ?>

								<?php echo Form::text('fax', ($type == 'update' ? $branch->fax : null) , ['class'=>'form-control']); ?>

							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="form-group form-group-sm">
								<?php echo Form::label('address','(*) '.trans('adminlte_lang::message.address')); ?>

								<?php echo Form::textArea('address', ($type == 'update' ? $branch->address : null) , ['class'=>'form-control']); ?>

							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="form-group form-group-sm">
								<?php echo Form::label('city','(*) '.trans('adminlte_lang::message.city') ); ?>

								<?php echo Form::text('city', ($type == 'update' ? $branch->city : null) , ['class'=>'form-control']); ?>

							</div>
						</div>

					</div>

				</div>

				<div class="tab-pane" id="office_hours">
					<!-- WORK TIME -->
					<?php echo $__env->make('schedules.form',['schedules'=>(isset($schedules) ? $schedules : null),'weeks'=>$weeks,'flag'=>1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

			</div>

		</div>

		</div>

</div>
