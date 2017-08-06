<div class="row">	
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center">
		<span ><strong class="title" style="text-align: left;"><?php echo e(trans('adminlte_lang::message.company_logo')); ?></strong></span>
		<hr class="h-divider" >
		<?php if(isset($company)): ?>
	       <?php if(($company->logo)): ?>
		    	<img  src="/<?php echo e($company->logo); ?>" class="img-thumbnail avatar-company" alt="Cinque Terre" width="300" height="150">
		    	<?php echo Form::hidden('logo', $company->logo , ['class'=>'form-control']); ?>

		    <?php else: ?>
		    	<img  src="/img/round-logo.jpg" class="img-thumbnail avatar-company" alt="Cinque Terre" width="300" height="150">
	        <?php endif; ?>
	    <?php else: ?>
		   <img  src="<?php echo e(asset('/img/round-logo.jpg')); ?>" class="img-thumbnail avatar-company" alt="Cinque Terre" width="300" style="padding: 25px auto; max-height: 225px; max-width: 250px; width: auto; height: auto;">
	    <?php endif; ?>
	    <div class="form-group" style="margin-top: 10px;" data-type='company'>
            <?php echo e(Form::file('logo', null, ['class' =>  'filestyle upload_image', 'data-input'=>'false', 'data-buttonText'=>'Select Image'])); ?>

        </div>
    </div>
    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('name','(*)'.trans('adminlte_lang::message.company_name')); ?>

					<?php echo Form::text('name', ($type == 'update' ? $company->company_name : null) , ['class'=>'form-control','required'=>'true']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('nif','(*)'.trans('adminlte_lang::message.nif')); ?>

					<?php echo Form::number('nif', ($type == 'update' ? $company->nif : null) , ['class'=>'form-control','required'=>'true']); ?>

				</div>
			</div>

		</div>
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
			<hr class="h-divider" >

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('country',trans('adminlte_lang::message.country')); ?>

					<?php echo Form::email('country', ($type == 'update' ? $company->country : null), ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('state',trans('adminlte_lang::message.state')); ?>

					<?php echo Form::email('state', ($type == 'update' ? $company->state : null), ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone','(*)'.trans('adminlte_lang::message.phone')); ?>

					<?php echo Form::tel('phone', ($type == 'update' ? $company->phone : null) , ['class'=>'form-control','required'=>'true']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('fax',trans('adminlte_lang::message.fax')); ?>

					<?php echo Form::text('fax', ($type == 'update' ? $company->fax : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('address_1','(*)'.trans('adminlte_lang::message.address_1')); ?>

					<?php echo Form::text('address_1', ($type == 'update' ? $company->address_1 : null) , ['class'=>'form-control','required'=>'true']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('address_2',trans('adminlte_lang::message.address_2')); ?>

					<?php echo Form::text('address_2', ($type == 'update' ? $company->address_2 : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('city','(*)'.trans('adminlte_lang::message.city') ); ?>

					<?php echo Form::text('city', ($type == 'update' ? $company->city : null) , ['class'=>'form-control','required'=>'true']); ?>

				</div>
			</div>


			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('zip_code',trans('adminlte_lang::message.zip_code')); ?>

					<?php echo Form::number('zip_code', ($type == 'update' ? $company->zip_code : 0) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('facebook',trans('adminlte_lang::message.facebook')); ?>

					<?php echo Form::text('facebook', ($type == 'update' ? $company->facebook : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('website',trans('adminlte_lang::message.website')); ?>

					<?php echo Form::url('website', ($type == 'update' ? $company->website : null) , ['class'=>'form-control']); ?>

				</div>
			</div>
		</div>
	</div>	
</div>