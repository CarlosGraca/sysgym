@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.dashboard') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.dashboard') }}
@endsection


@section('main-content')
    <style>
        .info-box-number{
            font-size: 30px;
        }
    </style>

    

    {{-- @include('dashboard.clients')  
    @include('dashboard.modalities') --}}
    @include('dashboard.payments')

    {{--<div class="row">--}}
        {{--<div class="col-lg-3 pull-right">--}}
            {{--<!-- BAR CHART -->--}}
            {{--<div class="box box-success">--}}
                {{--<div class="box-header with-border">--}}
                    {{--<i class="fa fa-bar-chart"></i>--}}
                    {{--<h3 class="box-title" id='chart-title'>{{ trans('adminlte_lang::message.none') }}</h3>--}}
                    {{--<div class="box-tools">--}}
                        {{--<button type="button" class="btn btn-primary btn-sm daterange pull-right" style='margin-right:5px;' data-toggle="tooltip" title="Date range">--}}
                            {{--<i class="fa fa-calendar"></i>--}}
                            {{--<span class="range-date"></span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="box-body">--}}
                    {{--<div class="chart">--}}
                        {{--@include('dashboard.bar_chart',[])--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
                {{--<div class="box-footer text-center">--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.box -->--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection