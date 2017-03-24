@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_patient') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_patient') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.patient') }}: </strong><span>{{ $patient->name }}</span>
	              </h3>
                    <div class="pull-right box-tools">
                            <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                                 <i class="fa  fa-arrow-left"></i>
                            </a>

                            <a href="{{ route('patients.show',$patient->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="#!edit" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-patient-button" style="display: none;">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#!save" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="edit-patient">
                                 <i class="fa fa-save"></i>
                            </a>
                    </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($patient, ['method'=>'PATCH','route'=>['patients.update', $patient->id],'id'=>'patient-form','files'=>true])!!}
						@include('patients.form', ['type'=>'update','patient'=>$patient])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
