<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
    $status_color = ['danger','default','info','success','warning'];
    $form_status = ($type == 'update' ? ($matriculation->status != 1 ? 'disabled' : '') : '');
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo Form::hidden('client_id',($type == 'update' ? $matriculation->client->id : $client === null ? null : $client->id), ['class'=>'form-control','id'=>'client_id']); ?>

		<?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

        <?php echo Form::hidden('modality_id', '', ['class'=>'form-control','id'=>'modality_id']); ?>

        <?php echo Form::hidden('total', ($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0), ['class'=>'form-control','id'=>'total']); ?>


        <span id="last-modality_id" style="display:none;"><?php echo e($last_modality != null ? $last_modality->id : "0"); ?></span>

        <div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.client_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
				<div class="form-group form-group-sm">
					<img  src="<?php echo e(asset( ($type == 'update' ? $matriculation->client->avatar : $client === null ?  'img/avatar.png' : $client->avatar) )); ?>" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

				<?php if($type == 'create' && $client === null): ?>
					<div class="input-group input-group-sm">
						<?php echo Form::label('client','(*) '.trans('adminlte_lang::message.client')); ?>

						<?php echo Form::text('client', ($type == 'update' ? $matriculation->client->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), ($type == 'update' ? 'readonly' : '')]); ?>

						<span class="input-group-btn" style="font-size: inherit;">
							<?php echo Form::label('client_add_popup','ADD',['style'=>'visibility: hidden;'] ); ?>

							<a class="btn btn-success btn-flat form-control" id="client_add_popup" data-url="<?php echo e(url('clients/create')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.add_client')); ?>" data-title="<?php echo e(trans('adminlte_lang::message.new_client')); ?>"><i class="fa fa-user-plus"></i></a>
								</span>
					</div>
				<?php else: ?>
					<div class="form-group form-group-sm">
						<?php echo Form::label('client','(*) '.trans('adminlte_lang::message.client')); ?>

						<?php echo Form::text('client', ($type == 'update' ? $matriculation->client->name : $client === null ? null : $client->name) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), ($type == 'update' ? 'readonly' : '')]); ?>

					</div>
				<?php endif; ?>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

					<?php echo Form::email('email', ($type == 'update' ? $matriculation->client->email : $client === null ? null : $client->email) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

					<?php echo Form::text('mobile', ($type == 'update' ? $matriculation->client->mobile : $client === null ? null : $client->mobile) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

					<?php echo Form::text('phone', ($type == 'update' ? $matriculation->client->phone : $client === null ? null : $client->phone) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

		</div>

        
		<div class="row">

			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.modality')); ?></strong></span>
			<span id="div_add_modality">
                <hr class="h-divider" >

			

                
                    
                        
                        
                    
                

                <div class="col-md-4 col-sm-10 col-xs-10">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('modality',' (*) '.trans('adminlte_lang::message.modality') ); ?>

                        <?php echo Form::text('modality', '' , ['class'=>'form-control','placeholder'=>trans('adminlte_lang::message.type_modality_name'), ($type == 'update' && ($matriculation->status != 1) ? 'readonly' : ' ') ]); ?>

                    </div>
                </div>

                <div class="col-md-2 col-sm-1 col-xs-2">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('add-matriculation_modality','ADD',['style'=>'visibility: hidden;'] ); ?>

                        <a href="#!add-modality" class="btn btn-primary btn-sm" style="display: table;" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.add_modality')); ?>" id="add-matriculation_modality" data-message="NO MODALITY TYPED">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>

			
            </span>


			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="box box-primary">
					
						
						
							
								
							
							
								
							
						
					

					<div class="box-body">
						<table id="table-matriculation-modality" class="table table-bordered table-striped">

							<thead>
								<th class="col-md-6"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
								<th class="col-md-5 text-center"><?php echo e(trans('adminlte_lang::message.price')); ?></th>
								


								<th class="col-md-1 action_button"></th>
							</thead>
							
                            <?php if(isset($matriculation)): ?>
                                <?php $__currentLoopData = $matriculation->modality->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_modality): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="m_modality-table-row" data-key="<?php echo e($m_modality->id); ?>" data-total="<?php echo e(doubleval($m_modality->total + $m_modality->discount)); ?>">
                                    <td class="m_modality-modality" data-value="<?php echo e($m_modality->modality_id); ?>" ><?php echo e($m_modality->modality->name); ?></td>
                                    <td class="m_modality-price text-center" data-value="<?php echo e($m_modality->price); ?>" ><?php echo e($Defaults->currency($m_modality->price)); ?></td>
									
									
									
                                    <td class="text-center action_button">
										<?php if($matriculation->status == 1): ?>
                                        	<a href="#!remove" class="remove-modality-row" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.remove')); ?>"><i class="fa fa-trash"></i></a>
										<?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>

						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
