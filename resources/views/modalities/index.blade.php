@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.modality') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.modality') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
$status_color = ['danger','success','info'];
?>


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"> {{ trans('adminlte_lang::message.list_modality') }} </h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('modalities/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_modality') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_modality') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-modality" class="table table-hover table-design">
		                <thead>
		                  <tr>
							  <th class="col-md-7">{{ trans('adminlte_lang::message.name') }}</th>
							  <th class="col-md-3 text-center">{{ trans('adminlte_lang::message.price') }}</th>
							  <th class="col-md-1 text-center">{{ trans('adminlte_lang::message.status') }}</th>
							  <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody class="modality_table">
                          @foreach ($modalities as $modality)
                                <tr data-key="{{ $modality->id }}" class="bg-{{ $status_color[$modality->status] }}">
                                    <td>{{ $modality->name }}</td>
									<td class="text-center">{{ $Defaults->currency($modality->price) }}</td>
									<td><span class="label label-{{ $status_color[$modality->status] }}">{{ $status[$modality->status] }}</span></td>
									<td class="text-center">
										<a href="{{ route('modalities.show',$modality->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
											<i class="fa fa-eye"></i>
										</a>
										<a href="{{ route('modalities.edit',$modality->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
											<i class="fa fa-edit"></i>
										</a>
                                        <a href="#disable" style="display: {{ $modality->status == 1 ? 'initial' : 'none' }};" data-toggle="tooltip" id="disable-modality" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $modality->id }}" data-name="{{ $modality->name }}">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: {{ $modality->status == 0 ? 'initial' : 'none' }};" data-toggle="tooltip" id="enable-modality" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $modality->id }}" data-name="{{ $modality->name }}">
                                            <i class="fa fa-user"></i>
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
