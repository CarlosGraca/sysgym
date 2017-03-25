@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.teeth') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.teeth') }}
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
	              <h3 class="box-title"> {{ trans('adminlte_lang::message.list_teeth') }} </h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('teeth/create') }}" data-url="{{ url('teeth/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_teeth') }}" id="add-teeth-modal-older">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_teeth') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-teeth" class="table table-hover table-design">
		                <thead>
		                  <tr>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.teeth') }}</th>
							  <th class="col-md-1">{{ trans('adminlte_lang::message.number') }}</th>
							  <th class="col-md-9">{{ trans('adminlte_lang::message.name') }}</th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="teeth_table">
                          @foreach ($teeth as $type)
                                <tr data-key="{{ $type->id }}" class="bg-{{ $status_color[$type->status] }}">
                                    <td class="text-center" > <img src="{{ asset($type->avatar) }}" alt=""> </td>
                                    <td class="text-center" >{{ $type->number }}</td>
									<td>{{ $type->name }}</td>
									<td class="text-center">
                                        <a href="#disable" style="display: {{ $type->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-teeth" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $type->id }}" data-name="{{ $type->name }}">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: {{ $type->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-teeth" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $type->id }}" data-name="{{ $type->name }}">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="{{ route('teeth.edit',$type->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="update-teeth">
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
