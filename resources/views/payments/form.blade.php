<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <?php $branch = \App\Branch::where('id',\Auth::user()->logged_branch)->first(); ?>
            {!! Form::hidden('payment_id', ($type == 'update' ? $payment->id : null), ['class'=>'form-control','id'=>'payment_id']) !!}
            {!! Form::hidden('patient_id', ($type == 'update' ? $patient_id : null), ['class'=>'form-control','id'=>'patient_id']) !!}
            {!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
            <span ><strong class="title">{{ trans('adminlte_lang::message.financial_summary') }}</strong></span>
            <hr class="h-divider" >
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('patient',trans('adminlte_lang::message.patient')) !!}
                    {!! Form::text('patient', ($type == 'update' ? $payment->patient->name : null) , ['class'=>'form-control','onfocus'=>'onfocus','readOnly'=>'readOnly']) !!}
                </div>
            </div>

            {{--<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">--}}
                {{--<div class="form-group form-group-sm">--}}
                    {{--{!! Form::label('employee',trans('adminlte_lang::message.employee') ) !!}--}}
                    {{--{!! Form::text('employee', ($type == 'update' ? $payment->employee->name : \Auth::user()->name) , ['class'=>'form-control','readOnly'=>'readOnly']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('branch_id',trans('adminlte_lang::message.branch') ) !!}
                    {!! Form::text('branch_id', ($type == 'update' ? $payment->branch->name : $branch->name) , ['class'=>'form-control','readOnly'=>'readOnly']) !!}
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('payment_method',trans('adminlte_lang::message.payment_method')) !!}
                    {!! Form::select('payment_method', [ 'credit_card' => trans('adminlte_lang::message.credit_card'),'debit_card'=>trans('adminlte_lang::message.debit_card'),'paycheck'=>trans('adminlte_lang::message.paycheck'),'check'=>trans('adminlte_lang::message.check'),'money'=>trans('adminlte_lang::message.money'),'vint4'=>trans('adminlte_lang::message.vint4')],($type == 'update' ? $campaign_message->send : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_method')]) !!}
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('created_at',trans('adminlte_lang::message.payment_date') ) !!}
                    {!! Form::date('created_at', ($type == 'update' ? $payment->created_at : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control','readonly'=>'readonly']) !!}
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('note',trans('adminlte_lang::message.note') ) !!}
                    {!! Form::textarea('note', ($type == 'update' ? $payment->note : null) , ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-10">
                <div class="form-group form-group-sm">
                    {!! Form::label('remaining_value',trans('adminlte_lang::message.remaining_value') ) !!}
                    {!! Form::text('remaining_value', ($type == 'update' ? $payment->remaining_value : null) , ['class'=>'form-control','readonly'=>'readonly']) !!}
                </div>
            </div>

                <div class="col-md-1 col-sm-1 col-xs-2">
                    <div class="form-group form-group-sm">
                        {!! Form::label('','pay-all',['style'=>'visibility: hidden;'] ) !!}
                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.pay_all') }}" id="pay-all">
                            <i class="fa fa-check"></i>
                        </a>
{{--                        {!! Form::button('<i class="fa fa-check"></i>', ['class'=>'form-control btn btn-primary btn-sm','id'=>'pay-all','data-toggle'=>'tooltip','title'=>trans('adminlte_lang::message.pay_all')]) !!}--}}

                    </div>
                </div>
        </div>

        <div class="row">
            <span ><strong class="title">{{ trans('adminlte_lang::message.procedure') }}</strong></span>
            <hr class="h-divider" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="table-procedure" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="col-md-3">{{ trans('adminlte_lang::message.procedure') }}</th>
                        <th class="col-md-1">{{ trans('adminlte_lang::message.teeth') }}</th>
                        <th class="col-md-3">{{ trans('adminlte_lang::message.doctor') }}</th>
                        <th class="col-md-1">{{ trans('adminlte_lang::message.amount') }}</th>
                        <th class="col-md-1">{{ trans('adminlte_lang::message.value_total') }}</th>
                        <th class="col-md-1">{{ trans('adminlte_lang::message.remaining') }}</th>
                        <th class="col-md-2">{{ trans('adminlte_lang::message.value') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>