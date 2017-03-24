<div class="row">
	<?php echo Form::hidden('campaign_message_id', ($type == 'update' ? $campaign_message->id : null), ['class'=>'form-control','id'=>'campaign_message_id']); ?>


	<div class="col-lg-4">
		<div class="box">
			<div class="box-header with-border">
                <i class="fa fa-clock-o"></i><span ><strong class="title"><?php echo e(trans('adminlte_lang::message.agenda')); ?></strong></span>
			</div>

			<div class="box-body">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('message_type',trans('adminlte_lang::message.message_type')); ?>

                        <?php echo Form::select('message_type', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($type == 'update' ? $campaign_message->send : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_send')]); ?>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('send_message',trans('adminlte_lang::message.send')); ?>

                        <?php echo Form::select('send_message', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($type == 'update' ? $campaign_message->send : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_send')]); ?>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('start_date',trans('adminlte_lang::message.start_date')); ?>

                        <?php echo Form::date('start_date',($type == 'update' ? $campaign_message->start_date : \Carbon\Carbon::now()), ['class'=>'form-control']); ?>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group form-group-sm">
                        <?php echo Form::label('end_date',trans('adminlte_lang::message.end_date')); ?>

                        <?php echo Form::date('end_date',($type == 'update' ? $campaign_message->end_date : null), ['class'=>'form-control']); ?>

                    </div>
                </div>

			</div>
		</div>
	</div>

	<div class="col-lg-8">
		<div class="box">
			<div class="box-header with-border">
                <i class="fa fa-envelope"></i><span ><strong class="title"><?php echo e(trans('adminlte_lang::message.message')); ?></strong></span>
			</div>
			<div class="box-body">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<?php echo Form::label('subject',trans('adminlte_lang::message.subject')); ?>

						<?php echo Form::text('subject', ($type == 'update' ? $campaign_message->subject : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group form-group-sm">
						<?php echo Form::label('message',trans('adminlte_lang::message.message')); ?>

						<?php echo Form::textarea('message', ($type == 'update' ? $campaign_message->message : null) , ['class'=>'form-control','onfocus'=>'onfocus','id'=>'compose-textarea','style'=>'height: 300px']); ?>

					</div>
				</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo Form::label('attachment',trans('adminlte_lang::message.attachment')); ?>

                    <input type="file" name="attachment" class="upload_file">
                    <p class="help-block">Max. 32MB</p>
                </div>
			</div>

		</div>

	</div>
</div>