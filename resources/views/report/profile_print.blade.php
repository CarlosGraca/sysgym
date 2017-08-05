@extends('layouts.report')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.client_profile') }} - {{ $people->name }}
@endsection

@section('main-content')
    <!-- Main content -->
    <section class="invoice" id="download-content">

        <!-- title row -->
        <div class="row" style="margin-top:0;">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style="padding: 10px 0 0 10px; -webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 5px;">
                            <img  src="{{ asset($company->logo) }}" id="logo" alt="Cinque Terre" height="120" class="pull-left">
                    </div>
                </div>

                <!-- PATIENT INFORMATION -->
                <div class="row" style="margin-top:20px;">

                    <div class="col-lg-12 invoice-info">
                        @include('people.show',['people' =>  $people,'setting'=>['photo'=>true,'contact'=>true,'report'=>true, 'work'=>true, 'type_people'=> $type_people]])
                    </div>

                </div>



            </div><!-- /.col -->
        </div>
        <!-- END PATIENT INFORMATION -->

        <!-- FOOTER -->
        {{--<div class="main-footer">--}}
            {{--<!----}}
            {{--<address style="margin-bottom: 10px; margin-left: 10px" class="text-center pull-left">--}}
                {{--<span>{{ $company->name }}</span><br>--}}
                {{--<b><i class="fa fa-phone" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.phone') }}"></i></b> <span>{{$company->phone}}</span> | <b><i class="fa fa-fax" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.fax') }}"></i></b> <span>{{$company->fax}}</span> <br>--}}
                {{--<b><i class="fa fa-at" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.email') }}"></i></b> <span>{{$company->email}}</span> <br>--}}
                {{--<b><i class="fa fa-address-card" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.nif') }}"></i></b> <span>{{$company->nif}}</span> | <b><i class="fa fa-address-book" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.zip_code') }}"></i></b> <span>{{$company->zip_code}}</span> <br>--}}
                {{--<b><i class="fa fa-map-marker" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.location') }}"></i></b> <span>{{$company->address}}, {{$company->city}}, {{$company->island->name}}</span> <br>--}}
                {{--<b><i class="fa fa-globe" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.website') }}"></i></b> <span>{{ $company->website }}</span>--}}
            {{--</address>--}}
            {{---->--}}
                {{--<span class="pull-left">--}}
                    {{--Copyright &copy; 2016 - OdontSoft - All rights reserved--}}
                {{--</span>--}}

                {{--<span class="pull-right">--}}

                        {{--{{  \Carbon\Carbon::now()->format('d-m-Y') }}--}}

                {{--</span>--}}

        {{--</div>--}}
        <!-- END FOOTER -->

        <!-- PATIENT ODONTOGRAM INFORMATION
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-12">

                <div class="col-lg-12" style="border:1px solid darkgray; -webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;">

                    <div class="row text-center">
                        <h4>Odontograma</h4>
                    </div>

                    <!-- info row --
                    <div class="row invoice-info text-center" style="margin: 5px;">

                        <img src="{{ asset('img/clinic/odontograma.png') }}" alt="">

                    </div><!-- /.row

                </div>
            </div><!-- /.col
        </div>
        <!-- END PATIENT ODONTOGRAM INFORMATION --


-->


    </section>
@endsection