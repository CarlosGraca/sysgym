<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
    $status_color = ['danger','default','info','success','warning'];
    $form_status = ($type == 'update' ? ($matriculation->status != 1 ? 'disabled' : '') : '');
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php echo Form::hidden('matriculation_id', ($type == 'update' ? $matriculation->id : null), ['class'=>'form-control','id'=>'matriculation_id']); ?>

		<?php echo Form::hidden('client_id',($type == 'update' ? $matriculation->client->id : null), ['class'=>'form-control','id'=>'client_id']); ?>

		<?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

        <?php echo Form::hidden('modality_id', '', ['class'=>'form-control','id'=>'modality_id']); ?>

        <?php echo Form::hidden('total', ($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0), ['class'=>'form-control','id'=>'total']); ?>


        <span id="last-modality_id" style="display:none;"><?php echo e($last_modality != null ? $last_modality->id : "0"); ?></span>

        <div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.client_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
				<div class="form-group form-group-sm">
					<img  src="<?php echo e(asset( ($type == 'update' ? $matriculation->client->avatar : 'img/avatar.png') )); ?>" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

				<?php if($type == 'create'): ?>
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

						<?php echo Form::text('client', ($type == 'update' ? $matriculation->client->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','placeholder'=>trans('adminlte_lang::message.type_client_name'), ($type == 'update' ? 'readonly' : '')]); ?>

					</div>
				<?php endif; ?>

				
					
					
				
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

					<?php echo Form::email('email', ($type == 'update' ? $matriculation->client->email : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

					<?php echo Form::text('mobile', ($type == 'update' ? $matriculation->client->mobile : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

					<?php echo Form::text('phone', ($type == 'update' ? $matriculation->client->phone : null) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

		</div>

		
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.matriculation_information')); ?></strong></span>
			<hr class="h-divider" >

            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('created_at',trans('adminlte_lang::message.create_date') ); ?>

                    <?php echo Form::date('created_at', ($type == 'update' ? $matriculation->created_at : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control','readonly'=>'readonly']); ?>

                </div>
            </div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('branch',trans('adminlte_lang::message.branch') ); ?>

					<?php echo Form::text('branch', ($type == 'update' ? $matriculation->branch->name : \Auth::user()->branch->name) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('employee',trans('adminlte_lang::message.employee') ); ?>

					<?php echo Form::text('employee', ($type == 'update' ? $matriculation->user->name : \Auth::user()->name) , ['class'=>'form-control','readonly'=>'readonly']); ?>

				</div>
			</div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('note',trans('adminlte_lang::message.note') ); ?>

                    <?php echo Form::textarea('note', ($type == 'update' ? $matriculation->note : null) , ['class'=>'form-control', $form_status]); ?>

                </div>
            </div>
		</div>

        
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.modality')); ?></strong></span>
			<hr class="h-divider" >

			<?php if($type=='create' || ($type=='update'  && $matriculation->status == 1)): ?>
				
			<div class="col-md-4 col-sm-10 col-xs-10">
				<div class="form-group form-group-sm">
					<?php echo Form::label('modality',trans('adminlte_lang::message.modality') ); ?>

                    <?php echo Form::text('modality', '' , ['class'=>'form-control','placeholder'=>trans('adminlte_lang::message.type_modality_name'), ($type == 'update' && ($matriculation->status != 1) ? 'readonly' : ' ') ]); ?>

                </div>
			</div>

			<div class="col-md-2 col-sm-1 col-xs-2">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('add-matriculation_modality','ADD',['style'=>'visibility: hidden;'] ); ?>

                    <a href="#!add-modality" class="btn btn-primary btn-sm <?php echo e($type == 'update' && $matriculation->status == 1 ? '' : 'disabled'); ?>" style="display: table;" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.add_modality')); ?>" id="add-matriculation_modality" data-message="NO MODALITY TYPED">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>

			<?php endif; ?>

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo e(trans('adminlte_lang::message.list_modality')); ?></h3>
						<div class="pull-right">
							<span style="margin-right: 20px;">
								<b><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?>: </b><span id="matriculation-sum-discount" data-value="<?php echo e(($type == 'update' ? ( $matriculation->total_discount != null ? $matriculation->total_discount : 0 ) : 0)); ?>"> <?php echo e(($type == 'update' ? ( $matriculation->total_discount != null ? $Defaults->currency( $matriculation->total_discount ) : $Defaults->currency(0) )   : $Defaults->currency(0))); ?> </span>
							</span>
							<span>
								<b><?php echo e(trans('adminlte_lang::message.total')); ?>: </b><span id="matriculation-sum-total" data-value="<?php echo e(($type == 'update' ? ( $matriculation->total != null ? $matriculation->total : 0 ) : 0)); ?>"> <?php echo e(($type == 'update' ? ( $matriculation->total != null ? $Defaults->currency( $matriculation->total ) : $Defaults->currency(0) )   : $Defaults->currency(0))); ?> </span>
							</span>
						</div>
					</div><!-- /.box-header -->

					<div class="box-body">
						<table id="table-matriculation-modality" class="table table-bordered table-striped">

							<thead>
								<th class="col-md-4 text-center"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
								<th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.price_with_iva')); ?></th>
								<th class="col-md-1 text-center"><?php echo e(trans('adminlte_lang::message.iva')); ?> (%)</th>
								<th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.discount')); ?></th>
								<th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
								<th class="col-md-1 action_button"></th>
							</thead>
							
                            <?php if(isset($matriculation)): ?>
                                <?php $__currentLoopData = $matriculation->modality->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m_modality): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr class="m_modality-table-row" data-key="<?php echo e($m_modality->id); ?>" data-total="<?php echo e(doubleval($m_modality->total + $m_modality->discount)); ?>">
                                    <td class="m_modality-modality" data-value="<?php echo e($m_modality->modality_id); ?>" ><?php echo e($m_modality->modality->name); ?></td>
                                    <td class="m_modality-price text-center" data-value="<?php echo e($m_modality->price); ?>" ><?php echo e($Defaults->currency($m_modality->price)); ?></td>
									<td class="m_modality-iva text-center" data-value="<?php echo e($m_modality->iva); ?>"><?php echo e($m_modality->iva); ?> %</td>
									<td class="m_modality-discount text-center" data-value="<?php echo e($m_modality->discount); ?>" ><?php echo e($Defaults->currency($m_modality->discount)); ?></td>
									<td class="m_modality-total text-center" data-value="<?php echo e($m_modality->total); ?>" ><?php echo e($Defaults->currency($m_modality->total)); ?></td>
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
