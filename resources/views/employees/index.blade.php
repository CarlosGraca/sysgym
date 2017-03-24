@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.employees') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.employees') }}
@endsection

@inject('EmployeeController', 'App\Http\Controllers\EmployeeController')
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"> {{ trans('adminlte_lang::message.employees_list') }}</h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('employees/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_employee') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_employee') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-employee" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
						  	<th class="col-md-2">{{ trans('adminlte_lang::message.category') }}</th>
						  	<th class="col-md-2">{{ trans('adminlte_lang::message.name') }}</th>
						  	<th class="col-md-2">{{ trans('adminlte_lang::message.email') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.contacts') }}</th>
                            <th class="col-md-1">{{ trans('adminlte_lang::message.genre') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.address') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($employees as $employee)
                                <tr class="bg-{{ $status_color[$employee->status] }}">
                                    {{--<td>{{$employee->id}}</td>--}}
									<td>{{$employee->category->name}}</td>
									<td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->mobile }} / {{ $employee->phone }}</td>
                                    <td>{{trans('adminlte_lang::message.'.$employee->genre)}}</td>
                                    <td>{{$employee->address }}</td>
                                    <td>
										<a href="{{ route('employees.show',$employee->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}" data-remote='false'])><i class="fa fa-eye"></i>
										</a>

										<a href="{{ route('employees.edit',$employee->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" >   <i class="fa fa-edit"></i>
                                            </a>
										@if(!$EmployeeController->UserAccountExist($employee->id))
											<a href="#" data-url="{{ url('build') }}/{{$employee->id}}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.build_user') }}" id="user-build"  >   <i class="fa fa-gears"></i>
											</a>
										@endif

										<a href="#disable" style="display: {{ $employee->status == 1 ? 'initial' :'none' }};" data-toggle="tooltip" id="disable-employee" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $employee->id }}" data-name="{{ $employee->name }}">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: {{ $employee->status == 0 ? 'initial' :'none' }};" data-toggle="tooltip" id="enable-employee" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $employee->id }}" data-name="{{ $employee->name }}">
											<i class="fa fa-user"></i>
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
