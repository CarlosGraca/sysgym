@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.edit_account') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.edit_account') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
					<div class="pull-left box-title">
						<a href="{{ url('accounts')  }}" class="btn btn-primary btn-sm pull-left" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							<i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
						</a>
					</div><!-- /. tools -->
	              <h3 class="box-title"  style="margin:5px;">
	              	 <span>{{ trans('adminlte_lang::message.edit_account') }}</span>
	              </h3>

	            </div><!-- /.box-header -->
	            <div class="box-body">

					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#profile" data-toggle="tab">{{ trans('adminlte_lang::message.edit_profile') }}</a>
							</li>
							<li>
								<a href="#password" data-toggle="tab">{{ trans('adminlte_lang::message.change_password') }}</a>
							</li>
							<li>
								<a href="#settings" data-toggle="tab">{{ trans('adminlte_lang::message.settings') }}</a>
							</li>
						</ul>
						<div class="tab-content">

							<!-- profile -->
							<div class="tab-pane active" id="profile">


								{!! Form::model($user, ['method'=>'POST','route'=>['accounts.update_profile'],'id'=>'profile-form','files'=>true])!!}
									@include('accounts.form', ['type'=>'update'])
								{!! Form::close() !!}

								<div class="row">
									<div class="col-lg-12">
										<div class="pull-right box-tools">

											<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save_change') }}" id="update-accounts-profile">
												<i class="fa fa-save"></i>  {{ trans('adminlte_lang::message.save_change') }}
											</a>

											<a href="#!" class="btn btn-primary btn-sm"data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-accounts-profile-button" style="display: none;">
												<i class="fa fa-edit"></i>  {{ trans('adminlte_lang::message.edit') }}
											</a>
										</div><!-- /. tools -->
									</div>

								</div>

							</div>

							<div class="tab-pane" id="password">
								{!! Form::model($user, ['method'=>'POST','route'=>['accounts.password_change'],'id'=>'password-form','files'=>true])!!}
									@include('accounts.password_form')
								{!! Form::close() !!}
							</div>

							<div class="tab-pane" id="settings">
								{!! Form::model($user, ['method'=>'POST','route'=>['accounts.setting'],'id'=>'setting-form','files'=>true])!!}
									@include('accounts.setting_form', ['type'=>'update'])
								{!! Form::close() !!}

								<div class="row">
									<div class="col-lg-12">
										<div class="pull-right box-tools">

											<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save_change') }}" id="update-accounts-setting">
												<i class="fa fa-save"></i>  {{ trans('adminlte_lang::message.save_change') }}
											</a>

											<a href="#!" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-accounts-setting-button" style="display: none;">
												<i class="fa fa-edit"></i>  {{ trans('adminlte_lang::message.edit') }}
											</a>
										</div><!-- /. tools -->
									</div>

								</div>
							</div>

						</div>
					</div>

				</div>
	        </div>
	    </div>
	</div>
@endsection
