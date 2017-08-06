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
	        <div class="box box-primary">
				<div class="box-header with-border">

					<h3 class="box-title">{{ trans('adminlte_lang::message.account_details') }}</h3>

                    <div class="pull-right box-tools">
						@if(\Auth::user()->employee_id != 0)
							<a href="{{ route('employees.show',\Auth::user()->employee_id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}">
								<i class="fa fa-eye"></i> {{ trans('adminlte_lang::message.view_employee_profile') }}
							</a>
						@endif

                        <a href="{{ url('accounts/edit') }}" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>
					</div>


				</div>
	            <div class="box-body">

					<div class="row">
						<div class="col-lg-12">
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
                                    <i class="fa fa-user"></i>
									<b>{{ trans('adminlte_lang::message.name') }}: </b><a>{{Auth::user()->name}}</a>
								</li>

                                <li class="list-group-item">
                                    <i class="fa fa-address-card"></i>
                                    <b>{{ trans('adminlte_lang::message.username') }}: </b><a>{{Auth::user()->username}}</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-venus-mars"></i>  <b>{{ trans('adminlte_lang::message.genre') }}: </b>
                                    <a> {{trans('adminlte_lang::message.'.(\Auth::user()->genre == null ? 'none' : \Auth::user()->genre))}} </a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-envelope"></i>
                                    <b>{{ trans('adminlte_lang::message.email') }}: </b> <a>{{\Auth::user()->email}}</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-building"></i>
                                    <b>{{ trans('adminlte_lang::message.branch_default') }}: </b> <a>{{ \Auth::user()->branch_default_id != 0 ? \Auth::user()->branch_default->name : trans('adminlte_lang::message.none')}}</a>
                                </li>


                            <?php $role =  \Auth::user()->roles->first(); ?>
								<li class="list-group-item">
                                    <i class="fa fa-wrench"></i>
									<b>{{ trans('adminlte_lang::message.role') }}: </b> <a>{{ $role['name'] }}</a>
								</li>
								<li class="list-group-item">
                                    <i class="fa fa-calendar"></i>
									<b>{{ trans('adminlte_lang::message.created_account_date') }}: </b> <a>{{ \Carbon\Carbon::parse(\Auth::user()->created_at)->format('d/m/Y') }}</a>
								</li>
							</ul>
						</div>
					</div>

	        	</div>
	    </div>
	</div>
@endsection
