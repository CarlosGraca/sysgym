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

@inject('Defaults', 'App\Http\Controllers\Defaults')

@section('main-content')
    <style>
        .info-box-number{
            font-size: 30px;
        }
        .h-divider {
            margin-top: 5px;
            margin-bottom: 5px;
            height: 1px;
            border-top: 3px solid #3C8DBC;
            size: 30px;
            /* margin-left: 15px; */
            /* margin-right: 15px; */
        }
    </style>

    <span ><strong class="title">{{ trans('adminlte_lang::message.clients') }}</strong></span>
    <hr class="h-divider" style="margin-left: 0px;margin-right: 0px">
    @include('dashboard.clients') 

    <span ><strong class="title">{{ trans('adminlte_lang::message.payments') }}</strong></span>
    <hr class="h-divider" style="margin-left: 0px;margin-right: 0px">
    @include('dashboard.payments')

    <!-- <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li >
                 <a href="#clients" data-toggle="tab"><i class="fa fa-users"></i> {{ trans('adminlte_lang::message.clients') }}</a>
            </li>
            <li class="active">
                <a href="#payments" data-toggle="tab"><i class="fa fa-money"></i> {{  trans('adminlte_lang::message.payments') }}</a>
            </li>
        </ul>
        <div class="tab-content">
           
            <div class="tab-pane " id="clients">
               
            </div>
           
            <div class="tab-pane active" id="payments">
              
            </div>
        </div>
    </div>
 -->
 
@endsection