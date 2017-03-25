<?php
$status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.scheduled'),trans('adminlte_lang::message.confirmed'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','info','success','default'];
?>

<div class="row">

        
            
                
                    
                    
                
            
        

	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	              		
	                </h3>
	                <div class="pull-right box-tools">
                        <?php if($consult_agenda->status == 1): ?>
                            <a href="#!edit" data-url="<?php echo e(route('consult_agenda.edit', $consult_agenda->id)); ?>" class="btn btn-primary btn-sm show-agenda-modal" data-title="<?php echo e(trans('adminlte_lang::message.update_consult_agenda')); ?>" role="button" data-toggle="tooltip" title="Edit" data-remote="false">
                               <i class="fa fa-edit"></i>
                            </a>
                        <?php endif; ?>

                        <a href="#" class="btn btn-primary btn-sm" data-dismiss="modal" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.close')); ?>">
                            <i class="fa  fa-close"></i>
                        </a>
	                    
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
						<div class="col-lg-3 text-center">
							
						<?php if(isset($consult_agenda->patient->avatar)): ?>
								<img  src="<?php echo e(asset($consult_agenda->patient->avatar)); ?>" class="img-thumbnail" alt="Cinque Terre" style="max-width:200px; min-width: 150px; height: auto;">
							<?php else: ?>
								<img  src="<?php echo e(asset('img/avatar.jpg')); ?>" class="img-thumbnail" alt="Cinque Terre" width="150" height="75">
							<?php endif; ?>
						</div>

		        		<div class="col-lg-9">
		        			<ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
									<i class="fa fa-user"></i> <b> <?php echo e(trans('adminlte_lang::message.patient')); ?>: </b><span class="name"><?php echo e($consult_agenda ? $consult_agenda->patient->name : null); ?></span>
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-stethoscope"></i> <b> <?php echo e(trans('adminlte_lang::message.consult_type')); ?>: </b> <?php echo e($consult_agenda ? $consult_agenda->consult_type->name : null); ?>

								</li>
								<li class="list-group-item">
									<i class="fa fa-user-md"></i> <b> <?php echo e(trans('adminlte_lang::message.doctor')); ?>: </b> <?php echo e($consult_agenda ? $consult_agenda->doctor->name : null); ?>

								</li>
			                    <li class="list-group-item">
									<i class="fa fa-calendar"></i> <b> <?php echo e(trans('adminlte_lang::message.date')); ?>: </b><?php echo e($consult_agenda ? \Carbon\Carbon::createFromFormat('Y-m-d', $consult_agenda->date)->format('d/m/Y') : null); ?>

			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-clock-o"></i> <b> <?php echo e(trans('adminlte_lang::message.start_time')); ?>: </b><span class="start_time"><?php echo e($consult_agenda ? $consult_agenda->start_time : null); ?></span>
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-clock-o"></i> <b> <?php echo e(trans('adminlte_lang::message.end_time')); ?>: </b><span class="end_time"><?php echo e($consult_agenda ? $consult_agenda->end_time : null); ?></span>
								</li>
								<li class="list-group-item">
									<i class="fa fa-quote-left"></i> <b> <?php echo e(trans('adminlte_lang::message.note')); ?>: </b><span class="note"><?php echo e($consult_agenda ? $consult_agenda->note : null); ?></span>
								</li>
                                <li class="list-group-item">
                                    <i class="fa fa-certificate"></i> <b> <?php echo e(trans('adminlte_lang::message.status')); ?>: </b><span class="label label-<?php echo e($status_color[$consult_agenda->status]); ?>"> <?php echo e($consult_agenda ? $status[$consult_agenda->status] : null); ?></span>
                                </li>
			                </ul>
		        		</div>
		        	</div>
	            </div>
	        </div>
	    </div>
	</div>
