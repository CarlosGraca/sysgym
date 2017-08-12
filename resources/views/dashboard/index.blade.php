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

    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.clients_active') }}</span>
                    <span class="info-box-number">{{ $total_a }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.clients_inactive') }}</span>
                    <span class="info-box-number">{{ $total_i }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-gamepad"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.modalities') }}</span>
                    <span class="info-box-number">{{ $total_m }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-cube"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.matriculation') }}</span>
                    <span class="info-box-number"> {{ $total_mt }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('adminlte_lang::message.payments') }}</span>
                    <span class="info-box-number"> {{ $total_p }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
            {{--<div class="info-box">--}}
                {{--<span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>--}}

                {{--<div class="info-box-content">--}}
                    {{--<span class="info-box-text">{{ trans('adminlte_lang::message.payment') }}</span>--}}
                    {{--<span class="info-box-number"> {{ $total_mt }}</span>--}}
                {{--</div>--}}
                {{--<!-- /.info-box-content -->--}}
            {{--</div>--}}
            {{--<!-- /.info-box -->--}}
        {{--</div>--}}
    </div>

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