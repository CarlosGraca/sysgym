@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_matriculation') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_matriculation') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
						<a href="{{ url('matriculation') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							<i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
						</a>
					 	<strong>{{ trans('adminlte_lang::message.matriculation') }} {{ trans('adminlte_lang::message.of') }} </strong><span>{{ $matriculation->client->name }}</span>
				  	</h3>

					<div class="pull-right box-tools">
						{{--@can('view_matriculation')--}}
						<a href="{{ route('matriculation.show',$matriculation->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
							<i class="fa  fa-eye"></i> {{ trans('adminlte_lang::message.view') }}
						</a>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-matriculation">
							 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
						</a>
						<a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-matriculation-button" style="display: none;">
							<i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
						</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($matriculation, ['method'=>'PATCH','route'=>['matriculation.update', $matriculation->id],'id'=>'matriculation-form','files'=>true])!!}
						@include('matriculation.form_edit')
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
