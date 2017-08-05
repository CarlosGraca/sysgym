@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.branches') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.branches') }}
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
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
					  @can('add_branch')
						  <a href="{{ url('branches/create') }}" class="btn btn-primary btn-sm" branch="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_branch') }}">
							   <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_branch') }}
						  </a>
					  @endcan
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-branches" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.email') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.contacts') }}</th>
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.address') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($branches as $branch)
                                <tr class="bg-{{$status_color[$branch->status]}}">
                                    {{--<td>{{$branch->id}}</td>--}}
                                    <td>{{$branch->name}}</td>
                                    <td>{{$branch->email}}</td>
                                    <td>{{$branch->phone }} / {{ $branch->fax }}</td>
                                    <td>{{$branch->address }}, {{$branch->city }}, {{$branch->island->name }}</td>
                                    <td>
										@can('view_branch')
										<a href="{{ route('branches.show',$branch->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}">
											<i class="fa fa-eye"></i>
										</a>
										@endcan

										@can('edit_branch')
											<a href="{{ route('branches.edit',$branch->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-branch">
												<i class="fa fa-edit"></i>
											</a>
										@endcan										
										@can('disable_branch')
										<a href="#disable" style="display: {{ $branch->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-branch" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $branch->id }}" data-name="{{ $branch->name }}">
											<i class="fa fa-user-o"></i>
										</a>
										@endcan

										@can('enable_branch')
										<a href="#enable" style="display: {{ $branch->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-branch" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $branch->id }}" data-name="{{ $branch->name }}">
											<i class="fa fa-user"></i>
										</a>
										@endcan
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
