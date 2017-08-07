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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ url('branches') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
                            <i class="fa  fa-arrow-left"></i> {{ trans('adminlte_lang::message.back') }}
                        </a>
                        <strong>{{ trans('adminlte_lang::message.update_branch') }}  </strong><span>{{ $branch->name }}</span>
                    </h3>

                    <div class="pull-right box-tools">

                        <a href="{{ route('branches.show',$branch->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}")>
                            <i class="fa fa-eye"></i> {{ trans('adminlte_lang::message.view') }}
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-branch">
                            <i class="fa fa-save"></i> {{ trans('adminlte_lang::message.save') }}
                        </a>

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-branch-button"
                        style="display: none;">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>

                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    {!! Form::model($branch, ['method'=>'PATCH','route'=>['branches.update', $branch->id],'id'=>'branches-form','files'=>true])!!}
                         @include('branches.form', ['type'=>'update'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


	
@endsection