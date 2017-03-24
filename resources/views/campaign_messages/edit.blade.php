@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.update_category') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.update_category') }}
@endsection


@section('main-content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	 <strong>{{ trans('adminlte_lang::message.category') }}: </strong><span>{{ $category->name }}</span>
	              </h3>

					<div class="pull-right box-tools">
							<a href="{{ url('category') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Voltar">
								 <i class="fa  fa-arrow-left"></i>
							</a>

							<a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="Save" id="edit-category">
								 <i class="fa fa-save"></i>
							</a>
					</div><!-- /. tools -->
	            </div><!-- /.box-header -->
	            <div class="box-body">
					{!! Form::model($category, ['method'=>'PATCH','route'=>['category.update', $category->id],'id'=>'category-form','files'=>true])!!}
						@include('category.form', ['type'=>'update','category'=>$category])
					{!! Form::close() !!}
				</div>
	        </div>
	    </div>
	</div>
@endsection
