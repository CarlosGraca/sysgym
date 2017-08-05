@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_user') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_user') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.user') }}: </strong><span>{{ $user->name }}</span>
	              </h3>
					<div class="pull-right box-tools">
						<a href="{{ url('users') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							 <i class="fa  fa-arrow-left"></i>
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-user">
							 <i class="fa fa-save"></i>
						</a>

						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-user-button" style="display: none;">
							<i class="fa fa-edit"></i>
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($user, ['method'=>'PATCH','route'=>['users.update', $user->id],'id'=>'user-form','files'=>true])!!}
						@include('users.form', ['type'=>'update','user'=>$user])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
