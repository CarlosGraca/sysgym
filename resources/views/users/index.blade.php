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

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-users" class="table table-bordered table-striped table-design">
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
                                <tr>
                                    {{--<td>{{ $user->id }}</td>--}}
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td> </td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="{{ $user->id }}" data-product_name="{{ $user->id }}">
                                            <i class="fa fa-user-times"></i>
                                        </a>

                                        <a href="#" data-url="{{ url('reset/password') }}/{{$user->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Reset Password" id="user-reset-password">   <i class="fa fa-repeat"></i>
                                            </a>
									<!--
                                            <a href="{{ url('tests/pdf/') }}/{{$user->id}}" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
                                        </a>
                                            -->
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
