@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_permission') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_permission') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.permissions') }}: </strong><span>{{ $permission->name }}</span>
	              </h3>
					<div class="pull-right box-tools">
						<a href="{{ url('permissions') }}" class="btn btn-primary btn-sm" permission="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							<i class="fa  fa-arrow-left"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="update-permission">
							<i class="fa fa-save"></i>
						</a>

						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-permission-button" style="display: none;">
							<i class="fa fa-edit"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($permission, ['method'=>'PATCH','route'=>['permissions.update', $permission->id],'id'=>'permission-form','files'=>true])!!}
						@include('permissions.form', ['type'=>'update','permission'=>$permission])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
