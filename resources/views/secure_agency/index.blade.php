@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.secure_agency') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.secure_agency') }}
@endsection

<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.secure_agency_list') }}</h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('secure_agency/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_secure_agency') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_secure_agency') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-secure_agency" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-4">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.email') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.contacts') }}</th>
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.address') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($secure_agency as $agency)
                                <tr class="bg-{{$status_color[$agency->status]}}">
                                    {{--<td>{{$agency->id}}</td>--}}
                                    <td>{{$agency->name}}</td>
                                    <td>{{$agency->email}}</td>
                                    <td>{{$agency->phone }} / {{ $agency->fax }}</td>
                                    <td>{{$agency->address }}, {{$agency->city }}, {{$agency->island->name }}</td>
                                    <td>
										<a href="{{ route('secure_agency.show',$agency->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}" data-remote='false'><i class="fa fa-eye"></i>
										</a>

										<a href="{{ route('secure_agency.edit',$agency->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" data-remote='false'><i class="fa fa-edit"></i>
										</a>

										<a href="#remove" data-toggle="modal" data-target="#confirmDelete" title="{{ trans('adminlte_lang::message.disable') }}" data-product_id="{{ $agency->id }}" data-product_name="{{ $agency->id }}">
											<i class="fa fa-user-times"></i>
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
