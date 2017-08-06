@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.backups') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.backups') }}
@endsection

<?php
//$status = [trans('adminlte_lang::message.deleted'),trans('adminlte_lang::message.active'),trans('adminlte_lang::message.expired')];
//$status_color = ['danger','success','info'];
?>
@section('main-content')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.backup_list') }}</h3>
	              <div class="pull-left box-tools">

                    {{--@can('create_backup')--}}
                      <a href="#create-backup" id="create-backup" data-url="{{ url('backups/create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.create_backup') }}">
                           <i class="fa fa-cloud"></i> {{ trans('adminlte_lang::message.create_backup') }}
                      </a>
                    {{--@endcan--}}
{{--                    @can('upload_backup')--}}
                      <a href="#upload-backup" id="upload-backup" data-url="{{ url('backups/upload/popup') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.upload_backup') }}" data-title="{{ trans('adminlte_lang::message.upload_backup') }}">
                          <i class="fa fa-cloud-upload"></i> {{ trans('adminlte_lang::message.upload_backup') }}
                      </a>
                    {{--@endcan--}}

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body" id="backup-list">
                    @include('backup.list',['type'=>'index'])
	            </div>
	        </div>
	    </div>
	</div>
@endsection
