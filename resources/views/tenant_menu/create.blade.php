@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.new_menu') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.new_menu') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        {!! Form::open(['route'=>'tenant-menu.store', 'id'=>'menu-form','files'=>true]) !!}
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	{{--  <strong>{{ trans('adminlte_lang::message.system_user') }}: </strong><span>{{ Auth::user()->name }}</span> --}}
	              </h3>
					<!--
	              <div class="pull-right box-tools">
	                    <a href="#"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save">
	                       <i class="fa fa-save"></i>
	                     </a>
	              </div><!-- /. tools -->
	             
					<div class="pull-right box-tools">
						<a href="{{ url('tenant-menu') }}  "" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}" >
							 <i class="fa  fa-arrow-left"></i>
						</a>

						
						<a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" id="edit-menu-button" style="display: none;" >
							<i class="fa fa-edit"></i>
						</a>


						<button class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="add-menu" type="submit">
							 <i class="fa fa-save"></i>
						</button>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
					
	                  	@include('tenant_menu.form', ['type'=>'create']) 
					
				</div>
				
	        </div>
	        {!! Form::close() !!}
	    </div>
	</div>
@endsection
