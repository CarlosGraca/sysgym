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

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
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
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
							  <th class="col-md-1">{{ trans('adminlte_lang::message.date') }}</th>
							  <th class="col-md-2">{{ trans('adminlte_lang::message.client') }}</th>
							  <th class="col-md-2">{{ trans('adminlte_lang::message.payment_method') }}</th>
							  <th class="col-md-3">{{ trans('adminlte_lang::message.note') }}</th>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.amount_paid') }}</th>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.total') }}</th>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.status') }}</th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="payments_table">
                          @foreach ($payments as $payment)
                                <tr data-key="{{ $payment->id }}">
									<td class="date text-center">{{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}</td>
									<td class="name">{{ $payment->matriculation->client->name }}</td>
									<td class="payment_method">{{ trans('adminlte_lang::message.'.($payment->payment_method != null ? $payment->payment_method : 'none'))  }}</td>
									<td class="note">{{ $payment->note }}</td>
									<td class="paid">{{ $Defaults->currency($payment->value_pay) }}</td>
									<td class="total">{{ $Defaults->currency($payment->total) }}</td>
									<td class="status">{{ $payment->status }}</td>
									<td>
										@can('edit_payment')
										<a href="{{ route('payments.edit',$payment->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-payments">
											<i class="fa fa-edit"></i>
										</a>
										@endcan
										@can('cancel_payment')
										<a href="#"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.cancel') }}" data-key="{{ $payment->id }}" data-name="{{ $payment->note }}">
											<i class="fa fa-ban"></i>
										</a>
										@endcan
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
