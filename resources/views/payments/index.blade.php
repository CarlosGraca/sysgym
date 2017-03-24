@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.consult_type') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.consult_type') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('consult_type/create') }}" data-url="{{ url('consult_type/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_consult_type') }}" id="add-consult_type-modal-older">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_consult_type') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-consult_type" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-8">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.price') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="consult_type_table">
                          @foreach ($consult_type as $type)
                                <tr data-key="{{ $type->id }}">
                                    {{--<td>{{ $type->id }}</td>--}}
                                    <td class="name">{{ $type->name }}</td>
                                    <td class="price">{{ $Defaults->currency($type->price) }}</td>
                                    <td>
                                        <a href="#"  data-toggle="tooltip" data-target="#confirmDelete" title="{{ trans('adminlte_lang::message.remove') }}" data-product_id="{{ $type->id }}" data-product_name="{{ $type->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="{{ route('consult_type.edit',$type->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-consult_type">   <i class="fa fa-edit"></i>
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
