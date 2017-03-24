@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_employee') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_employee') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.employee') }}: </strong><span>{{ $employee->name }}</span>
	              </h3>
					<div class="pull-right box-tools">
							<a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
								 <i class="fa  fa-arrow-left"></i>
							</a>

							<a href="{{ route('employees.show',$employee->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
								<i class="fa fa-address-card"></i>
							</a>

							<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-employee-button" style="display: none;">
								<i class="fa fa-edit"></i>
							</a>

							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="edit-employee">
								 <i class="fa fa-save"></i>
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($employee, ['method'=>'PATCH','route'=>['employees.update', $employee->id],'id'=>'employee-form','files'=>true])!!}
						@include('employees.form', ['type'=>'update','employee'=>$employee])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
