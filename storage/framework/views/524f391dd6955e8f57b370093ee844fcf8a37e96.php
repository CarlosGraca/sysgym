<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <?php $branch = \App\Branch::where('id',\Auth::user()->branch_id)->first(); ?>
                <?php echo Form::hidden('payment_id', ($type == 'update' ? $payment->id : null), ['class'=>'form-control','id'=>'payment_id']); ?>

                <?php echo Form::hidden('matriculation_id', ($type == 'update' ? $payment->matriculation->id : null), ['class'=>'form-control','id'=>'matriculation_id']); ?>

                <?php echo Form::hidden('remaining_total', ($type == 'update' ? doubleval($payment->total - $payment->value_pay) : 0), ['class'=>'form-control','id'=>'remaining_total']); ?>

                <?php echo Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

                <?php echo Form::hidden('client_id', ($type == 'update' ? $payment->client_id : null), ['class'=>'form-control','id'=>'client_id']); ?>

            <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.financial_summary')); ?></strong></span>
            <hr class="h-divider" >
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('client',trans('adminlte_lang::message.client')); ?>

                    <?php echo Form::text('client', ($type == 'update' ? $payment->client->name : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

                </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('branch_id',trans('adminlte_lang::message.branch') ); ?>

                    <?php echo Form::text('branch_id', ($type == 'update' ? $payment->branch->name : $branch->name) , ['class'=>'form-control','readOnly'=>'readOnly']); ?>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('payment_method',trans('adminlte_lang::message.payment_method')); ?>

                    <?php echo Form::select('payment_method', [ 'credit_card' => trans('adminlte_lang::message.credit_card'),'debit_card'=>trans('adminlte_lang::message.debit_card'),'paycheck'=>trans('adminlte_lang::message.paycheck'),'check'=>trans('adminlte_lang::message.check'),'money'=>trans('adminlte_lang::message.money'),'vint4'=>trans('adminlte_lang::message.vint4')],($type == 'update' ? $payment->payment_method : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_method')]); ?>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('payment_type',trans('adminlte_lang::message.payment_type')); ?>

                    <?php echo Form::select('payment_type', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($type == 'update' ? $payment->payment_type : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_type')]); ?>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('created_at',trans('adminlte_lang::message.payment_date') ); ?>

                    <?php echo Form::date('created_at', ($type == 'update' ? $payment->created_at : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control','readonly'=>'readonly']); ?>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('employee',trans('adminlte_lang::message.employee') ); ?>

                    <?php echo Form::text('employee', ($type == 'update' ? $payment->employee->name : \Auth::user()->name) , ['class'=>'form-control','readOnly'=>'readOnly']); ?>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('note',trans('adminlte_lang::message.note') ); ?>

                    <?php echo Form::textarea('note', ($type == 'update' ? $payment->note : null) , ['class'=>'form-control']); ?>

                </div>
            </div>

            
                
                    
                    
                
            

                
                    
                        
                        
                            
                        
                    
                
        </div>

        <div class="row">
            <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.modalities')); ?></strong></span>
            <hr class="h-divider" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.list_modality')); ?></h3>
                        <div class="pull-right">
							<span style="margin-right: 20px;">
								<b><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?>: </b><span id="payment-sum-discount" data-value="<?php echo e(($type == 'update' ? ( $payment->total_discount != null ? $payment->total_discount : 0 ) : 0)); ?>"> <?php echo e(($type == 'update' ? ( $payment->total_discount != null ? $Defaults->currency( $payment->total_discount ) : $Defaults->currency(0) )   : $Defaults->currency(0))); ?> </span>
							</span>
							<span>
								<b><?php echo e(trans('adminlte_lang::message.total')); ?>: </b><span id="payment-sum-total" data-value="<?php echo e(($type == 'update' ? ( $payment->total != null ? $payment->total : 0 ) : 0)); ?>"> <?php echo e(($type == 'update' ? ( $payment->total != null ? $Defaults->currency( $payment->total ) : $Defaults->currency(0) )   : $Defaults->currency(0))); ?> </span>
							</span>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body">

                        <table id="table-payment-modality" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-3"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.price_with_iva')); ?></th>
                                    <th class="col-md-1 text-center"><?php echo e(trans('adminlte_lang::message.iva')); ?> (%)</th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.discount')); ?></th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.value_total')); ?></th>
        
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($payment)): ?>
                                    <?php $__currentLoopData = $payment->matriculation->modality->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modality): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="payment-modality" data-key="<?php echo e($modality->id); ?>">
                                            <td><?php echo e($modality->modality->name); ?></td>
                                            <td class="text-right payment-price" data-value="<?php echo e($modality->total); ?>"><?php echo e($Defaults->currency($modality->total)); ?></td>
                                            <td class="text-right payment-iva" data-value="<?php echo e($modality->value_pay); ?>"><?php echo e($Defaults->currency($modality->value_pay)); ?></td>
                                            <td class="text-right payment-discount" data-value="<?php echo e($modality->remaining); ?>"><?php echo e($Defaults->currency($modality->remaining)); ?></td>
                                            <td class="text-right payment-total" data-value="0"><?php echo e($Defaults->currency(0)); ?></td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            
                
                    
                
            
        </div>
    </div>
</div>