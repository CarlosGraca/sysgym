@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.update_branch') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.update_branch') }}
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <strong>{{ trans('adminlte_lang::message.branches') }}: </strong><span>{{ $branch->name }}</span>
                    </h3>

                    <div class="pull-right box-tools">
                        <a href="{{ url('branches') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i>
                        </a>

                        <a href="{{ route('branches.show',$branch->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
                            <i class="fa fa-address-card"></i>
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="edit-branch">
                            <i class="fa fa-save"></i>
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-branch-button"
                        style="display: none;">
                            <i class="fa fa-edit"></i>
                        </a>

                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::model($branch, ['method'=>'PATCH','route'=>['branches.update', $branch->id],'id'=>'branches-form','files'=>true])!!}
                         @include('branches.form', ['submitButtonText'=>'save','type'=>'update'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection