@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.permissions') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.permissions') }}
@endsection

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.permission_list') }}</h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('permissions/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_permission') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_permission') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-permissions" class="table table-bordered table-striped table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-8">{{ trans('adminlte_lang::message.description') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="permissions_table">
                          @foreach ($permissions as $permission)
                                <tr data-key="{{ $permission->id }}">
                                    {{--<td>{{ $permission->id }}</td>--}}
                                    <td class="name">{{ $permission->name }}</td>
                                    <td class="price">{{ $permission->label }}</td>
                                    <td>
										<a href="#disable" style="display: {{ $permission->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-permission" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $permission->id }}" data-name="{{ $permission->name }}">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: {{ $permission->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-permission" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $permission->id }}" data-name="{{ $permission->name }}">
											<i class="fa fa-user"></i>
										</a>
										<a href="{{ route('permissions.edit',$permission->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
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
