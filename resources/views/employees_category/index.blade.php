@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.category') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.category') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
$status = [trans('adminlte_lang::message.inactive'),trans('adminlte_lang::message.active')];
$status_color = ['danger','success','info'];
?>
@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.category_list') }}</h3>
	              <div class="pull-left box-tools">
					  {{--@can('add_employee_category')--}}
						  <a href="{{ url('employees_category/create') }}" class="btn btn-primary btn-sm" category="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_category') }}">
							   <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_category') }}
						  </a>
					  {{--@endcan--}}

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-category" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-7">{{ trans('adminlte_lang::message.name') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.salary_base') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.status') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($categories as $category)
							  <tr class="bg-{{ $status_color[$category->status] }}">
								  {{--<td>{{ $category->id }}</td>--}}
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $Defaults->currency($category->salary_base) }}</td>
								  	<td><span class="label label-{{ $status_color[$category->status] }}">{{ $status[$category->status] }}</span></td>
								  <td>
										{{--@can('view_employee_category')--}}
										<a href="{{ route('employees_category.show',$category->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
											<i class="fa fa-eye"></i>
										</a>
										{{--@endcan--}}

										{{--@can('edit_employee_category')--}}
                                        @if($category->status == 1)
                                            <a href="{{ route('employees_category.edit',$category->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif
										{{--@endcan--}}

										{{--@can('disable_employee_category')--}}
										<a href="#disable" style="display: {{ $category->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-employees_category" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $category->id }}" data-name="{{ $category->name }}">
											<i class="fa fa-user-o"></i>
										</a>
										{{--@endcan--}}

										{{--@can('enable_employee_category')--}}
										<a href="#enable" style="display: {{ $category->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-employees_category" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $category->id }}" data-name="{{ $category->name }}">
											<i class="fa fa-user"></i>
										</a>
										{{--@endcan--}}
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
