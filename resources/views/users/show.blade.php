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
							<i class="fa fa-list"></i> {{ trans('adminlte_lang::message.user_list') }}
						</a>
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
						                      <b>{{ trans('adminlte_lang::message.name') }}: </b><a>{{ $user->name }}</a>
						                    </li>
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.email') }}: </b><a>{{$user->email}}</a>
						                    </li>
											<li class="list-group-item">
												<b>{{ trans('adminlte_lang::message.role') }}: </b> <a>{{ $user->role->display_name}}</a>
											</li>
						                    <li class="list-group-item">
						                      <b>{{ trans('adminlte_lang::message.create_date') }}: </b> <a>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</a>
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
											<th class="col-md-2">{{ trans('adminlte_lang::message.type') }}</th>
											<th class="col-md-10">{{ trans('adminlte_lang::message.name') }}</th>
										</tr>
									</thead>
									<tbody>
									{{--{{$user->role->permission}}--}}
									@foreach ($user->role->permission as $permission)
										<tr>
											<td>{{$permission->type}} </td>
											<td>{{$permission->tenant_menu->menus->title}} </td>
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
