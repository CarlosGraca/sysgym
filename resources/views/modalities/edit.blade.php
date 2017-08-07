@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_modality') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_modality') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
						<a href="{{ url('modalities') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							<i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
						</a>
					 	<strong>{{ trans('adminlte_lang::message.update_modality') }} </strong><span>{{ $modality->name }}</span>
				  	</h3>

					<div class="pull-right box-tools">

						<a href="{{ route('modalities.show',$modality->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
							<i class="fa  fa-eye"></i> {{ trans('adminlte_lang::message.view') }}
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-modality">
							 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-modality-button" style="display: none;">
							<i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($modality, ['method'=>'PATCH','route'=>['modalities.update', $modality->id],'id'=>'modality-form','files'=>true])!!}
						@include('modalities.form', ['type'=>'update','modality'=>$modality])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
