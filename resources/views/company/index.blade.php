@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.company') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
 {{ trans('adminlte_lang::message.company') }}
@endsection


@section('main-content')
    @include('layouts.shared.alert')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	              		<span>{{ trans('adminlte_lang::message.company_details') }}</span>
	                </h3>
	                <div class="pull-right box-tools">
	                    <a href="{{ route('company.edit',$company->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Edit" data-remote="false">
	                       <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
	                    </a>
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
		        		<div class="col-lg-3 text-center">
		        		    <img  src="{{ asset($company->logo) }}" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">		            
		        		</div>
		        		<div class="col-lg-9">
		        			<ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
									<i class="fa fa-laptop"></i> <b> {{ trans('adminlte_lang::message.company_name') }}: </b><span class="name">{{$company ? $company->company_name : null}}</span> <a href="#" id='setting-name' title='Edit'> </a>
			                    </li>
			                    <li class="list-group-item">
			                       	<i class="fa fa-envelope"></i> <b> {{ trans('adminlte_lang::message.email') }}: </b>{{$company ? $company->email : null}} <a href="#" id='setting-email'>  </a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-address-card"></i> <b> {{ trans('adminlte_lang::message.nif') }}: </b><span class="nif">{{$company ? $company->nif : null}}</span> <a href="#" id='setting-nif' title='Edit'> </a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-phone"></i> <b> {{ trans('adminlte_lang::message.contacts') }}: </b>{{$company ? $company->phone : null }} / {{$company ? $company->fax : null }}<a href="#" id='setting-contactos'> </a>
			                    </li>
			                    <li class="list-group-item">
									<i class="fa fa-map-marker"></i> <b> {{ trans('adminlte_lang::message.address') }}: </b>{{$company ? $company->address : null}} | <b> {{ trans('adminlte_lang::message.city') }}: </b> {{$company ? $company->city : null}}
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-facebook-official"></i> <b> {{ trans('adminlte_lang::message.facebook') }}: </b> {{$company ? $company->facebook : null}}  | <i class="fa fa-globe"></i> <b> {{ trans('adminlte_lang::message.website') }}: </b> {!! link_to($company ? $company->website : null, $title = null, $attributes = [], $secure = null) !!}
								</li>
								<li class="list-group-item">
									<i class="fa fa-address-card"></i> <b> {{ trans('adminlte_lang::message.zip_code') }}: </b> {{$company ? $company->zip_code : null}}
								</li>
			                </ul>
		        		</div>
		        	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
