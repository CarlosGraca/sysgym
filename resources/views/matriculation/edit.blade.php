@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_matriculation') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_matriculation') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
				  	<h3 class="box-title">
					 	<strong>{{ trans('adminlte_lang::message.matriculation') }} {{ trans('adminlte_lang::message.of') }}: </strong><span>{{ $matriculation->client->name }}</span>
				  	</h3>

					<div class="pull-right box-tools">
						<a href="{{ url('matriculation') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.back') }}">
							 <i class="fa  fa-arrow-left"></i>
						</a>
						@can('view_matriculation')
						<a href="{{ route('matriculation.show',$matriculation->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
							<i class="fa  fa-eye"></i>
						</a>
						@endcan
						@if($matriculation->status == 1)
							{{--@can('view_matriculation')--}}
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.save') }}" id="update-matriculation">
								 <i class="fa fa-save"></i>
							</a>
							{{--@endcan--}}
							{{--@can('view_matriculation')--}}
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="edit-matriculation-button" style="display: none;">
								<i class="fa fa-edit"></i>
							</a>
							{{--@endcan--}}
							@can('publish_matriculation')
							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.publish_matriculation') }}" id="publish-matriculation" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name  }}">
								<i class="fa fa-check"></i>
							</a>
							@endcan
						@endif

						{{--@if($matriculation->status == 2)--}}
							{{--@can('approve_matriculation')--}}
							{{--<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.approve') }}" id="approve-matriculation" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name  }}">--}}
								{{--<i class="fa fa-thumbs-o-up"></i>--}}
							{{--</a>--}}
							{{--@endcan--}}
							{{--@can('reject_matriculation')--}}
							{{--<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.reject') }}" id="reject-matriculation" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name  }}">--}}
								{{--<i class="fa fa-thumbs-o-down"></i>--}}
							{{--</a>--}}
							{{--@endcan--}}
						{{--@endif--}}

					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($matriculation, ['method'=>'PATCH','route'=>['matriculation.update', $matriculation->id],'id'=>'matriculation-form','files'=>true])!!}
						@include('matriculation.form', ['type'=>'update','matriculation'=>$matriculation])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
