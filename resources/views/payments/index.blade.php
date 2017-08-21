@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.payments') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.payments') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')
@include('layouts.shared.color_status')
<?php
	$status = [trans('adminlte_lang::message.inactive'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
	$status_color = ['danger','success','info'];
?>
@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
					  @can('add_payment')
					  <a href="{{ url('payments/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_payment') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_payment') }}
	                  </a>
					  @endcan
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-payments" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.date') }}</th>--}}
							  <th class="col-md-2">{{ trans('adminlte_lang::message.client') }}</th>
							  <th class="col-md-2">{{ trans('adminlte_lang::message.modality') }}</th>
							  <th class="col-md-2">{{ trans('adminlte_lang::message.value_pay') }}</th>
							  <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.start_date') }}</th>
                              <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.end_date') }}</th>
							  
							  <th class="col-md-1">{{ trans('adminlte_lang::message.status') }}</th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="payments_table">
                          @foreach ($payments as $payment)
                                <tr data-key="{{ $payment->id }}">
									{{-- <td class="date text-center">{{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}</td> --}}
									<td class="name">{{ $payment->client->name }}</td>
									<td>{{$payment->matriculation->modality->name}}</td>
									<td class="total">{{ $Defaults->currency($payment->value_pay) }}</td>
									<td>{{ \Carbon\Carbon::parse($payment->start_date)->format('d/m/Y') }}</td>
									<td>{{ \Carbon\Carbon::parse($payment->end_date)->format('d/m/Y') }}</td>
									<td><span class="label label-{{ $status_color[$payment->status] }}">{{ $status[$payment->status] }}</span></td>
									<td>
										{{-- @can('edit_payment') --}}
										<a href="{{ route('payments.edit',$payment->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-payments">
											<i class="fa fa-edit"></i>
										</a>
										{{-- @endcan
										@can('cancel_payment') --}}
										<a href="#"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.cancel') }}" data-key="{{ $payment->id }}" data-name="{{ $payment->note }}">
											<i class="fa fa-ban"></i>
										</a>

                                        {{--<a href="{{ route('payments.invoice',$payment->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">--}}
                                            {{--<i class="fa fa-print"></i>--}}
                                        {{--</a>--}}

										<a href="#invoice" id="payment-invoice" data-url="{{ route('payments.invoice',$payment->payment_id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.invoice') }}" data-title="{{ trans('adminlte_lang::message.print_invoice') }}">
											<i class="fa fa-ticket"></i>
										</a>
										{{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
		                <tbody>
                    </table>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
