@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.update_system') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.update_system') }}
@endsection
@inject('Defaults', 'App\Http\Controllers\Defaults')

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ url('system') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
                        </a>
                        <strong>{{ trans('adminlte_lang::message.update_system') }} </strong><span>{{ $system->name }}</span>
                    </h3>

                    <!-- /. tools -->

                    <div class="pull-right box-tools">

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-system">
                            <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
                        </a>
                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-system-button" style="display: none;">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::model($system, ['method'=>'PATCH','route'=>['system.update', $system->id],'id'=>'system-form','files'=>true])!!}
                         @include('system.form', ['type'=>'update','form'=>'system'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection