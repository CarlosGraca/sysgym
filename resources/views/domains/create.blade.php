@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Dominio
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  Novo
@endsection


@section('main-content')
    {{-- @include('layouts.shared.alert') --}}
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 
	              </h3>
	              
				  <div class="pull-right box-tools">
							<a href="{{ url('dominios') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Voltar">
								 <i class="fa  fa-arrow-left"></i>
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                {!! Form::open(['route'=>'dominios.store', 'id'=>'dominios-form','files'=>true]) !!}
	                    {{ csrf_field() }}
					    @include('adminlte::dominios.form', array('submitButtonText'=>'Gravar'))
					{!! Form::close() !!}
	            </div>
	        </div>
	    </div>
	</div>
@endsection
