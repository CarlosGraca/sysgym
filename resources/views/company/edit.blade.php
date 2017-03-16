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
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <strong>{{ trans('adminlte_lang::message.company') }}: </strong><span>{{ $company->name }}</span>
                    </h3>

                    <div class="pull-right box-tools">
                        <a href="{{ url('company') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i>
                        </a>
                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="edit-company">
                            <i class="fa fa-save"></i>
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-company-button"
                           style="display: none;">
                            <i class="fa fa-edit"></i>
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