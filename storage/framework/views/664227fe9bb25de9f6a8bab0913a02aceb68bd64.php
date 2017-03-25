	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong><?php echo e(trans('adminlte_lang::message.system_user')); ?>: </strong><span><?php echo e(\Auth::user()->name); ?></span>
	              </h3>
					<div class="pull-right box-tools">
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-patient">
								 <i class="fa fa-save"></i>
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					<?php echo Form::open(['route'=>'patients.store', 'id'=>'patient-form','files'=>true]); ?>

	                 	<?php echo $__env->make('patients.form', ['type'=>'create'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
	        </div>
	    </div>
	</div>

	<script>
		$(":file").filestyle({
			input: true,
			icon: true,
			buttonName: "btn-primary",
			buttonText: "",
			iconName: "fa fa-folder-open",
			badge: false,
			placeholder: '<?php echo e(trans('adminlte_lang::message.browser_avatar')); ?>',
		});
	</script>