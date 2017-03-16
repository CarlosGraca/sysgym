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

	                <table id="table-patient" class="table table-bordered table-striped table-design">
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
                                <tr>
                                    {{--<td>{{$patient->id}}</td>--}}
									<td>{{$patient->name}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>{{$patient->mobile }} / {{ $patient->phone }}</td>
                                    <td>{{trans('adminlte_lang::message.'.$patient->genre)}}</td>
                                    <td>{{$patient->address }}</td>
                                    <td>
										<a href="{{ route('patients.show',$patient->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}" data-remote='false'><i class="fa fa-eye"></i>
										</a>

										<a href="{{ route('patients.edit',$patient->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" data-remote='false'><i class="fa fa-edit"></i>
										</a>

                                        <a href="#remove" data-toggle="modal" data-target="#confirmDelete" title="{{ trans('adminlte_lang::message.disable') }}" data-product_id="{{ $patient->id }}" data-product_name="{{ $patient->id }}">
                                            <i class="fa fa-user-times"></i>
                                        </a>

                                        <!--
                                            <a href="{{ url('tests/pdf/') }}/{{$patient->id}}" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Pdf" ])>   <i class="fa fa-file-pdf-o"></i>
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
