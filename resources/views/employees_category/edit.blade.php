@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_employees_category') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_employees_category') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
					<h3 class="box-title">
						<a href="{{ url('employees_category') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							<i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
						</a>
					 <strong>{{ trans('adminlte_lang::message.update_employees_category') }} </strong><span>{{ $employees_category->name }}</span>
					</h3>

					<div class="pull-right box-tools">
						<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-employees_category">
							 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
						</a>

						<a href="#!" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-employees_category-button" style="display: none;">
							<i class="fa fa-edit"></i>  {{ trans('adminlte_lang::message.edit') }}
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($employees_category, ['method'=>'PATCH','route'=>['employees_category.update', $employees_category->id],'id'=>'employees_category-form','files'=>true])!!}
						@include('employees_category.form', ['type'=>'update'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
