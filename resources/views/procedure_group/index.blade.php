@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.procedure_group') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.procedure_group') }}
@endsection

{{--@inject('Defaults', 'App\Http\Controllers\Defaults')--}}
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"> {{ trans('adminlte_lang::message.list_procedure_group') }} </h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('procedure_group/create') }}" data-url="{{ url('procedure_group/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_procedure_group') }}" id="add-procedure_group-modal-older">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_procedure_group') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-procedure_group" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-4">{{ trans('adminlte_lang::message.code') }}</th>
		                    <th class="col-md-7">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="procedure_group_table">
                          @foreach ($procedure_group as $type)
                                <tr data-key="{{ $type->id }}" class="bg-{{ $status_color[$type->status] }}">
                                    {{--<td>{{ $type->id }}</td>--}}
                                    <td class="name text-center">{{ $type->code }}</td>
                                    <td class="price">{{ $type->name }}</td>
                                    <td class="text-center">
                                        <a href="#disable" style="display: {{ $type->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-procedure_group" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $type->id }}" data-name="{{ $type->name }}">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: {{ $type->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-procedure_group" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $type->id }}" data-name="{{ $type->name }}">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="{{ route('procedure_group.edit',$type->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="update-procedure_group">
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
