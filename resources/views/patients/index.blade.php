@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.patients') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.patients') }}
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
	              <h3 class="box-title">  {{ trans('adminlte_lang::message.patients_list') }} </h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('patients/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_patient') }}">
						  <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_patient') }}
	                  </a>

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
								{!! Form::submit('Pesquisar', null , ['class'=>'form-control']) !!}
							</div>
						</div>

					</div>

	                <table id="table-patient" class="table table-hover table-design">
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
                          @foreach ($patients as $patient)
                                <tr class="bg-{{ $status_color[$patient->status] }} patient-row">
                                    {{--<td>{{$patient->id}}</td>--}}
									<td>{{$patient->name}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>{{$patient->mobile }} / {{ $patient->phone }}</td>
                                    <td>{{trans('adminlte_lang::message.'.$patient->genre)}}</td>
                                    <td>{{$patient->address }}</td>
                                    <td>
										<a href="{{ route('patients.show',$patient->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}">
                                            <i class="fa fa-eye"></i>
										</a>

										<a href="{{ route('patients.edit',$patient->id) }}" style="display: {{ $patient->status == 1 ? 'initial' :'none' }};" data-toggle="tooltip" id="update-patient" title="{{ trans('adminlte_lang::message.edit') }}" >
                                            <i class="fa fa-edit"></i>
										</a>

                                        <a href="#disable" style="display: {{ $patient->status == 1 ? 'initial' :'none' }};" data-toggle="tooltip" id="disable-patient" title="{{ trans('adminlte_lang::message.disable') }}" data-key="{{ $patient->id }}" data-name="{{ $patient->name }}">
                                            <i class="fa fa-user-o"></i>
                                        </a>

                                        <a href="#enable" style="display: {{ $patient->status == 0 ? 'initial' :'none' }};" data-toggle="tooltip" id="enable-patient" title="{{ trans('adminlte_lang::message.enable') }}" data-key="{{ $patient->id }}" data-name="{{ $patient->name }}">
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
