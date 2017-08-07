@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.update_company') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.update_company') }}
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ url('company') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
                        </a>
                        <span>{{ trans('adminlte_lang::message.update_company') }}</span>
                    </h3>

                    <div class="pull-right box-tools">
                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-company">
                            <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-company-button"
                           style="display: none;">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::model($company, ['method'=>'PATCH','route'=>['company.update', $company->id],'id'=>'company-form','files'=>true])!!}
                         @include('company.form', ['type'=>'update','form'=>'company'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection