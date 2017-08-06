@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_menu') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_menu') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  <h3 class="box-title">
					  <a href="{{ url('menus') }}" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
						  <i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
					  </a>
					  <span>{{ trans('adminlte_lang::message.new_menu') }}</span>
				  </h3>

					<div class="pull-right box-tools">

							<a href="#" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="add-menu">
								 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					{!! Form::open(['route'=>'menus.store', 'id'=>'menu-form','files'=>true]) !!}
	                 	@include('menus.form', ['type'=>'create'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
