
<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>



<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <?php $branch = \App\Models\Branch::where('id',\Auth::user()->branch_id)->first(); ?>
            <?php echo Form::hidden('payment_id', ($type == 'update' ? $payment->id : null), ['class'=>'form-control','id'=>'payment_id']); ?>

            <?php echo Form::hidden('matriculation_id', ($type == 'update' ? $payment->matriculation->id : null), ['class'=>'form-control','id'=>'matriculation_id']); ?>

            <?php echo Form::hidden('remaining_total', ($type == 'update' ? doubleval($payment->total - $payment->value_pay) : 0), ['class'=>'form-control','id'=>'remaining_total']); ?>

            <?php echo Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

            <?php echo Form::hidden('client_id', ($type == 'update' ? $payment->client_id : $client->id), ['class'=>'form-control','id'=>'client_id']); ?>

            <?php echo Form::hidden('branch_id', ($type == 'update' ? $payment->branch->name : $branch->name) , ['class'=>'form-control','readOnly'=>'readOnly']); ?>

            <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.financial_summary')); ?></strong></span>
            <hr class="h-divider" >
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('client',trans('adminlte_lang::message.client')); ?>

                    <?php echo Form::text('client', ($type == 'update' ? $payment->client->name : $client->name ) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

                </div>
            </div>


            

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('payment_method',trans('adminlte_lang::message.payment_method')); ?>

                    <?php echo Form::select('payment_method', [ 'credit_card' => trans('adminlte_lang::message.credit_card'),'debit_card'=>trans('adminlte_lang::message.debit_card'),'paycheck'=>trans('adminlte_lang::message.paycheck'),'check'=>trans('adminlte_lang::message.check'),'money'=>trans('adminlte_lang::message.money'),'vint4'=>trans('adminlte_lang::message.vint4')],($type == 'update' ? $payment->payment_method : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_method')]); ?>

                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('payment_type',trans('adminlte_lang::message.payment_type')); ?>

                    <?php echo Form::select('payment_type', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($type == 'update' ? $payment->payment_type : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_type')]); ?>

                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6" id="div_month">
                <div class="form-group form-group">
                  <?php echo Form::label('month_id','Months:'); ?>

                  <?php echo Form::select('month_id',$meses,null, ['class'=>'form-control select2','multiple'=>'multiple', 'style'=>'width: 100%;']); ?>

                </div>
            </div>
        </div>

        <div class="row">
           
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo e(trans('adminlte_lang::message.list_pay')); ?></h3>
                        <div class="pull-right">
							
                            <span style="margin-right: 20px;"><b><?php echo e(trans('adminlte_lang::message.total_with_desc')); ?>: <span id="payment-sum-discount"></span></b></span>
                            <span><b><?php echo e(trans('adminlte_lang::message.total')); ?>: <span id="payment-sum-total"></span></b></span>
                        </div>
                    </div><!-- /.box-header --> 

                    <div class="box-body">

                        <table id="table-payment-modality" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="check[]" /></th>
                                    <th class="col-md-2"><?php echo e(trans('adminlte_lang::message.modality')); ?></th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.value_pay')); ?></th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.end_date')); ?></th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.start_date')); ?></th>
                                    <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.discount')); ?></th>
                                    <th class="col-md-1 text-center"><?php echo e(trans('adminlte_lang::message.total')); ?></th>
                                    <th class="col-md-1 text-center"><?php echo e(trans('adminlte_lang::message.free')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($payments)): ?>
                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="payment-modality" data-key="<?php echo e($payment->idpayment); ?>">
                                            <td><input type="checkbox" name="check[]" /></td>
                                            <td><?php echo e($payment->name); ?></td>
                                            <td class="text-right t-payment-price" data-value="<?php echo e($payment->price); ?>">
                                                <input type="text" name="" id="payment-price" class="form-control  payment-price" value="<?php echo e($Defaults->currency($payment->price)); ?>" style="height: 25px;">
                                            </td>
                                            <td class="text-right" data-value="0"> 
                                                <input type="date" name="" id="payment-start-date" class="form-control  payment-start-date" style="height: 25px;">
                                            </td>
                                            <td class="text-right" data-value="0"> 
                                                <input type="date" name="" id="payment-start-end" class="form-control  payment-start-end" style="height: 25px;">
                                            </td>
                                            
                                            <td class="text-right" data-value="<?php echo e($payment->discount != null ? $payment->discount : 0); ?>">
                                                <input type="number" name="" id="payment-discount" class="form-control  payment-discount" value="<?php echo e($payment->discount != null ? $payment->discount : 0); ?>" style="height: 25px;">
                                            </td>
                                            <td class="text-right payment-total" data-value=""></td>
                                            <td class="text-right payment-free" data-value="0"><input type="checkbox" name="check[]" /></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            
                
                    
                
            
            <div class="col-lg-12">
                <div class="form-group form-group-sm">
                    <?php echo Form::label('note',trans('adminlte_lang::message.note') ); ?>

                    <?php echo Form::textarea('note', ($type == 'update' ? $payment->note : null) , ['class'=>'form-control']); ?>

                </div>
            </div>
        </div>
    </div>
</div>