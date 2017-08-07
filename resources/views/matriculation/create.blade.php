@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_matriculation') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_matriculation') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
					  <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
						  <i class="fa fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
					  </a>
	              	 <span>{{ trans('adminlte_lang::message.new_matriculation') }}</span>
	              </h3>
				<div class="pull-right box-tools">

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.reset') }}" id="reset-matriculation">
							<i class="fa fa-repeat"></i> {{ trans('adminlte_lang::message.reset') }}
						</a>

						<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="add-matriculation">
							 <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
						</a>

						{{--<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.public_matriculation') }}" id="publish-matriculation" data-key="" data-name="">--}}
							{{--<i class="fa fa-check"></i> {{ trans('adminlte_lang::message.back') }}--}}
						{{--</a>--}}
				</div><!-- /. tools -->

	            </div><!-- /.box-header -->

	            <div class="box-body">
					{!! Form::open(['route'=>'matriculation.store', 'id'=>'matriculation-form','files'=>true]) !!}
	                 	@include('matriculation.form', ['type'=>'create'])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection