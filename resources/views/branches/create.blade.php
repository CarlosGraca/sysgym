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
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <strong>{{ trans('adminlte_lang::message.system_user') }}: </strong><span>{{ Auth::user()->name }}</span>
                    </h3>
                    <!-- /. tools -->

                    <div class="pull-right box-tools">

                        <a href="{{ url('branches') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-branch">
                            <i class="fa fa-save"></i>
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-branch-button"
                           style="display: none;">
                            <i class="fa fa-edit"></i>
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