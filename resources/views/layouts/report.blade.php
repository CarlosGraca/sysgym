<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ \Auth::guest() ? config('app.locale') : \Auth::user()->branch->system->lang }}" class="report">

    @section('htmlheader')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        @include('layouts.partials.htmlheader')

        <!-- Normalize or reset CSS with your favorite library -->
        <link rel="stylesheet" href="{{ asset('/plugins/normalize/css/normalize.css') }}">

        <!-- Load paper.css for happy printing -->
        <link rel="stylesheet" href="{{ asset('/plugins/paper/css/paper.css') }}">

        <style>
            .content-wrapper-login {
                background: url('{{ asset( \Auth::user()->branch->system->background_image ) }}') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    @show

    <body class="layout-boxed content-wrapper-login  @yield('invoice-body-class','')">
        <!-- Main content -->
        {{--<div class="container">--}}
            <!-- Portfolio Item Heading -->

            <!-- /.row -->
            <!-- Your Page Content Here -->



        <section class="invoice no-border no-padding" style="background-color: rgba(110,255,110,0);">
                @yield('main-content')
                {{--@yield('main-content')--}}
        </section>

        <section class="invoice col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right text-center" style="position:fixed; bottom: 0; right: 0; border-radius: 5px;">
            <div class="no-print">
                {{--<div class="col-xs-6 pull-left">--}}
                {{--<img  src="{{ url('/img/clinic/logo.png') }}" class="img-circle" alt="Cinque Terre" style="float: left; width: 30px; height: 30px; margin-right: 10px;  margin-top: -2px;">--}}
                {{--<h4>{{ \Auth::user()->tenant->company_name }} - Report</h4>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right">--}}
                    <a href="#" id="close-page" onclick="window.close();" class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.close') }}" ><i class="fa fa-close"></i> {{ trans('adminlte_lang::message.close') }}</a>
                    <a href="#" id="print-page" onclick="window.print();" class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}" ><i class="fa fa-print"></i> {{ trans('adminlte_lang::message.print') }}</a>
                    <a href="#" id="btn-download" type='invoice' class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.download') }}" ><i class="fa fa-cloud-download"></i> {{ trans('adminlte_lang::message.download') }}</a>
                    <a href="#" id="btn-email" class="btn btn-default" style="margin-right: 5px;"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.email') }}" ><i class="fa fa-envelope"></i> {{ trans('adminlte_lang::message.email') }}</a>
                {{--</div>--}}
            </div>
        </section>
            {{--<section class="invoice">--}}
                {{--<div class="row no-print" style="padding: 0 10px;">--}}
                        {{--<span>--}}
                            {{--&copy {{ date('Y') }} - <a href="{{ url('/') }}">{{ trans('adminlte_lang::message.app_name') }}</a> - {{ trans('adminlte_lang::message.copyright') }}--}}
                        {{--</span>--}}
                    {{--<span class="pull-right hidden-xs">--}}
                            {{--{{trans('adminlte_lang::message.version')}}:  {{ config('app.version') }}--}}
                        {{--</span>--}}
                {{--</div>--}}
            {{--</section>--}}
        {{--</div><!-- /.content -->--}}

        <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top: 0;">
            <img src="{{asset('img/gears.gif')}}" />
        </div>

    @section('scripts')
        @include('layouts.partials.scripts')
    @show
    </body>
</html>
