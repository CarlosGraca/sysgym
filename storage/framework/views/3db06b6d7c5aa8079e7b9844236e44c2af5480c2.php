<div class="row">

    <div class="col-lg-3">
        
            
                
            

            
                
            
        

        <div class="box box-widget widget-user-2 ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow" >
                <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo e(asset(\Auth::user()->avatar)); ?>" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo e(\Auth::user()->name); ?></h3>
                <h5 class="widget-user-desc"> <?php echo e(\Carbon\Carbon::now()->format('d/m/Y')); ?></h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    
                    <li><a href="#"><?php echo e(trans('adminlte_lang::message.odontograma')); ?> </a></li>
                    <li><a href="#"><?php echo e(trans('adminlte_lang::message.budget')); ?>  </a></li>
                    <li><a href="#"><?php echo e(trans('adminlte_lang::message.documents')); ?>  </a></li>
                </ul>
            </div>
        </div>


        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.consult_duration')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <button type="button" class="btn btn-block btn-default btn-lg" id="stopwatch"><img src="<?php echo e(asset('/img/icon/chronometer.png')); ?>" alt=""> <span class="" style="font-size: 32px; vertical-align: middle; color: #3c8dbc;" id="time-container">00 : 00 : 00</span></button>
                <button type="button" class="btn btn-block btn-default btn-sm" style="background-color: #fff;" id="end-counter"> <i class="fa fa-stop-circle-o"></i> <span>END CONSULT</span></button>
            </div>
            <!-- /.box-body -->
        </div>


    </div>

	
		
	
	
		
		
		
		
		
	

	<!--
		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.consult_information')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group form-group-sm">
					<?php echo Form::label('patient',trans('adminlte_lang::message.patient')); ?>

					<?php echo Form::text('patient', ($type == 'update' ? $consult_type->patient : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('email',trans('adminlte_lang::message.email') ); ?>

					<?php echo Form::email('email', ($type == 'update' ? $patient->email : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('mobile',trans('adminlte_lang::message.mobile') ); ?>

					<?php echo Form::text('mobile', ($type == 'update' ? $patient->mobile : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('phone',trans('adminlte_lang::message.phone') ); ?>

					<?php echo Form::text('phone', ($type == 'update' ? $patient->phone : null) , ['class'=>'form-control']); ?>

				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group form-group-sm">
					<?php echo Form::label('has_secure',trans('adminlte_lang::message.has_secure') ); ?>

					<?php echo Form::select('has_secure',[0 =>trans('adminlte_lang::message.not'), 1 =>trans('adminlte_lang::message.yes') ], ($type == 'update' ? $patient->has_secure : null) , ['class'=>'form-control','id'=>'has_secure']); ?>

				</div>
			</div>
		</div>


		<div class="row">
			<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.procedure_consult')); ?></strong></span>
			<hr class="h-divider" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo e(trans('adminlte_lang::message.procedure_consult')); ?></h3>
							<div class="pull-left box-tools">
								<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_test')); ?>">
									<i class="fa fa-plus"></i>
								</a>
							</div><!-- /. tools --
						</div><!-- /.box-header --

						<div class="box-body">
							<table id="table-consult_procedure" class="table table-bordered table-striped">
								<thead>
								<th class="col-md-1"><?php echo e(trans('adminlte_lang::message.consult_type')); ?></th>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
			</div>
		</div>
-->
</div>