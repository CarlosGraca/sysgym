@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.update_secure_agency') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.update_secure_agency') }}
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <strong>{{ trans('adminlte_lang::message.secure_agency') }}: </strong><span>{{ $agency->name }}</span>
                    </h3>

                    <div class="pull-right box-tools">
                        <a href="{{ url('secure_agency') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i>
                        </a>

                        <a href="{{ route('secure_agency.show',$agency->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
                            <i class="fa fa-address-card"></i>
                        </a>

                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-secure_agency">
                            <i class="fa fa-save"></i>
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-secure_agency-button"
                           style="display: none;">
                            <i class="fa fa-edit"></i>
                        </a>

                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::model($agency, ['method'=>'PATCH','route'=>['secure_agency.update', $agency->id],'id'=>'secure_agency-form','files'=>true])!!}
                         @include('secure_agency.form', ['type'=>'update'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection