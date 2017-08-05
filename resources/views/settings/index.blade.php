@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Associação Online
@endsection

@section('contentheader_title')
  Associação Online
@endsection

@section('contentheader_description')
    {{$tenant->company_name}}
@endsection


@section('main-content')
   
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	              		<span>Dados da Assciação</span>
	                </h3>
	                <div class="pull-right box-tools">
	                    <a href="{{ route('settings.edit',$tenant->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Editar" data-remote="true">
	                       <i class="fa fa-edit"></i>
	                    </a>
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
		        		<div class="col-lg-3 text-center">
	        		        @if(isset($tenant->logo_url))
		        		    	<img  src="/uploads/{{$tenant->logo_url}}" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
		        		    @else
		        		    	<img  src="/img/logo.jpg" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
	        		        @endif	 		            				            
		        		</div>
		        		<div class="col-lg-9">
		        			 <ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
			                      <b>Associação: </b><span class="name">{{$tenant ? $tenant->company_name : null}}</span> <a href="#" id='setting-name' title='Edit'> </a>
			                    </li>
			                    <li class="list-group-item">
			                      <b>Email: </b>{{$tenant ? $tenant->email : null}} <a href="#" id='setting-email'>  </a>
			                    </li>
			                    <li class="list-group-item">
			                      <b>NIF: </b><span class="nif">{{$tenant ? $tenant->nif : null}}</span> <a href="#" id='setting-nif' title='Edit'> </a>
			                    </li>
			                    <li class="list-group-item">
			                      <b>Contactos: </b>{{$tenant ? $tenant->telefone : null }}/{{$tenant ? $tenant->telemovel : null }}<a href="#" id='setting-contactos'> </a>
			                    </li>
			                    <li class="list-group-item">
			                      <b>Localização: </b>{{$tenant ? $tenant->city.','.$tenant->state.','.$tenant->country  : null}}
			                    </li>
			                    <li class="list-group-item">
			                      <b>Código Postal: </b> {{$tenant ? $tenant->cod_postal  : null}}
			                    </li> 
			                    <li class="list-group-item">
			                      <b>Registado em: </b> {{$tenant ? $tenant->created_at : null}}
			                    </li> 
			                </ul>
		        		</div>
		        	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
