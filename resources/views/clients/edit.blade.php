@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_client') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_client') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.client') }}: </strong><span>{{ $client->name }}</span>
	              </h3>
                    <div class="pull-right box-tools">
                            <a href="{{ url('clients') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                                 <i class="fa  fa-arrow-left"></i>
                            </a>

                            <a href="{{ route('clients.show',$client->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="#!edit" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-client-button" style="display: none;">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#!save" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="edit-client">
                                 <i class="fa fa-save"></i>
                            </a>
                    </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($client, ['method'=>'PATCH','route'=>['clients.update', $client->id],'id'=>'client-form','files'=>true])!!}
						@include('clients.form', ['type'=>'update','client'=>$client])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
