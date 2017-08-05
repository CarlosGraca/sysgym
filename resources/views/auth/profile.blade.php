@extends('layouts.app')

@section('htmlheader_title')
	Profile
@endsection

@section('contentheader_title')
	{{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
	{{ trans('adminlte_lang::message.my_profile') }}
@endsection


@section('main-content')
     @include('layouts.shared.alert')
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<div class="text-center">
						<img class="avatar thumbnail" src="{{ asset(Auth::user()->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
						<h3 class="profile-username text-center user-name">{{  Auth::user()->name }}</h3>
					</div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

		</div>
	    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
	        <div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">{{ trans('adminlte_lang::message.user_profile') }}</h3>
					<div class="pull-right box-tools">
						@if(\Auth::user()->employee_id != 0)
							<a href="{{ route('employees.show',\Auth::user()->employee_id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}">
								{{ trans('adminlte_lang::message.view_profile') }} <i class="fa fa-address-card"></i>
							</a>
						@endif
					</div>
				</div>
	            <div class="box-body">
	                <div class="nav-tabs-custom">
					    <ul class="nav nav-tabs">
					        <li class="active">
					             <a href="#profile" data-toggle="tab"><i class="fa fa-user"></i> My Profile</a>
					        </li>
					        <li>
					            <a href="#password" data-toggle="tab"><i class="fa fa-key"></i> Reset Password</a>
					        </li>
					     </ul>
					     <div class="tab-content">
					        <!-- profile -->
					        <div class="tab-pane active" id="profile">
					            <div class="row">
					        		<div class="col-lg-12">
					        			<ul class="list-group list-group-unbordered">
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.name') }}: </b><span class="user-name">{{Auth::user()->name}}</span> <a href="#" id='user-name' title='Edit'> <i class="fa fa-pencil"></i> </a>
						                    </li>
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.email') }}: </b>{{\Auth::user()->email}}
												{{--<a href="#" id='user-email'>  <i class="fa fa-pencil"></i> </a>--}}
						                    </li>
											<?php $role =  \Auth::user()->roles->first(); ?>
											<li class="list-group-item">
												<b>{{ trans('adminlte_lang::message.role') }}: </b>{{ $role['name'] }}
											</li>
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.create_date') }}: </b> {{ \Carbon\Carbon::parse(\Auth::user()->created_at)->format('d/m/Y') }}
						                    </li>
						                </ul>
					        		</div>
					        	</div>
							</div>
							 <!-- Reset Password -->
					        <div class="tab-pane " id="password">
					            <form action="{{ url('auth/password/reset') }}" method="post" class="form-horizontal">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group has-feedback">
					                     <label for="old_password" class="col-sm-2 control-label">Current  Password *</label>
					                     <div class="col-sm-10">
						                    <input type="password" class="form-control" placeholder="Current  Password" id="old_password" name="old_password"  />
						                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					                    </div>
					                </div>
					                <div class="form-group has-feedback">
					                     <label for="password" class="col-sm-2 control-label">Password *</label>
					                     <div class="col-sm-10">
						                    <input type="password" class="form-control" placeholder="Password" id="password" name="password"/>
						                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					                    </div>
					                </div>

					                <div class="form-group has-feedback">
					                    <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password *</label>
					                    <div class="col-sm-10">
						                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"/>
						                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
						                 </div>
					                </div>

					                <div class="row">
					                    <div class="col-xs-2">
					                    </div><!-- /.col -->
					                    <div class="col-xs-8">
					                        <button type="submit" class="btn btn-primary ">{{ trans('adminlte_lang::message.passwordreset') }}</button>
					                    </div><!-- /.col -->
					                    <div class="col-xs-2">
					                    </div><!-- /.col -->
					                </div>
					            </form>
							</div>
						</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
