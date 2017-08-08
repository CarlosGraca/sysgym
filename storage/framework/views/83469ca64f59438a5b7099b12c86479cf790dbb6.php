<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
//    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
//    $status_color = ['danger','default','info','success','warning'];
//    $form_status = ($matriculation->status != 1 ? 'disabled' : '') : '');
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo Form::hidden('client_id',$matriculation->client_id, ['class'=>'form-control','id'=>'client_id']); ?>

        <?php echo Form::hidden('modality_id', $matriculation->modality_id, ['class'=>'form-control','id'=>'modality_id']); ?>


        <div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.client_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
				<div class="form-group form-group-sm">
					<img  src="<?php echo e(asset($matriculation->client->avatar)); ?>" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('client','(*) '.trans('adminlte_lang::message.client')); ?>

					<?php echo Form::text('client', $matriculation->client->name, ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), 'readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

					<?php echo Form::email('email', $matriculation->client->email, ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

					<?php echo Form::text('mobile', $matriculation->client->mobile, ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

					<?php echo Form::text('phone', $matriculation->client->phone, ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

		</div>

        
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.modality')); ?></strong></span>
                <hr class="h-divider" >
                <div class="col-md-6 col-sm-6 col-xs-10">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('modality',' (*) '.trans('adminlte_lang::message.modality') ); ?>

                        <?php echo Form::text('modality', $matriculation->modality->name , ['class'=>'form-control','placeholder'=>trans('adminlte_lang::message.type_modality_name') ]); ?>

                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-10">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('price',trans('adminlte_lang::message.price') ); ?>

                        <?php echo Form::number('price',  $matriculation->modality->price , ['class'=>'form-control','placeholder'=>trans('adminlte_lang::message.price') ]); ?>

                    </div>
                </div>

            <div class="col-lg-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('note',trans('adminlte_lang::message.note') ); ?>

                    <?php echo Form::textarea('note',$matriculation->note, ['class'=>'form-control']); ?>

                </div>
            </div>

		</div>
	</div>
</div>
