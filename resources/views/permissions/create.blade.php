@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_permission') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_permission') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        {!! Form::open(['route'=>'permissions.store', 'id'=>'permissions-form']) !!}
		        <div class="box box-default">
		            <div class="box-header with-border">
					  <h3 class="box-title">
						<a href="{{ url('permissions') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
									 <i class="fa  fa-arrow-left"></i>
								</a>
					  </h3>

						<div class="pull-right box-tools">						
                            <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" ><i class="fa fa-save"></i></button>
						</div><!-- /. tools -->
		            </div><!-- /.box-header -->

		            <div class="box-body">
						
					  
		                 	@include('permissions.form')
						
			  		</div>
	             </div>
	        {!! Form::close() !!}
	    </div>
	</div>
@endsection
