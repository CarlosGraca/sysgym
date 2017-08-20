@extends('layouts.report')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.report') }}
@endsection

@section('invoice')
    <style>@page { size: A4 }</style>
@endsection

@section('invoice-body-class')
A4
@endsection


@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
$status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
$status_color = ['danger','default','info','success','warning'];
?>
@section('main-content')
    <section class="sheet padding-10mm">
        <!-- title row -->
        <div class="row" style="margin-top:0;">
            <div class="col-lg-12">
                <div class="row invoice-title">
                    <div class="col-lg-12">
                        {{--style="padding: 5px; border-bottom:none; border-top-left-radius: 5px; border-top-right-radius: 5px;"--}}
                        <div class="col-lg-2">
                            <img  src="{{ asset($company->logo) }}" id="logo" alt="Cinque Terre" height="120" class="pull-left">
                        </div>
                        <div class="col-lg-10" style="vertical-align: middle; display: table-cell;">
                            {{--REPORT--}}
                        </div>
                    </div>
                </div>

                {{--<!-- PATIENT INFORMATION -->--}}
                <div class="row" style="margin-top:20px;">
                    <div class="col-lg-12 invoice-info">
                        @include('people.show',['people' =>  $matriculation->client,'setting'=>['photo'=>true,'contact'=>false,'report'=>true,'work'=>false, 'type_people'=>'client']])
                    </div>
                </div>

                {{--BUDGET INFORMATIONS--}}
                <div class="row">
                    <span ><strong class="title">{{ trans('adminlte_lang::message.matriculation_information') }}</strong></span>
                    <hr class="h-divider" >

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i>  <b>{{ trans('adminlte_lang::message.date') }}: </b>
                                <a> {{ \Carbon\Carbon::parse($matriculation->created_at)->format('d/m/Y') }} </a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-user-secret"></i>  <b>{{ trans('adminlte_lang::message.employee') }}: </b>
                                <a> {{ $matriculation->user->name }} </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <i class="fa fa-quote-left"></i>  <b>{{ trans('adminlte_lang::message.note') }}: </b>
                                <a> {{  $matriculation->note }} </a>
                            </li>

                        </ul>
                    </div>
                </div>

                {{--MODALITY--}}
                <div class="row">
                    <span ><strong class="title">{{ trans('adminlte_lang::message.modality') }}</strong></span>
                    <hr class="h-divider" >

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ trans('adminlte_lang::message.list_modality') }}</h3>
                                <div class="pull-right">
                                    <span style="margin-right: 20px;">
                                        <b>{{ trans('adminlte_lang::message.total_with_desc') }}: </b><span id="matriculation-sum-discount" data-value="{{ $matriculation->total_discount }}"> {{ $Defaults->currency($matriculation->total_discount) }} </span>
                                    </span>
                                    <span>
                                        <b>{{ trans('adminlte_lang::message.total') }}: </b><span id="matriculation-sum-total" data-value="{{ $matriculation->total }}"> {{ $Defaults->currency($matriculation->total) }} </span>
                                    </span>
                                </div>
                            </div><!-- /.box-header -->

                            <div class="box-body no-padding">
                                <table id="table-matriculation_modality" class="table table-bordered table-striped">
                                    <thead id="matriculation_without_secure">
                                        <th class="col-md-4 text-center">{{ trans('adminlte_lang::message.modality') }}</th>
                                        <th class="col-md-3 text-center">{{ trans('adminlte_lang::message.price_with_iva') }}</th>
                                        <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.iva') }} (%)</th>
                                        <th class="col-md-2 text-center">{{ trans('adminlte_lang::message.discount') }}</th>
                                        <th class="col-md-3 text-center">{{ trans('adminlte_lang::message.total') }}</th>
                                    </thead>

                                    @foreach($matriculation->modality->where('status',1) as $modality)
                                        <tr class="matriculation_table" data-key="{{ $modality->id }}" data-total="{{ $modality->total }}">
                                            <td class="modality" data-value="{{ $modality->modality_id }}" >{{ $modality->modality->name }}</td>
                                            <td class="price text-center" data-value="{{ $modality->price }}" >{{ $Defaults->currency($modality->price) }}</td>
                                            <td class="iva text-center" data-value="{{ $modality->iva }}" >{{ $modality->iva }} %</td>
                                            <td class="discount text-center" data-value="{{ $modality->discount }}" >{{ $Defaults->currency($modality->discount) }}</td>
                                            <td class="total_price text-center" data-value="{{ $modality->total }}" >{{ $Defaults->currency($modality->total) }}</td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection