@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.category') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.category') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')

@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.category_list') }}</h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('category/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_category') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_category') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-category" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-8">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.salary_base') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($categories as $category)
                                <tr>
                                    {{--<td>{{ $category->id }}</td>--}}
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $Defaults->currency($category->salary_base) }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-toggle="tooltip" title="Delete" data-product_id="{{ $category->id }}" data-product_name="{{ $category->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Editar" data-remote='false'])>   <i class="fa fa-edit"></i>
                                            </a>
                                        <!--
                                            <a href="{{ url('tests/pdf/') }}/{{$category->id}}" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Email" data-remote='true'])>   <i class="fa fa-send"></i>
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
