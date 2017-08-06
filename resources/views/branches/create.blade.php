@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.new_branch') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.new_branch') }}
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ url('branches') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
                        </a> <span> {{ trans('adminlte_lang::message.new_branch') }}</span>
                    </h3>
                    <!-- /. tools -->

                    <div class="pull-right box-tools">
                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="add-branch">
                            <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-branch-button"
                           style="display: none;">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::open(['route'=>'branches.store', 'id'=>'branches-form','files'=>true]) !!}
                        @include('branches.form', ['type'=>'create'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection