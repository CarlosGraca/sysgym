@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.roles') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.roles') }}
@endsection

<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.role_list') }}</h3>
	              <div class="pull-left box-tools">
					 {{--  @can('add_role') --}}
						  <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_role') }}">
							   <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_role') }}
						  </a>
					  {{-- @endcan --}}

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-roles" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-8">{{ trans('adminlte_lang::message.description') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="roles_table">
                          @foreach ($roles as $role)
							  <tr data-key="{{ $role->id }}" class="bg-{{-- {{ $status_color[$role->status] }} --}}">
							  {{--<td>{{ $role->id }}</td>--}}
                                    <td class="name">{{ $role->name }}</td>
                                    <td class="price">{{ $role->display_name	 }}</td>
                                    <td>
										@can('view_role')
											<a href="{{ route('roles.show',$role->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
												<i class="fa fa-eye"></i>
											</a>
										@endcan

										@can('edit_role')
											<a href="{{ route('roles.edit',$role->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-role">
												<i class="fa fa-edit"></i>
											</a>
										@endcan

										@can('disable_role')
										<a href="#disable" style="display: {{ $role->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-role" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $role->id }}" data-name="{{ $role->name }}">
											<i class="fa fa-user-o"></i>
										</a>
										@endcan

										@can('enable_role')
										<a href="#enable" style="display: {{ $role->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-role" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $role->id }}" data-name="{{ $role->name }}">
											<i class="fa fa-user"></i>
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
