@extends('layouts.report')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.license_expired') }}
@endsection

@section('main-content')
        <!-- BEGIN VALIDATION FORM WIZARD -->
<div class="login-box" style="width: 450px;">
    <div class="col-lg-12" style="text-align: justify;">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span> <i class="fa fa-key"></i> {{ trans('adminlte_lang::message.license_expired') }}</span>
                </h3>
            </div>
            <div class="box-body" style="padding: 5px 20px 20px;">
                <p>
                    <b> {{ trans('adminlte_lang::message.greeting') }}</b>, <br>
                    {{ trans('adminlte_lang::message.license_expired_message_1') }}
                </p>
    
                <p style="display: none;">
                    {{ trans('adminlte_lang::message.license_expired_message_2') }} <a href="{{ url('license/create') }}">{{ trans('adminlte_lang::message.here') }}</a><i class="fa fa-hand-o-left"></i>
                </p>
                
                <div class="row">
                    {!! Form::open(['route'=>'license.store', 'id'=>'license-form']) !!}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-group-sm">
                            {!! Form::label('license_to',trans('adminlte_lang::message.license_to') ) !!}
                            {!! Form::text('license_to', null , ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-group-sm">
                            {!! Form::label('product_key',trans('adminlte_lang::message.product_key')) !!}
                            {!! Form::text('product_key', null , ['class'=>'form-control','onfocus'=>'onfocus']) !!}
                        </div>
                    </div>
                    <div class="col-xs-5 pull-right">
                        <a href="#" class="btn btn-primary btn-block btn-flat"  id="add-license">{{ trans('adminlte_lang::message.register') }} <i class="fa fa-key"></i></a>
                    </div><!-- /.col -->
                    {!! Form::close() !!}
                </div>

                <address style="display: none;">
                    {{ trans('adminlte_lang::message.contacts') }}: <br>
                    <a href="http://msolutions.cv/" target="_blank" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.website') }}"> <i class="fa fa-globe"></i> http://msolutions.cv/</a>   |
                    <a href="http://facebook.com/msolutions.cv" target="_blank" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.facebook_') }}"> <i class="fa fa-facebook"></i> msolutions.cv </a>  |
                    <a href="http://twitter.com/msolutions.cv" target="_blank" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.twitter') }}"> <i class="fa fa-twitter"></i>@msolutions.cv</a>
                </address>

            </div>
               @include('layouts.partials.footer')

        </div>

    </div>
</div>
@endsection