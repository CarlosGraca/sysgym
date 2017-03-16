@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.consult_agenda') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.consult_agenda') }}
@endsection

@section('main-content')
	<div class="row">
	    <div class="col-lg-8">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('consult_type/create') }}" class="btn btn-primary btn-sm" id="add-agenda"  data-url="{{ url('consult_agenda/create') }}" data-toggle="modal" title="{{ trans('adminlte_lang::message.add_agenda') }}">
	                       <i class="fa fa-plus"></i>
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

                @include('components.consult_agenda_list')

	        </div>
	    </div>
	</div>
@endsection
