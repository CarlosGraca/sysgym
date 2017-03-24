<div class="row">
	<?php echo Form::hidden('branch_id', ($type == 'update' ? $branch->id : null), ['class'=>'form-control','id'=>'branch_id']); ?>

	<span id="last-schedules_id" style="display:none;"><?php echo e($last_schedules != null ? $last_schedules->id : "0"); ?></span>
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
			<hr class="h-divider" >

			<div class="col-md-4 col-sm-6 text-center">
				<img  src="<?php echo e(url('/')); ?>/<?php echo e(($type == 'update' ? $branch->avatar : 'img/avatar.png')); ?>" class="img-circle avatar-branch" alt="Cinque Terre" width="150" height="150">
				<div style="margin-top: 10px">
					<div class="col-xs-12 text-center">
						<div class="form-group" data-type='branch'>
							<?php echo Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]); ?>

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('name',trans('adminlte_lang::message.name')); ?>

					<?php echo Form::text('name', ($type == 'update' ? $branch->name : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-md-8 col-sm-6 col-xs-12">
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
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone')); ?>

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
					<?php echo Form::label('address',trans('adminlte_lang::message.address')); ?>

					<?php echo Form::textArea('address', ($type == 'update' ? $branch->address : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('city',trans('adminlte_lang::message.city') ); ?>

					<?php echo Form::text('city', ($type == 'update' ? $branch->city : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('island',trans('adminlte_lang::message.island') ); ?>

					<?php echo Form::select('island', $island, ($type == 'update' ? $branch->island_id : null) , ['class'=>'form-control','id'=>'island','placeholder'=>' (SELECT ISLAND) ']); ?>

				</div>
			</div>

		</div>


		<!-- WORK TIME -->
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.office_hours')); ?></strong></span>
			<hr class="h-divider" >
			<?php echo Form::hidden('office_hours_id', null, ['class'=>'form-control','id'=>'office_hours_id']); ?>

			<div class="col-md-4 col-sm-10 col-xs-10">
				<div class="form-group form-group-sm">
					<?php echo Form::label('week_day',trans('adminlte_lang::message.week_day') ); ?>

					<?php echo Form::select('week_day', $weeks, ($type == 'update' ? null : null) , ['class'=>'form-control','id'=>'branch_week','placeholder'=>' (SELECT WEEK DAY) ']); ?>

				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('start_time',trans('adminlte_lang::message.start_time') ); ?>

					<?php echo Form::time('start_time', ($type == 'update' ? $branch->start_time : null) , ['class'=>'form-control','step'=>'1']); ?>

				</div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('end_time',trans('adminlte_lang::message.end_time') ); ?>

					<?php echo Form::time('end_time', ($type == 'update' ? $branch->end_time : null) , ['class'=>'form-control','step'=>'1']); ?>

				</div>
			</div>
			<div class="col-md-1 col-sm-1 col-xs-2">
				<div class="form-group form-group-sm">
					<?php echo Form::label('','Add',['style'=>'visibility: hidden;'] ); ?>

					<?php echo Form::button('<i class="fa fa-plus"></i>', ['class'=>'form-control btn btn-primary btn-sm','id'=>'add-office_hours','data-action'=>'create']); ?>


				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-clock-o"></i> <?php echo e(trans('adminlte_lang::message.schedule')); ?></h3>
					</div><!-- /.box-header -->

					<div class="box-body">
						<table id="table-office_hours" class="table table-bordered table-striped">

							<thead>
							<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.week_day')); ?></th>
							<th class="col-md-4"><?php echo e(trans('adminlte_lang::message.start_time')); ?></th>
							<th class="col-md-2"><?php echo e(trans('adminlte_lang::message.end_time')); ?></th>
							<th class="col-md-1 action_button"></th>
							</thead>

							<tbody>
                            <?php if(isset($schedules)): ?>
                                <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr class="office_hours_table" data-key="<?php echo e($schedule->id); ?>"  data-week="<?php echo e($schedule->week_day); ?>">
                                        <td class="week_name" data-value="<?php echo e($schedule->week_day); ?>"><?php echo e(trans('adminlte_lang::message.'.$schedule->week_day)); ?></td>
                                        <td class="start_time" ><?php echo e($schedule->start_time); ?></td>
                                        <td class="end_time" ><?php echo e($schedule->end_time); ?></td>
                                        <td class="action_button">
											<a href="#!copy" class="copy_schedule" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.copy')); ?>"><i class="fa fa-clone"></i></a>
											<a href="#!edit" class="edit_schedule" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="#!remove" class="remove_schedule" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.remove')); ?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		</div>

	</div>	
</div>
