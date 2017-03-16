@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.help') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    Help Center
@endsection


@section('main-content')
    <div class="row">
        <div class="col-lg-12 col-md-offset-2">
            <form class='search-form col-lg-8' style="margin:0 auto;">
                <div class='input-group'>
                    <input type="text" name="search" class='form-control' placeholder="{{ trans('adminlte_lang::message.search') }}"/>
                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
                    </div>
                </div><!-- /.input-group -->
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default" style="margin-top:25px; ">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-video-camera"></i> Video Tutorial</h3>
                </div>
                <div class="box-body">
                    @include('components.carousel_row')
                </div>
            </div>
        </div>
    </div>
@endsection
