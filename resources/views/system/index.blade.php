@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.system') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
 {{ trans('adminlte_lang::message.system') }}
@endsection


@section('main-content')
    @include('layouts.shared.alert')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-primary">
	            <div class="box-header with-border">
	                <h3 class="box-title">
	              		<span>{{ trans('adminlte_lang::message.system_details') }}</span>
	                </h3>
	                <div class="pull-right box-tools">
	                    @if ($system)
		                    <a href="{{ route('system.edit', \Illuminate\Support\Facades\Crypt::encrypt($system->id)) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
		                       <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
		                    </a>
	                    @endif
	                    
	                </div><!-- /. tools -->						
	            </div><!-- /.box-header -->

	            <div class="box-body">               
		            <div class="row">
						<div class="col-lg-4 text-center">
							{{--<b> {{ trans('adminlte_lang::message.background_image') }}: </b>--}}
							<img  src="{{ asset($system != null ? $system->background_image : config('app.background') ) }}" class="img-thumbnail" alt="Cinque Terre" width="300" height="150">
						</div>

		        		<div class="col-lg-4">
		        			<ul class="list-group list-group-unbordered">
			                    <li class="list-group-item">
									<i class="fa fa-laptop"></i> <b> {{ trans('adminlte_lang::message.application_name') }}: </b><a class="app-name">{{$system ? $system->name : config('app.name')}}</a>
			                    </li>
								<li class="list-group-item">
									<i class="fa fa-language"></i> <b> {{ trans('adminlte_lang::message.lang') }}: </b> <a class="app-lang">{{$system ? $lang[$system->lang]: $lang[config('app.locale')]}}</a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-tv"></i> <b> {{ trans('adminlte_lang::message.layout') }}: </b><a class="app-layout">{{$system ? $system->layout : config('app.layout')}}</a>
								</li>
								{{--<li class="list-group-item">--}}
									{{--<i class="fa fa-info"></i> <b> {{ trans('adminlte_lang::message.iva') }}: </b><a class="app-iva">{{$system ? $system->iva : null}}%</a>--}}
								{{--</li>--}}
							 </ul>
		        		</div>

						<div class="col-lg-4">
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<i class="fa fa-leaf"></i> <b> {{ trans('adminlte_lang::message.theme') }}: </b> <a class="app-theme"> {{$system ? $system->theme : config('app.theme')}}</a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-money"></i> <b> {{ trans('adminlte_lang::message.currency') }}: </b> <a class="app-currency">{{$system ? $system->currency : config('app.currency')}}</a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-clock-o"></i> <b> {{ trans('adminlte_lang::message.timezone') }}: </b><a class="app-timezone">{{$system ? $timezone[$system->timezone] : $timezone[config('app.timezone')]}}</a>
								</li>
								<li class="list-group-item">
									<i class="fa fa-certificate"></i> <b> {{ trans('adminlte_lang::message.version') }}: </b><a class="app-version">{{ config('app.version') }}</a>
								</li>
							</ul>
						</div>

		        	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
