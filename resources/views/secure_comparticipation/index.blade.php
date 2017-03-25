@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.secure_comparticipation') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.secure_comparticipation') }}
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
	                  <a href="{{ url('secure_comparticipation/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_secure_comparticipation') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_secure_comparticipation') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-secure_comparticipation" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
							<th class="col-md-3">{{ trans('adminlte_lang::message.secure_agency') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.code') }}</th>
							<th class="col-md-3">{{ trans('adminlte_lang::message.consult_type') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.max_frequency') }}</th>
							<th class="col-md-1">{{ trans('adminlte_lang::message.deadline') }}</th>
							<th class="col-md-2">{{ trans('adminlte_lang::message.max_value') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($secure_comparticipation as $comparticipation)
                                <tr data-key="{{ $comparticipation->id }}" class="bg-{{ $status_color[$comparticipation->status] }}">
									{{--<td>{{ $comparticipation->id }}</td>--}}
									<td>{{ $comparticipation->secure_agency->name }}</td>
									<td>{{ $comparticipation->code }}</td>
									<td>{{ $comparticipation->procedure->name }}</td>
									<td>{{ $comparticipation->max_frequency }}</td>
									<td>{{ $comparticipation->deadline }}</td>
                                    <td>{{ $Defaults->currency($comparticipation->max_value) }}</td>
                                    <td>
										<a href="#disable" style="display: {{ $comparticipation->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-secure_comparticipation" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $comparticipation->id }}" data-name="{{ $comparticipation->name }}">
											<i class="fa fa-user-o"></i>
										</a>

										<a href="#enable" style="display: {{ $comparticipation->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-secure_comparticipation" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $comparticipation->id }}" data-name="{{ $comparticipation->name }}">
											<i class="fa fa-user"></i>
										</a>
										<a href="{{ route('secure_comparticipation.edit',$comparticipation->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="update-secure_comparticipation">
											<i class="fa fa-edit"></i>
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
