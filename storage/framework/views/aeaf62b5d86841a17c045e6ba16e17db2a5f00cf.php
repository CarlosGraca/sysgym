<div class="row">
	

	 <div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('menu_id',trans('adminlte_lang::message.menu') ); ?>

			<?php echo Form::select('menu_id', [0=>'Escolha a opcão']+ $menus,$menu_id, ['class'=>'form-control select2','style'=>'width: 100%;']); ?>

		</div>
	</div> 

	

	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			<?php echo Form::label('tenants',trans('adminlte_lang::message.company') ); ?>

			<?php echo Form::select('tenants[]',  [''=>'Escolha a opcão']+ $tenants,null, ['class'=>'form-control select2','multiple'=>true,'style'=>'width: 100%;' ]); ?>

		</div>
	</div> 

	
</div>