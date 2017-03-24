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

@inject('CategoryController', 'App\Http\Controllers\CategoryController')
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-users" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
							  <th class="col-md-4">{{ trans('adminlte_lang::message.name') }}</th>
							  <th class="col-md-4">{{ trans('adminlte_lang::message.email') }}</th>
							  <th class="col-md-3">{{ trans('adminlte_lang::message.role') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($users as $user)
                                <tr class="bg-{{ $status_color[$user->status] }} ">
                                    {{--<td>{{ $user->id }}</td>--}}
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td> </td>
                                    <td>
										<a href="#disable" style="display: {{ $user->status == 1 ? 'initial' :'none' }};" data-toggle="tooltip" id="disable-user" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $user->id }}" data-name="{{ $user->name }}">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: {{ $user->status == 0 ? 'initial' :'none' }};" data-toggle="tooltip" id="enable-user" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $user->id }}" data-name="{{ $user->name }}">
											<i class="fa fa-user"></i>
										</a>

                                        <a href="#" data-url="{{ url('reset/password') }}/{{$user->id}}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.reset_password') }}" id="user-reset-password">
                                            <i class="fa fa-repeat"></i>
                                        </a>
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
