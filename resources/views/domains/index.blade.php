@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.domains') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')

	{{ trans('adminlte_lang::message.domains') }}
@endsection


@section('main-content')
     @include('layouts.shared.alert') 
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ trans('adminlte_lang::message.list_domains') }}</h3>
	               <div class="pull-left box-tools">
	                  <a href="{{ url('domains/create') }}"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="">

	                       <i class="fa fa-plus"></i> <span class="hidden-xs">{{ trans('adminlte_lang::message.new_domain') }}</span>

	                  </a>
	                  
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	  
	            <div class="box-body">
		            <div class="box-body">
                        <table class="table-design display" cellspacing="0" width="100%">  
			                <thead>
			                    <tr>		                        
			                        <th >Dominio</th>
			                        <th >Codigo</th>
			                        <th >Significado</th> 
			                        <th>Ações</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach ($domains as $dominio)
			                        <tr>
				                    	<td>{{$dominio->dominio}}</td> 
				                    	<td>{{$dominio->codigo}}</td> 
				                    	<td>{{$dominio->significado}}</td> 
				                    	<td class="actions">
					                        <a href="{{ route('domains.edit',$dominio->id) }}" class="btn btn-primary btn-xs", data-remote='true'])>      <i class="fa fa-edit"></i>
					                        </a>                           
					                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="{{ $dominio->id }}" data-name="{{ $dominio->name }}" data-title="Confirm provider deletion" data-url="/domains/">
					                            <i class="fa fa-trash"></i>
					                        </button>  
					                    </td>
				                    </tr>
			                    @endforeach
			                </tbody>                                     
			            </table>
		            </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
