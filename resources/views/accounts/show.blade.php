@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.users') }}
@endsection

@section('contentheader_title')
	{{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
	{{ trans('adminlte_lang::message.user') }}
@endsection


@section('main-content')
     @include('layouts.shared.alert')
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<div class="text-center">
						<img class="thumbnail" src="{{ asset($user->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
						<h3 class="profile-username text-center user-name">{{  $user->name }}</h3>
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
						<a href="{{ url('users') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.user_list') }}">
							<i class="fa fa-list"></i>
						</a>
						@if($user->employee_id != 0)
							@can('view_employee')
							<a href="{{ route('employees.show',$user->employee_id) }}" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}">
								<i class="fa fa-user-md"></i>
							</a>
							@endcan
						@endif

						@can('edit_user')
							<a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
								<i class="fa fa-edit"></i>
							</a>
						@endcan

					</div>
				</div>
	            <div class="box-body">
	                <div class="nav-tabs-custom">
					    <ul class="nav nav-tabs">
					        <li class="active">
					             <a href="#profile" data-toggle="tab"><i class="fa fa-address-card-o"></i> {{ trans('adminlte_lang::message.personal_data') }} </a>
					        </li>
					        <li>
					            <a href="#permission" data-toggle="tab"><i class="fa fa-key"></i> {{ trans('adminlte_lang::message.permissions') }}</a>
					        </li>
					     </ul>
					     <div class="tab-content">
					        <!-- profile -->
					        <div class="tab-pane active" id="profile">
					            <div class="row">
					        		<div class="col-lg-12">
					        			<ul class="list-group list-group-unbordered">
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.name') }}: </b><span class="user-name">{{ $user->name }}</span>
						                    </li>
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.email') }}: </b>{{$user->email}}
						                    </li>
											<?php $role =  $user->roles->first(); ?>
											<li class="list-group-item">
												<b>{{ trans('adminlte_lang::message.role') }}: </b>{{ $role['name'] }}
											</li>
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.create_date') }}: </b> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
						                    </li>
						                </ul>
					        		</div>
					        	</div>
							</div>
							 <!-- Reset Password -->
					        <div class="tab-pane " id="permission">
								<table id="table-documents" class="table table-bordered table-striped table-design">
									<thead>
										<tr>
											<th class="col-md-2">{{ trans('adminlte_lang::message.name') }}</th>
											<th class="col-md-10">{{ trans('adminlte_lang::message.description') }}</th>
										</tr>
									</thead>
									<tbody>
									@foreach ($role->permission as $permission)
										<tr>
											<td class="name">{{$permission->name}} </td>
											<td class="description">{{$permission->label}} </td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
