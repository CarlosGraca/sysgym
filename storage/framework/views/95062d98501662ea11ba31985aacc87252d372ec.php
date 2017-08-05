<div class="row">
	<?php echo Form::hidden('status', 1, ['class'=>'form-control','id'=>'status']); ?>

	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;"><?php echo e(trans('adminlte_lang::message.background_image')); ?></strong></span>
		<hr class="h-divider" >
    	<?php if(isset($system)): ?>
            <?php if(($system->background_image)): ?>
                <img  src="<?php echo e(asset($system->background_image)); ?>" class="img-thumbnail avatar-system" alt="Cinque Terre" width="300" height="150">
            <?php else: ?>
                <img  src="<?php echo e(asset('/img/photo1.png')); ?>" class="img-thumbnail avatar-system" alt="Cinque Terre" width="300" height="150">
            <?php endif; ?>
        <?php else: ?>
            <img  src="<?php echo e(asset('/img/photo1.png')); ?>" class="img-thumbnail avatar-system" alt="Cinque Terre" width="300" style="padding: 25px auto; max-height: 225px; max-width: 300px; width: auto; height: auto;">
        <?php endif; ?>

        <div class="form-group" style="margin-top: 10px;" data-type='system'>
            <?php echo e(Form::file('background_image', null, ['class' =>  'filestyle upload_image', 'data-input'=>'false', 'data-buttonText'=>'Select Image'])); ?>

        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('name',trans('adminlte_lang::message.application_name')); ?>

					<?php echo Form::text('name', ($type == 'update' ? $system->name : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>


			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('theme',trans('adminlte_lang::message.theme') ); ?>

					<?php echo Form::select('theme', $theme,($type == 'update' ? $system->theme : 0), ['class'=>'form-control','placeholder' => ' (SELECT THEME / SKIN) ','id'=>'theme']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('lang',trans('adminlte_lang::message.lang') ); ?>

					<?php echo Form::select('lang', $lang,($type == 'update' ? $system->lang : 0), ['class'=>'form-control','placeholder' => ' (SELECT LANGUAGE) ','id'=>'lang']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('currency',trans('adminlte_lang::message.currency') ); ?>

					<?php echo Form::select('currency', $currency,($type == 'update' ? $system->currency : 0), ['class'=>'form-control','placeholder' => ' (SELECT MONEY CURRENCY) ','id'=>'currency']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('layout',trans('adminlte_lang::message.layout') ); ?>

					<?php echo Form::select('layout', $layout,($type == 'update' ? $system->layout : 0), ['class'=>'form-control','placeholder' => ' (SELECT LAYOUT) ','id'=>'layout']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('timezone',trans('adminlte_lang::message.timezone') ); ?>

                    <?php echo Form::select('timezone', $timezone,($type == 'update' ? $system->timezone : 0), ['class'=>'form-control','placeholder' =>trans('adminlte_lang::message.timezone_empty'),'id'=>'timezone']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('iva',trans('adminlte_lang::message.iva')); ?>

					<?php echo Form::number('iva', ($type == 'update' ? $system->iva : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

		</div>
	</div>	
</div>