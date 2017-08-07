<div class="row">
	
	<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
			<?php echo Form::label('dominio', 'Dominio:'); ?>

			<?php echo Form::text('dominio', null, ['class'=>'form-control']); ?>

		</div>
	</div>

	<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
			<?php echo Form::label('codigo', 'Codigo:'); ?>

			<?php echo Form::text('codigo', null, ['class'=>'form-control']); ?>

		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
			<?php echo Form::label('significado', 'Significado:'); ?>

			<?php echo Form::text('significado', null, ['class'=>'form-control']); ?>

		</div>
	</div>
	<div class="col-xs-12">      
        <?php echo Form::submit($submitButtonText,['class'=>'btn btn-primary pull-right']); ?>      
    </div>
</div>