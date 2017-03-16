@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.new_secure_agency') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.new_secure_agency') }}
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <strong>{{ trans('adminlte_lang::message.system_user') }}: </strong><span>{{ Auth::user()->name }}</span>
                    </h3>
                    <!--
                    <div class="pull-right box-tools">
                        <a href="#"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save">
                            <i class="fa fa-save"></i>
                        </a>
                    </div>
                    -->
                    <!-- /. tools -->

                    <div class="pull-right box-tools">
                        <a href="{{ url('secure_agency') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Voltar">
                            <i class="fa  fa-arrow-left"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-secure_agency">
                            <i class="fa fa-save"></i>
                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::open(['route'=>'secure_agency.store', 'id'=>'secure_agency-form','files'=>true]) !!}
                        @include('secure_agency.form', ['submitButtonText'=>'Save','type'=>'create'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection