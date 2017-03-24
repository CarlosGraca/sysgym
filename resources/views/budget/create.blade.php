@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_budget') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_budget') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.system_user') }}: </strong><span>{{ Auth::user()->name }}</span>
	              </h3>
				<div class="pull-right box-tools">
						<a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							 <i class="fa fa-arrow-left"></i>
						</a>

						<a href="#" data-url="{{ url('patients/create') }}" data-title="{{ trans('adminlte_lang::message.new_patient') }}" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_patient') }}" id="tool_bar_button_patients">
							<i class="fa fa-user-plus"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.reset') }}" id="reset-budget">
							<i class="fa fa-repeat"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="save-budget">
							 <i class="fa fa-save"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.end_budget') }}" id="end-budget">
							<i class="fa fa-check"></i>
						</a>
				</div><!-- /. tools -->

	            </div><!-- /.box-header -->

	            <div class="box-body">
					{!! Form::open(['route'=>'budget.store', 'id'=>'budget-form','files'=>true]) !!}
	                 	@include('budget.form', ['type'=>'create'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection