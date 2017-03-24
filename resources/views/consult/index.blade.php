@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.consult_agenda') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.consult_agenda') }}
@endsection

@inject('CategoryController', 'App\Http\Controllers\CategoryController')

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('consult_type/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_test') }}">
	                       <i class="fa fa-plus"></i>
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-consult_agenda" class="table table-bordered table-striped table-design">

		                <thead>
		                  <tr>
							<th class="col-md-1">{{ trans('adminlte_lang::message.date') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.time') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.consult_type') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.patient') }}</th>
							<th class="col-md-3">{{ trans('adminlte_lang::message.contacts') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.doctor') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($consult_agenda as $agenda)
                                <tr>
									<td>{{ $agenda->date }}</td>
									<td>{{ $agenda->starttime }} - {{ $agenda->endtime }}</td>
									<td>{{ $agenda->type }}</td>
									<td>{{ $agenda->patient }}</td>
									<td>{{ $agenda->mobile }} / {{ $agenda->phone }} / {{ $agenda->email }}</td>
									<td>{{ $agenda->doctor }}</td>

                                    <td>
                                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="{{ $agenda->id }}" data-product_name="{{ $agenda->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="{{ route('consult_agenda.edit',$agenda->id) }}"  data-toggle="modal" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Editar" data-remote='true'])>   <i class="fa fa-edit"></i>
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
