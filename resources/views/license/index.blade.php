@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.license') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.license') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')

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
	              <div class="pull-left box-tools">
	                  <a href="{{ url('license/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_license') }}">
	                       <i class="fa fa-plus"></i>
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-license" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-4">{{ trans('adminlte_lang::message.license_to') }}</th>
							<th class="col-md-4">{{ trans('adminlte_lang::message.product_key') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.deadline') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.status') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($license as $key)
                                <tr class="bg-{{ $status_color[$key->status] }}">
                                    {{--<td>{{ $key->id }}</td>--}}
                                    <td>{{ $key->license_to }}</td>
									<td>{{ $key->product_key }}</td>
									<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $key->deadline)->format('d-m-Y') }}</td>
									<td style="text-align: center;"> <span class="label label-{{ $status_color[$key->status] }}"> {{ $status[$key->status] }} </span></td>
									<td>
                                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="{{ $key->id }}" data-product_name="{{ $key->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="{{ route('license.edit',$key->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Editar" data-remote='false'])>   <i class="fa fa-edit"></i>
                                            </a>
                                        <!--
                                            <a href="{{ url('tests/pdf/') }}/{{$key->id}}" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="{{ route('license.edit',$key->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
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
