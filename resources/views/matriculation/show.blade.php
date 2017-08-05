@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.matriculation') }} {{ trans('adminlte_lang::message.of') }} {{ $matriculation->client->name }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.matriculation') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')
<?php
    $status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
    $status_color = ['danger','default','info','success','warning'];
?>
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong>{{ trans('adminlte_lang::message.matriculation') }} {{ trans('adminlte_lang::message.of') }}: </strong>
                    <span>
                        <a href="#show" id="people_show_popup" data-url="{{ route('clients.show',$matriculation->client->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.client') }}" data-title="{{ trans('adminlte_lang::message.client_details') }}">
                            {{ $matriculation->client->name }}
                        </a>
                    </span>
                </h3>
                <div class="pull-right box-tools">
                    <a href="{{ url('matriculation') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list_matriculation') }}">
                        <i class="fa  fa-list"></i>
                    </a>
                    @if($matriculation->status == 1)
                        @can('edit_matriculation')
                        <a href="{{ route('matriculation.edit',$matriculation->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa  fa-edit"></i>
                        </a>
                        @endcan

                        @can('cancel_matriculation')
                        <a href="#cancel" data-toggle="tooltip" class="btn btn-primary btn-sm" id="cancel-matriculation" title="{{ trans('adminlte_lang::message.cancel') }}" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name }}">
                            <i class="fa fa-ban"></i>
                        </a>
                        @endcan
                        @can('publish_matriculation')
                        <a href="#publish" data-toggle="tooltip"  class="btn btn-primary btn-sm" id="publish-matriculation" title="{{ trans('adminlte_lang::message.publish_matriculation') }}" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name }}">
                            <i class="fa fa-check"></i>
                        </a>
                        @endcan

                    @endif

                    @if($matriculation->status == 2)
                        @can('approve_matriculation')
                        <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.approve') }}" id="approve-matriculation" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name  }}">
                            <i class="fa fa-thumbs-o-up"></i>
                        </a>
                        @endcan
                        @can('reject_matriculation')

                        <a href="#!" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.reject') }}" id="reject-matriculation" data-key="{{ $matriculation->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$matriculation->client->name  }}">
                            <i class="fa fa-thumbs-o-down"></i>
                        </a>
                        @endcan
                    @endif

                    @if($matriculation->status == 3)
                        @can('edit_payment')
                        <a href="{{route('payments.edit',$matriculation->payment->id) }}" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.payments') }}">
                            <i class="fa fa-money"></i>
                        </a>
                        @endcan
                    @endif

                    <a href="{{ url('matriculation') }}/{{$matriculation->id}}/report" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                        <i class="fa fa-print"></i>
                    </a>

                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        {{--@include('people.show',['people' =>  $matriculation->client,'setting'=>['photo'=>true,'contact'=>false,'report'=>false]])--}}

                         <div class="row">
                            <span ><strong class="title">{{ trans('adminlte_lang::message.client_information') }}</strong></span>
                            <hr class="h-divider" >
                            <div class="col-lg-3 col-md-4 col-sm-6 text-center col-xs-12">
                                <div class="form-group form-group-sm">
                                    <img  src="{{ asset( $matriculation->client->avatar ) }}" class="img-thumbnail avatar-client" alt="Cinque Terre" width="200" id="client_avatar">
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                 <ul class="list-group list-group-unbordered">
                                     <li class="list-group-item">
                                         <i class="fa fa-user"></i>  <b>{{ trans('adminlte_lang::message.name') }}: </b>
                                         <a href="#show" id="people_show_popup" data-url="{{ route('clients.show',$matriculation->client->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.client') }}" data-title="{{ trans('adminlte_lang::message.client_details') }}"> {{ $matriculation->client->name }} </a>
                                     </li>
                                     <li class="list-group-item">
                                         <i class="fa fa-mobile-phone"></i>  <b>{{ trans('adminlte_lang::message.mobile') }}: </b>
                                         <a> {{ $matriculation->client->mobile }} </a>
                                     </li>
                                     
                                 </ul>
                             </div>

                             <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                 <ul class="list-group list-group-unbordered">

                                     <li class="list-group-item">
                                         <i class="fa fa-at"></i>  <b>{{ trans('adminlte_lang::message.email') }}: </b>
                                         <a> {{ $matriculation->client->email }} </a>
                                     </li>
                                     <li class="list-group-item">
                                         <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.phone') }}: </b>
                                         <a> {{ $matriculation->client->phone }} </a>
                                     </li>
                                 </ul>
                             </div>
                        </div>

                        {{--BUDGET INFORMATIONS--}}
                        <div class="row">
                            <span ><strong class="title">{{ trans('adminlte_lang::message.matriculation_information') }}</strong></span>
                            <hr class="h-divider" >

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <i class="fa fa-calendar"></i>  <b>{{ trans('adminlte_lang::message.create_date') }}: </b>
                                        <a> {{ \Carbon\Carbon::parse( $matriculation->created_at)->format('d/m/Y') }} </a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-building-o"></i>  <b>{{ trans('adminlte_lang::message.branch') }}: </b>
                                        <a> {{ $matriculation->branch->name }} </a>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-user"></i>  <b>{{ trans('adminlte_lang::message.employee') }}: </b>
                                        <a> {{ $matriculation->user->name }} </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <i class="fa fa-certificate"></i>  <b>{{ trans('adminlte_lang::message.status') }}: </b>
                                      <span class="label label-{{ $status_color[$matriculation->status] }}">    {{ $status[$matriculation->status] }}  </span>
                                    </li>

                                    <li class="list-group-item">
                                        <i class="fa fa-quote-left"></i>  <b>{{ trans('adminlte_lang::message.note') }}: </b>
                                        <a> {{  $matriculation->note }} </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        {{--PRODECURE--}}
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
                                            
                                            {{--@if(isset($matriculation_modality))--}}
                                                @foreach($matriculation->modality->where('status',1) as $modality)
                                                <tr class="matriculation_table" data-key="{{ $modality->id }}" data-total="{{ $modality->total }}">
                                                    <td class="modality" data-value="{{ $modality->modality_id }}" >{{ $modality->modality->name }}</td>
                                                    <td class="price text-center" data-value="{{ $modality->price }}" >{{ $Defaults->currency($modality->price) }}</td>
                                                    <td class="iva text-center" data-value="{{ $modality->iva }}" >{{ $modality->iva }} %</td>
                                                    <td class="discount text-center" data-value="{{ $modality->discount }}" >{{ $Defaults->currency($modality->discount) }}</td>
                                                    <td class="total_price text-center" data-value="{{ $modality->total }}" >{{ $Defaults->currency($modality->total) }}</td>
                                                </tr>
                                                @endforeach
                                            {{--@endif--}}

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection