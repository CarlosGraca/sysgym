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


@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('branches/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_branch') }}">
	                       <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_branch') }}
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-branches" class="table table-bordered table-striped table-design">
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
                                <tr>
                                    {{--<td>{{$branch->id}}</td>--}}
                                    <td>{{$branch->name}}</td>
                                    <td>{{$branch->email}}</td>
                                    <td>{{$branch->phone }} / {{ $branch->fax }}</td>
                                    <td>{{$branch->address }}, {{$branch->city }}, {{$branch->island->name }}</td>
                                    <td>
										<a href="{{ route('branches.show',$branch->id) }}"  role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
											<i class="fa fa-eye"></i>
										</a>
										<a href="{{ route('branches.edit',$branch->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" data-remote='false'>   <i class="fa fa-edit"></i>
										</a>
										<a href="#!remove"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.remove') }}" data-remote='false' data-target="#confirmDelete" data-product_id="{{ $branch->id }}" data-product_name="{{ $branch->id }}">   <i class="fa fa-trash"></i>
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
