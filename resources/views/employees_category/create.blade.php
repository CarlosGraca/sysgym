@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_category') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_category') }}
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
	              	 <span>{{ trans('adminlte_lang::message.new_employee_category') }} </span>
	              </h3>
					<div class="pull-right box-tools">
						<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="add-employees_category">
							 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					{!! Form::open(['route'=>'employees_category.store', 'id'=>'employees_category-form','files'=>true]) !!}
	                 	@include('employees_category.form', ['type'=>'create'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
