@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.procedure') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.procedure') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"> {{ trans('adminlte_lang::message.list_procedure') }} </h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('procedure/create') }}" data-url="{{ url('procedure/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_procedure') }}" id="add-procedure-modal-older">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_procedure') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-procedure" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
							  <th class="col-md-1">{{ trans('adminlte_lang::message.code') }}</th>
							  <th class="col-md-3">{{ trans('adminlte_lang::message.procedure_group') }}</th>
							  <th class="col-md-5">{{ trans('adminlte_lang::message.name') }}</th>
							  <th class="col-md-2">{{ trans('adminlte_lang::message.price') }}</th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="procedure_table">
                          @foreach ($procedure as $type)
                                <tr data-key="{{ $type->id }}" class="bg-{{ $status_color[$type->status] }}">
                                    {{--<td>{{ $type->id }}</td>--}}
                                    <td class="code text-center">{{ $type->code }}</td>
									<td class="procedure_group">{{ $type->procedure_group->name }}</td>
									<td class="name">{{ $type->name }}</td>
									<td class="price">{{ $Defaults->currency($type->price) }}</td>
									<td class="text-center">
                                        <a href="#disable" style="display: {{ $type->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-procedure" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $type->id }}" data-name="{{ $type->name }}">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: {{ $type->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-procedure" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $type->id }}" data-name="{{ $type->name }}">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="{{ route('procedure.edit',$type->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="update-procedure">
											<i class="fa fa-edit"></i>
										</a>
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
