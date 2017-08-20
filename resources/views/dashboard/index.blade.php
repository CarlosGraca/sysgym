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
    </style>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li >
                 <a href="#clients" data-toggle="tab"><i class="fa fa-users"></i> {{ trans('adminlte_lang::message.clients') }}</a>
            </li>
            <li class="active">
                <a href="#payments" data-toggle="tab"><i class="fa fa-money"></i> {{  trans('adminlte_lang::message.payments') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- profile -->
            <div class="tab-pane " id="clients">
               @include('dashboard.clients') 
            </div>
             <!-- Reset Password -->
            <div class="tab-pane active" id="payments">
               @include('dashboard.payments')
            </div>
        </div>
    </div>

 
@endsection