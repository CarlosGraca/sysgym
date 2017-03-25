<div class="row">
	<?php echo Form::hidden('teeth_id', ($type == 'update' ? $teeth->id : null), ['class'=>'form-control','id'=>'teeth_id']); ?>

	<?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.teeth_information')); ?></strong></span>
    <hr class="h-divider" >

    <div class="col-md-3 col-sm-3 text-center">
        <img  src="<?php echo e(url('/')); ?>/<?php echo e(($type == 'update' ? $teeth->avatar : 'img/clinic/doctor_icon.png')); ?>" class="img-thumbnail avatar-teeth" alt="Cinque Terre" >
        <div style="margin-top: 10px">
            <div class="col-xs-12 text-center">
                <div class="form-group" data-type='teeth'>
                    <?php echo Form::file('avatar', '', ['class' =>  'filestyle upload_image','data-input'=>'false', 'data-buttonText'=>'Select Image', 'accept'=>'image/*', 'data-placeholder'=> trans('adminlte_lang::message.browser_avatar') ]); ?>

                </div>
            </div>
        </div>
    </div>

	<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('number','(*)'.trans('adminlte_lang::message.number')); ?>

			<?php echo Form::number('number', ($type == 'update' ? $teeth->number : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('name','(*)'.trans('adminlte_lang::message.name')); ?>

			<?php echo Form::text('name', ($type == 'update' ? $teeth->name : null) , ['class'=>'form-control']); ?>

		</div>
	</div>

</div>