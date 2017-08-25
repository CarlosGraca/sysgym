@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.menus') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.menus') }}
@endsection

<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


 @section('main-content')

 
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.menu_list') }}</h3>
	              <div class="pull-left box-tools">
					  {{--@can('add_menu')--}}
						  <a href="{{ url('menus/create') }}" class="btn btn-primary btn-sm" menu="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_menu') }}">
							   <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_menu') }}
						  </a>
					  {{--@endcan--}}

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
                    <!-- <div class="table-responsive"> -->
    	                <table id="table-menus" class="table-design display" cellspacing="0" width="100%">
    		                <thead>
    		                  <tr>
    							<th >{{ trans('adminlte_lang::message.title') }}</th>
    							<th >{{ trans('adminlte_lang::message.url') }}</th>
    							<th >{{ trans('adminlte_lang::message.icon') }}</th>
                                <th >{{trans('adminlte_lang::message.menu_order')}}</th>
    							<th>{{ trans('adminlte_lang::message.status') }}</th>
    							<th ></th>
    		                  </tr>
    		                </thead>
    		                <tbody class="menus_table">
                              @foreach ($menus as $menu)
    							  <tr class="bg-{{ $status_color[$menu->status] }}">
                                        <td>{{ $menu->title }}</td>
                                        <td>{{ $menu->url }}</td>
    									<td class="text-center"><i class="{{ $menu->icon }}"></i></td>
                                        <td>{!! $menu->menu_order !!}</td>
    								  	<td><span class="label label-{{ $status_color[$menu->status] }}">{{ $status[$menu->status] }}</span></td>
    								   <td>
                                            <a href="{{ route('tenant-menu.create','id='.$menu->id) }}" , data-remote='false' data-toggle="tooltip" title="{{ trans('adminlte_lang::message.associate_tenant') }}">      <i class="fa fa-snowflake-o"></i>
                                            </a> 
    											<a href="{{ route('menus.show',$menu->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
    												<i class="fa fa-eye"></i>
    											</a>
    											<a href="{{ route('menus.edit',$menu->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-menu">
    												<i class="fa fa-edit"></i>
    											</a>
    										<a href="#disable" style="display: {{ $menu->status == 1 ? 'initial' : 'none' }};  color: #dd4b39;" data-toggle="tooltip" id="disable-menu" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $menu->id }}" data-name="{{ $menu->name }}">
    											<i class="fa fa-key"></i>
    										</a>
    										<a href="#enable" style="display: {{ $menu->status == 0 ? 'initial' : 'none' }};  color: #00a65a;" data-toggle="tooltip" id="enable-menu" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $menu->id }}" data-name="{{ $menu->name }}">
    											<i class="fa fa-key"></i>
    										</a>
                                        </td>
                                    </tr>
                                @endforeach
    		                <tbody>
                        </table>
                    <!-- </div> -->
	            </div>
	        </div>
	    </div>
	</div>
@endsection
