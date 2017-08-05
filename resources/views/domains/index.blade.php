@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Lista
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  dominios
@endsection


@section('main-content')
    {{-- @include('layouts.shared.alert') --}}
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	               <div class="pull-left box-tools">
	                  <a href="{{ url('dominios/create') }}"  class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="">
	                       <i class="fa fa-plus"></i>
	                  </a>
	                  
	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->
	  
	            <div class="box-body">
		            <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="table-dominios">  
			                <thead>
			                    <tr>		                        
			                        <th >Dominio</th>
			                        <th >Codigo</th>
			                        <th >Significado</th> 
			                        <th>Ações</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach ($dominios as $dominio)
			                        <tr>
				                    	<td>{{$dominio->dominio}}</td> 
				                    	<td>{{$dominio->codigo}}</td> 
				                    	<td>{{$dominio->significado}}</td> 
				                    	<td class="actions">
					                        <a href="{{ route('dominios.edit',$dominio->id) }}" class="btn btn-primary btn-xs", data-remote='true'])>      <i class="fa fa-edit"></i>
					                        </a>                           
					                        <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="{{ $dominio->id }}" data-name="{{ $dominio->name }}" data-title="Confirm provider deletion" data-url="/dominios/">
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
