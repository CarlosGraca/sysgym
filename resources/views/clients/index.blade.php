@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('clients') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.clients') }}
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
	              <h3 class="box-title">  {{ trans('adminlte_lang::message.clients_list') }} </h3>
	              <div class="pull-left box-tools">
                      @can('add_client')
                          <a href="{{ url('clients/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_client') }}">
                              <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_client') }}
                          </a>
                    @endcan
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">

					<div class="row" style="display: none;">


						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="form-group form-group-sm">
								{!! Form::label('name',trans('adminlte_lang::message.name')) !!}
								{!! Form::text('name', null , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="form-group form-group-sm">
								{!! Form::label('email',trans('adminlte_lang::message.email') ) !!}
								{!! Form::email('email', null , ['class'=>'form-control']) !!}
							</div>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="form-group form-group-sm">
								{!! Form::label('add-matriculation_modality','ADD',['style'=>'visibility: hidden;'] ) !!}
								<a href="#!add-modality" class="btn btn-primary btn-sm" style="display: table;" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.search') }}" id="search-client">
									<i class="fa fa-search"></i> {{ trans('adminlte_lang::message.search') }}
								</a>
							</div>
						</div>

					</div>

	                <table id="table-client" class="table table-hover table-design">
		                <thead>
		                  <tr>
		                    {{--<th style="width: 10px" class="col-md-1">#</th>--}}
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.name') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.email') }}</th>
		                    <th class="col-md-2">{{ trans('adminlte_lang::message.contacts') }}</th>
                            <th class="col-md-1">{{ trans('adminlte_lang::message.genre') }}</th>
		                    <th class="col-md-3">{{ trans('adminlte_lang::message.address') }}</th>
		                    <th class="col-md-1"></th>
		                  </tr>
		                </thead>
		                <tbody>
                          @foreach ($clients as $client)
                                <tr class="bg-{{ $status_color[$client->status] }} client-row">
                                    {{--<td>{{$client->id}}</td>--}}
									<td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->mobile }} / {{ $client->phone }}</td>
                                    <td>{{trans('adminlte_lang::message.'.$client->genre)}}</td>
                                    <td>{{$client->address }}</td>
                                    <td>
                                        @can('view_client')
										<a href="{{ route('clients.show',$client->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}">
                                            <i class="fa fa-eye"></i>
										</a>
                                        @endcan

										@can('edit_client')
											<a href="{{ route('clients.edit',$client->id) }}" style="display: {{ $client->status == 1 ? 'initial' :'none' }};" data-toggle="tooltip" id="update-client" title="{{ trans('adminlte_lang::message.edit') }}" >
												<i class="fa fa-edit"></i>
											</a>
										@endcan

                                        @can('disable_client')
                                        <a href="#disable" style="display: {{ $client->status == 1 ? 'initial' :'none' }};" data-toggle="tooltip" id="disable-client" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $client->id }}" data-name="{{ $client->name }}">
                                            <i class="fa fa-user-o"></i>
                                        </a>
                                        @endcan


                                        @can('enable_client')
                                        <a href="#enable" style="display: {{ $client->status == 0 ? 'initial' :'none' }};" data-toggle="tooltip" id="enable-client" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $client->id }}" data-name="{{ $client->name }}">
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
