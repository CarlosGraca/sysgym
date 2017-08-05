@extends('layouts.default')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.404error') }}
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

<div class="row" style="margin-top: 25px; ">
    <div class="col-lg-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <img  src="{{ url('/img/clinic/logo.png') }}" class="img-circle" alt="Cinque Terre"
                          style="float: left; width: 30px; height: 30px; margin: 5px 10px 0 0;">
                    <a href="{{ url('/') }}" style="float:right; margin: 10px 0;">
                        {{ config('app.name') }}
                    </a>
                </h3>
            </div>
            <div class="box-body">
                <div class="error-page">
                    <h2 class="headline text-yellow"> 404</h2>
                    <div class="error-content">
                        <h3><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}.</h3>
                        <p>
                            {{ trans('adminlte_lang::message.notfindpage') }}
                            {{ trans('adminlte_lang::message.mainwhile') }} <a href='{{ url('/home') }}'>{{ trans('adminlte_lang::message.returndashboard') }}</a> {{ trans('adminlte_lang::message.usingsearch') }}
                        </p>
                        <form class='search-form'>
                            <div class='input-group'>
                                <input type="text" name="search" class='form-control' placeholder="{{ trans('adminlte_lang::message.search') }}"/>
                                <div class="input-group-btn">
                                    <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                                </div>
                            </div><!-- /.input-group -->
                        </form>
                    </div><!-- /.error-content -->
                </div><!-- /.error-page -->

            </div>
            <div class="box-footer">
                 <span>
                    &copy {{ date('Y') }} - <a href="{{ url('/') }}">{{ trans('adminlte_lang::message.app_name') }}</a> - {{ trans('adminlte_lang::message.copyright') }}
                </span>
                <span class="pull-right hidden-xs">
                    {{trans('adminlte_lang::message.version')}}:  {{ config('app.version') }}
                </span>
            </div>

        </div>
    </div>
</div>

@endsection