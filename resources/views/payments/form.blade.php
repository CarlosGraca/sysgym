
@inject('Defaults', 'App\Http\Controllers\Defaults')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">            
            
            {!! Form::hidden('client_id', ($type == 'update' ? $payment->client_id : $client->id), ['class'=>'form-control','id'=>'client_id']) !!}
            
            <span ><strong class="title">{{ trans('adminlte_lang::message.financial_summary') }}</strong></span>
            <hr class="h-divider" >
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('client',trans('adminlte_lang::message.client')) !!}
                    {!! Form::text('client', ($type == 'update' ? $payment->client->name : $client->name ) , ['class'=>'form-control','onfocus'=>'onfocus','required'=>true,'readonly'=>true]) !!}
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('payment_method',trans('adminlte_lang::message.payment_method')) !!}
                    {!! Form::select('payment_method', [ 'credit_card' => trans('adminlte_lang::message.credit_card'),'debit_card'=>trans('adminlte_lang::message.debit_card'),'paycheck'=>trans('adminlte_lang::message.paycheck'),'check'=>trans('adminlte_lang::message.check'),'money'=>trans('adminlte_lang::message.money'),'vint4'=>trans('adminlte_lang::message.vint4')],($type == 'update' ? $payment->payment_method : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_method'),'required'=>true]) !!}
                </div>
            </div>

           {{--  <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-group form-group-sm">
                    {!! Form::label('payment_type',trans('adminlte_lang::message.payment_type')) !!}
                    {!! Form::select('payment_type', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($type == 'update' ? $payment->payment_type : null), ['class'=>'form-control','placeholder' => trans('adminlte_lang::message.select_payment_type')]) !!}
                </div>
            </div> 

            <div class="col-lg-3 col-md-4 col-sm-6" id="div_month">
                <div class="form-group form-group">
                  {!! Form::label('month_id','Months:') !!}
                  {!! Form::select('month_id',$meses,null, ['class'=>'form-control select2','multiple'=>'multiple', 'style'=>'width: 100%;'])  !!}
                </div>
            </div>--}}
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('adminlte_lang::message.list_pay') }}</h3>
                        <div class="pull-right">
                           {{--  <span style="margin-right: 20px;"><b>{{ trans('adminlte_lang::message.total_with_desc') }}: <span id="payment-sum-discount"></span></b></span> --}}
                            <span><b>{{ trans('adminlte_lang::message.total') }}: <span id="payment-sum-total"></span></b></span>
                        </div>
                    </div><!-- /.box-header --> 

                    <div class="box-body">

                        <table id="table-payment-modality" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th><input type="checkbox" class="h-check-payment" /></th>
                                    <th class="col-md-2">{{ trans('adminlte_lang::message.modality') }}</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.value_pay') }}</th>
                                    <th class="col-md-2 text-center">{{trans('adminlte_lang::message.payment_type')}}</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.start_date') }}</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.end_date') }}</th>
                                    <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.discount') }}</th>
                                    <th class="col-md-1 text-center">{{ trans('adminlte_lang::message.total') }}</th>
                                    <th class="col-md-1 text-center">{{ trans('adminlte_lang::message.free') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($payments))
                                    @foreach($payments as $payment)
                                        <tr class="payment-modality" data-key="{{ $payment->idpayment }}">
                                            <input type="hidden" value="{{ $payment->idpayment }}"  class="payment-id"/>
                                            <td class="t-check-payment" data-value=""><input type="checkbox" class="check-payment" value="{{ $payment->idmatricula }}" /></td>
                                            <td>{{ $payment->name }}</td>
                                            <td class="text-right t-payment-price" data-value="{{ $payment->price }}">
                                                <input type="text" name="" id="payment-price" class="form-control  payment-price" value="{{ $Defaults->currency($payment->price) }}" style="height: 25px;">
                                            </td>
                                            <td>
                                                 {!! Form::select('payment-type', [ 'daily' => trans('adminlte_lang::message.daily'),'weekly'=>trans('adminlte_lang::message.weekly'),'monthly'=>trans('adminlte_lang::message.monthly')],($payment->payment_type != null ? $payment->payment_type : 'monthly'), ['class'=>'form-control payment-type','style'=>'    height: 25px; padding-top: 0px;']) !!}
                                            </td>
                                            <td class="text-right" data-value=""> 
                                                <input type="date" name="payment-start-date" id="payment-start-date" class="form-control  payment-start-date" style="height: 25px;"
                                                value = "{{$payment->start_date != null ? $payment->start_date : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d')}}">
                                            </td>
                                            <td class="text-right" data-value=""> 
                                                <input type="date" name="payment-end-date" id="payment-end-date" class="form-control  payment-end-date" style="height: 25px;" value="{{$payment->end_date}}">
                                            </td>
                                            
                                            <td class="text-right t-payment-discount" data-value="{{ $payment->discount != null ? $payment->discount : 0 }}">
                                                <input type="number" name="" id="payment-discount" class="form-control  payment-discount" value="{{ $payment->discount != null ? $payment->discount : 0 }}" style="height: 25px;">
                                            </td>
                                            <td class="text-right payment-total" data-value="{{ $payment->subtotal }}">{{ $Defaults->currency($payment->subtotal)  }}</td>
                                            <td class="text-right t-payment-free" data-value="{{ $payment->free }}"  ><input type="checkbox" class="payment-free" value="{{$payment->free != null ? $payment->free : 0}} " /></td>

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
            <div class="col-lg-12">
                <div class="form-group form-group-sm">
                    {!! Form::label('note',trans('adminlte_lang::message.note') ) !!}
                    {!! Form::textarea('note', ($type == 'update' ? $payment->note : null) , ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>