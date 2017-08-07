@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.users') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.users') }}
@endsection

<?php
$status = [trans('adminlte_lang::message.inactive'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.user_list') }} </h3>

					<div class="pull-left box-tools">
						@can('add_user')
							<a href="{{ url('users/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_user') }}">
								<i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_user') }}
							</a>
						@endcan
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-users" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
							  <th class="col-md-4">{{ trans('adminlte_lang::message.name') }}</th>
							  <th class="col-md-3">{{ trans('adminlte_lang::message.email') }}</th>
							  <th class="col-md-3">{{ trans('adminlte_lang::message.role') }}</th>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.status') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($users as $user)
                                <tr class="bg-{{ $status_color[$user->status] }} ">
                                    {{--<td>{{ $user->id }}</td>--}}
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td> {{ $user->role->display_name }} </td>
									<td><span class="label label-{{ $status_color[$user->status] }}">{{ $status[$user->status] }}</span></td>
									<td>
										{{--@can('view_user')--}}
										<a href="{{ route('users.show',$user->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
											<i class="fa fa-eye"></i>
										</a>
										{{--@endcan--}}
										{{--@can('edit_user')--}}
										<a href="{{ route('users.edit',$user->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-user">
											<i class="fa fa-edit"></i>
										</a>
										{{--@endcan--}}
										{{--@can('disable_user')--}}
												@if(\Auth::user()->id != $user->id)
													<a href="#disable" style="display: {{ $user->status == 1 ? 'initial' :'none' }};  color: #999;" data-toggle="tooltip" id="disable-user" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $user->id }}" data-name="{{ $user->name }}">
														<i class="fa fa-user-secret"></i>
													</a>
												@endif
										{{--@endcan--}}

										{{--@can('enable_user')--}}
										<a href="#enable" style="display: {{ $user->status == 0 ? 'initial' :'none' }};  color: #00a65a;" data-toggle="tooltip" id="enable-user" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $user->id }}" data-name="{{ $user->name }}">
											<i class="fa fa-user-secret"></i>
										</a>
										{{--@endcan--}}

										{{--@can('reset_user_password')--}}
											@if(\Auth::user()->id != $user->id)
												<a href="#" data-url="{{ url('reset/password') }}/{{$user->id}}"  style="color: #dd4b39"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.reset_password') }}" id="user-reset-password">
													<i class="fa fa-repeat"></i>
												</a>
											@endif
										{{--@endcan--}}

                                    </td>
                                </tr>
                            @endforeach
		                <tbody>
                    </table>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
