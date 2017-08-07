@inject('Defaults', 'App\Http\Controllers\Defaults')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <?php $branch = \App\Models\Branch::where('id',\Auth::user()->branch_id)->first(); ?>
            {!! Form::hidden('payment_id', ($type == 'update' ? $payment->id : null), ['class'=>'form-control','id'=>'payment_id']) !!}
            {!! Form::hidden('matriculation_id', ($type == 'update' ? $payment->matriculation->id : null), ['class'=>'form-control','id'=>'matriculation_id']) !!}
            {!! Form::hidden('remaining_total', ($type == 'update' ? doubleval($payment->total - $payment->value_pay) : 0), ['class'=>'form-control','id'=>'remaining_total']) !!}
            {!! Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control','id'=>'user_id']) !!}
            {!! Form::hidden('client_id', ($type == 'update' ? $payment->client_id : $client->id), ['class'=>'form-control','id'=>'client_id']) !!}
            {!! Form::hidden('branch_id', ($type == 'update' ? $payment->branch->name : $branch->name) , ['class'=>'form-control','readOnly'=>'readOnly']) !!}
            <span ><strong class="title">{{ trans('adminlte_lang::message.financial_summary') }}</strong></span>
            <hr class="h-divider" >
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('client',trans('adminlte_lang::message.client')) !!}
                    {!! Form::text('client', ($type == 'update' ? $payment->client->name : $client->name ) , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
                </div>
            </div>


            {{--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                     {!! Form::label('branch_id',trans('adminlte_lang::message.branch') ) !!} 
                    {!! Form::hidden('branch_id', ($type == 'update' ? $payment->branch->name : $branch->name) , ['class'=>'form-control','readOnly'=>'readOnly']) !!}
                </div>
            </div>--}}

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('payment_method',trans('adminlte_lang::message.payment_method')) !!}
                    {!! Form::select('payment_method', [ 'credit_card' => trans('adminlte_lang::message.credit_card'),'debit_card'=>trans('adminlte_lang::message.debit_card'),'paycheck'=>trans('adminlte_lang::message.paycheck'),'check'=>trans('adminlte_lang::message.check'),'money'=>trans('adminlte_lang::message.money'),'vint4'=>trans('adminlte_lang::message.vint4')],($type == 'update' ? $payment->payment_method : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_method')]) !!}
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-group form-group-sm">
                    {!! Form::label('payment_type',trans('adminlte_lang::message.payment_type')) !!}
                    {!! Form::select('payment_type', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($type == 'update' ? $payment->payment_type : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_type')]) !!}
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-group form-group">
                  {!! Form::label('month_id','Months:') !!}
                  
                  {!! Form::select('month_id',$meses,null, ['class'=>'form-control select2','multiple'=>'multiple', 'style'=>'width: 100%;'])  !!}
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('start_date',trans('adminlte_lang::message.start_date') ) !!}
                    {!! Form::date('start_date', ($type == 'update' ? $payment->created_at : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')) , ['class'=>'form-control']) !!}
                </div>
            </div>
             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('end_date',trans('adminlte_lang::message.end_date') ) !!}
                    {!! Form::date('end_date', ($type == 'update' ? $payment->created_at : null) , ['class'=>'form-control']) !!}
                </div>
            </div>
           {{-- 
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('employee',trans('adminlte_lang::message.employee') ) !!}
                    {!! Form::text('employee', ($type == 'update' ? $payment->employee->name : \Auth::user()->name) , ['class'=>'form-control','readOnly'=>'readOnly']) !!}
                </div>
            </div> --}}

            <div class="col-lg-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('note',trans('adminlte_lang::message.note') ) !!}
                    {!! Form::textarea('note', ($type == 'update' ? $payment->note : null) , ['class'=>'form-control']) !!}
                </div>
            </div>

            {{--<div class="col-lg-3 col-md-3 col-sm-5 col-xs-10">--}}
                {{--<div class="form-group form-group-sm">--}}
                    {{--{!! Form::label('remaining_value',trans('adminlte_lang::message.remaining_value') ) !!}--}}
                    {{--{!! Form::text('remaining_value', ($type == 'update' ? $Defaults->currency(($payment->total - $payment->value_pay)) : $Defaults->currency(0)) , ['class'=>'form-control','readonly'=>'readonly']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}

                {{--<div class="col-md-1 col-sm-1 col-xs-2">--}}
                    {{--<div class="form-group form-group-sm">--}}
                        {{--{!! Form::label('','pay-all',['style'=>'visibility: hidden;'] ) !!}--}}
                        {{--<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.pay_all') }}" id="pay-all">--}}
                            {{--<i class="fa fa-check"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
        </div>

        <div class="row">
            <span ><strong class="title">{{ trans('adminlte_lang::message.modalities') }}</strong></span>
            <hr class="h-divider" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('adminlte_lang::message.list_modality') }}</h3>
                        <div class="pull-right">
							<span style="margin-right: 20px;">
								<b>{{ trans('adminlte_lang::message.total_with_desc') }}: </b><span id="payment-sum-discount" data-value="{{ ($type == 'update' ? ( $payment->total_discount != null ? $payment->total_discount : 0 ) : 0) }}"> {{ ($type == 'update' ? ( $payment->total_discount != null ? $Defaults->currency( $payment->total_discount ) : $Defaults->currency(0) )   : $Defaults->currency(0)) }} </span>
							</span>
							<span>
								<b>{{ trans('adminlte_lang::message.total') }}: </b><span id="payment-sum-total" data-value="{{ ($type == 'update' ? ( $payment->total != null ? $payment->total : 0 ) : 0) }}"> {{ ($type == 'update' ? ( $payment->total != null ? $Defaults->currency( $payment->total ) : $Defaults->currency(0) )   : $Defaults->currency(0)) }} </span>
							</span>
                        </div>
                    </div><!-- /.box-header --> 

                    <div class="box-body">

                        <table id="table-payment-modality" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-3">{{ trans('adminlte_lang::message.modality') }}</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.price_with_iva') }}</th>
                                    <th class="col-md-1 text-center">{{ trans('adminlte_lang::message.iva') }} (%)</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.discount') }}</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.value_total') }}</th>
        {{--                            <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.value') }}</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($payment))
                                    @foreach($payment->matriculation->modality->where('status',1) as $modality)
                                        <tr class="payment-modality" data-key="{{ $modality->id }}">
                                            <td>{{ $modality->modality->name }}</td>
                                            <td class="text-right payment-price" data-value="{{ $modality->total }}">{{ $Defaults->currency($modality->total) }}</td>
                                            <td class="text-right payment-iva" data-value="{{ $modality->value_pay }}">{{ $Defaults->currency($modality->value_pay) }}</td>
                                            <td class="text-right payment-discount" data-value="{{ $modality->remaining }}">{{ $Defaults->currency($modality->remaining) }}</td>
                                            <td class="text-right payment-total" data-value="0">{{ $Defaults->currency(0) }}</td>
                                            {{--<td class="text-right payment-value" data-value="0">{{ $Defaults->currency(0) }}</td>--}}
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                {{--<div class="pull-right">--}}
                    {{--<b>Total: </b><span id="payment-sum-total" data-value="0" style="margin-right: 10px"> {{ $Defaults->currency( 0 ) }} </span>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>