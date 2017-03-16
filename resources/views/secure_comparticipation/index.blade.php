@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.secure_comparticipation') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.secure_comparticipation') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('secure_comparticipation/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_secure_comparticipation') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_secure_comparticipation') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-secure_comparticipation" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
							<th class="col-md-3">{{ trans('adminlte_lang::message.secure_agency') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.code') }}</th>
							<th class="col-md-3">{{ trans('adminlte_lang::message.consult_type') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.max_frequency') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.deadline') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.max_value') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($secure_comparticipation as $comparticipation)
                                <tr>
									{{--<td>{{ $comparticipation->id }}</td>--}}
									<td>{{ $comparticipation->secure_agency->name }}</td>
									<td>{{ $comparticipation->code }}</td>
									<td>{{ $comparticipation->consult_type->name }}</td>
									<td>{{ $comparticipation->max_frequency }}</td>
									<td>{{ $comparticipation->deadline }}</td>
                                    <td>{{ $Defaults->currency($comparticipation->max_value) }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="{{ $comparticipation->id }}" data-product_name="{{ $comparticipation->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="{{ route('secure_comparticipation.edit',$comparticipation->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Editar" data-remote='false'])>   <i class="fa fa-edit"></i>
                                            </a>
                                        <!--
                                            <a href="{{ url('tests/pdf/') }}/{{$comparticipation->id}}" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="{{ route('secure_comparticipation.edit',$comparticipation->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
                                        </a>
                                            -->
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
