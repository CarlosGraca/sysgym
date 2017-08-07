@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.client') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('clients') }}
@endsection

@inject('defaults', 'App\Http\Controllers\Defaults')
<?php
$status = $defaults->getStatus();
$status_color = $defaults->getStatusColor();
?>



@section('main-content')
    <div class="row">

        @if($client->status == 0)
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissible" role="info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><i class="fa fa-info-circle"></i></strong> {{ trans('adminlte_lang::message.msg_disabled_client') }}
                </div>
            </div>

        @endif

        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="{{ asset($client->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $client->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.client_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('clients') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.clients_list') }}">
                            <i class="fa fa-list"></i> {{ trans('adminlte_lang::message.clients_list') }}
                        </a>

                        @if($client->status == 1)
                            {{--@can('edit_client')--}}
                            <a href="{{ route('clients.edit',$client->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                                <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                            </a>
                            {{--@endcan--}}
                        @endif

                        <a href="{{ url('clients') }}/{{$client->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i> {{ trans('adminlte_lang::message.print') }}
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"> <i class="fa fa-address-card-o"></i> {{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                <li><a href="#documents" data-toggle="tab"> <i class="fa fa-folder-open-o"></i> {{ trans('adminlte_lang::message.documents') }}</a></li>
                                {{--<li><a href="#agenda" data-toggle="tab"><i class="fa fa-calendar"></i> {{ trans('adminlte_lang::message.agenda') }}</a></li>--}}
                                {{--<li><a href="#consult" data-toggle="tab"><i class="fa fa-heartbeat"></i> {{ trans('adminlte_lang::message.consult') }}</a></li>--}}
                                {{--<li><a href="#odontograma" data-toggle="tab"><img src="{{ asset('/img/icon/odontograma_teeth.png') }}" > {{ trans('adminlte_lang::message.odontograma') }}</a></li>--}}
                                {{--<li><a href="#matriculation" data-toggle="tab"><img src="{{ asset('/img/icon/matriculation-calculator-20.png') }}" width="14"> {{ trans('adminlte_lang::message.matriculation') }}</a></li>--}}
                                {{--<li><a href="#payments" data-toggle="tab"><img src="{{ asset('/img/icon/credit-card-swipe-20.png') }}" width="14"> {{ trans('adminlte_lang::message.payments') }}</a></li>--}}
                                {{--<li><a href="#settings" data-toggle="tab"> <i class="fa fa-gear"></i> Settings</a></li>--}}
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="personal_data">
                                    @include('people.show',['people'=>$client,'setting'=>['photo'=>false,'contact'=>true,'report'=>false,'work'=>true,'type_people'=>'client']])
                                </div>
                                <!-- /.tab-pane -->

                                <!-- DOCUMENTS TABLE-->
                                <div class="tab-pane" id="documents">

                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>

                                    {!! Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]) !!}
                                        {!! Form::hidden('item_id', $client->id, ['class'=>'form-control','id'=>'item_id']) !!}
                                        {!! Form::hidden('flag', 1, ['class'=>'form-control','id'=>'flag']) !!}
                                        @include('files.form', ['type'=>'create'])
                                    {!! Form::close() !!}

                                    <table id="table-documents" class="table table-bordered table-striped">
                                        <thead>
                                          <tr>

                                            <th class="col-md-4">{{ trans('adminlte_lang::message.file_name') }}</th>
                                              <th class="col-md-5" style="text-align: center">{{ trans('adminlte_lang::message.description') }}</th>
                                              <th class="col-md-2" style="text-align: center">{{ trans('adminlte_lang::message.file_type') }}</th>
                                            <th class="col-md-1"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Files as $file)
                                                <tr class="file_document" data-key="{{ $file->id }}">
                                                    <td class="name_original">{{$file->name_original}} </td>
                                                    <td class="description">{{$file->description}} </td>
                                                    <td class="media_type" style="text-align: center">{{$file->media_type}}</td>
                                                    <td>
                                                        <a href="#!preview" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.preview') }}" class="file-preview" data-url="{{ url('files') }}/{{$file->id}}/preview" style="visibility: {{ $file->media_type != 'doc' ? 'visible':'hidden' }};"><i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ url('files') }}/{{$file->id}}/download" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.download') }}" ><i class="fa fa-download"></i>
                                                        </a>
                                                        <a href="#!remove" data-url="{{ url('files') }}/{{$file->id}}/remove" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.remove') }}" class="file-remove"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.tab-pane -->

                                <!-- AGENDA OF CONSULT -->
                                {{--<div class="tab-pane" id="agenda">--}}
                                    {{--{{ $client->consult_agenda }}--}}
                                    {{--<table id="table-consult_agenda" class="table table-hover table-design">--}}

                                        {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th class="col-md-2"  align="center">{{ trans('adminlte_lang::message.date') }}</th>--}}
                                                {{--<th class="col-md-2"  align="center">{{ trans('adminlte_lang::message.time') }}</th>--}}
                                                {{--<th class="col-md-2"  align="center">{{ trans('adminlte_lang::message.consult_type') }}</th>--}}
                                                {{--<th class="col-md-2">{{ trans('adminlte_lang::message.client') }}</th>--}}
                                                {{--<th class="col-md-3">{{ trans('adminlte_lang::message.contacts') }}</th>--}}
                                                {{--<th class="col-md-3"  align="center">{{ trans('adminlte_lang::message.doctor') }}</th>--}}
                                                {{--<th class="col-md-2"  align="center">{{ trans('adminlte_lang::message.status') }}</th>--}}
                                                {{--<th class="col-md-1"></th>--}}
                                            {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--@foreach ($client->consult_agenda as $agenda)--}}
                                            {{--<tr  class="bg-{{ $status_color[$agenda->status] }}">--}}
                                                {{--<td class="text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $agenda->date )->format('d/m/Y') }}</td>--}}
                                                {{--<td class="text-center">{{ $agenda->start_time }} - {{ $agenda->end_time }}</td>--}}
                                                {{--<td>{{ $agenda->consult_type->name}}</td>--}}
                                                {{--<td>{{ $agenda->doctor->name }}</td>--}}
                                                {{--<td  class="text-center"> <span class="label label-{{ $status_color[$agenda->status] }}"> {{ trans('adminlte_lang::message.'.$status[$agenda->status]) }}</span> </td>--}}

                                                {{--<td class="text-center">--}}
                                                    {{--<a href="#!view" data-url="{{ route('consult_agenda.show',$agenda->id) }}" data-toggle="tooltip"  data-title="{{ trans('adminlte_lang::message.details_consult_agenda') }}" data-placement="left" class="show-agenda-modal" title="{{ trans('adminlte_lang::message.view') }}">--}}
                                                        {{--<i class="fa fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--<tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                                {{--<!-- /.tab-pane -->--}}

                                {{--CONSULT--}}
                                {{--<div class="tab-pane" id="consult">--}}

                                    {{--<table id="table-consult" class="table table-hover table-design">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th class="col-md-2">{{ trans('adminlte_lang::message.date') }}</th>--}}
                                            {{--<th class="col-md-3" style="text-align: center">{{ trans('adminlte_lang::message.doctor') }}</th>--}}
                                            {{--<th class="col-md-2" style="text-align: center">{{ trans('adminlte_lang::message.status') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.total') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.discount') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.total_with_desc') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.value_exec') }}</th>--}}
                                            {{--<th class="col-md-1"></th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}

                                        {{--</tbody>--}}
                                    {{--</table>--}}

                                {{--</div>--}}
                                <!-- /.tab-pane -->

                                {{--<!-- ODONTOGRAMA -->--}}
                                {{--<div class="tab-pane" id="odontograma">--}}

                                    {{--<div class="box box-default">--}}
                                        {{--<div class="box-header with-border">--}}
                                            {{--<h3 class="box-title">{{ trans('adminlte_lang::message.odontograma') }}</h3>--}}

                                            {{--<div class="box-tools pull-right">--}}
                                                {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                                                {{--</button>--}}
                                            {{--</div>--}}
                                            {{--<!-- /.box-tools -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /.box-header -->--}}
                                        {{--<div class="box-body text-center" style="display: block;">--}}
                                            {{--<img src="{{ asset('/img/clinic/odontograma.png') }}" alt="">--}}
                                        {{--</div>--}}
                                        {{--<!-- /.box-body -->--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <!-- /.tab-pane -->

                                {{--<!-- BUDGET -->--}}
                                {{--<div class="tab-pane" id="matriculation">--}}

                                   <?php
                                   $matriculation_status = [trans('adminlte_lang::message.canceled'),trans('adminlte_lang::message.draft'),trans('adminlte_lang::message.published'),trans('adminlte_lang::message.approved'),trans('adminlte_lang::message.rejected')];
                                   $matriculation_status_color = ['danger','default','info','success','warning'];
                                   ?>

                                    {{--<table id="table-matriculation" class="table table-hover table-design">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th class="col-md-2 text-center">{{ trans('adminlte_lang::message.date') }}</th>--}}
                                            {{--<th class="col-md-5" style="text-align: center">{{ trans('adminlte_lang::message.doctor') }}</th>--}}
                                            {{--<th class="col-md-2" style="text-align: center">{{ trans('adminlte_lang::message.status') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.total') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.total_with_desc') }}</th>--}}
                                            {{--<th class="col-md-1"></th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--@foreach ($client->matriculation as $item)--}}
                                            {{--<tr class="bg-{{ $matriculation_status_color[$item->status] }}">--}}
                                                {{--<td class="date text-center">{{ \Carbon\Carbon::parse( $item->created_at )->format('d/m/Y') }}</td>--}}
                                                {{--<td class="doctor">{{ $item->doctor->name }}</td>--}}
                                                {{--<td class="status text-center"> {{ $matriculation_status[$item->status] }} </td>--}}
                                                {{--<td class="total">{{ $Defaults->currency($item->total) }}</td>--}}
                                                {{--<td class="total_with_desc">{{ $Defaults->currency($item->total_discount) }}</td>--}}
                                                {{--<td class="text-center">--}}
                                                    {{--<a href="{{ route('matriculation.show',$item->id) }}" target="_blank" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">--}}
                                                        {{--<i class="fa fa-eye"></i>--}}
                                                    {{--</a>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                                {{--<!-- /.tab-pane -->--}}

                                {{--<!-- PAYMENTS -->--}}
                                {{--<div class="tab-pane" id="payments">--}}


                                    {{--<table id="table-payment" class="table table-hover table-design">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th class="col-md-2">{{ trans('adminlte_lang::message.date') }}</th>--}}
                                            {{--<th class="col-md-3" style="text-align: center">{{ trans('adminlte_lang::message.branch') }}</th>--}}
                                            {{--<th class="col-md-2" style="text-align: center">{{ trans('adminlte_lang::message.payment_method') }}</th>--}}
                                            {{--<th class="col-md-3" style="text-align: center">{{ trans('adminlte_lang::message.note') }}</th>--}}
                                            {{--<th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.total') }}</th>--}}
                                            {{--<th class="col-md-1"></th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--{{ $client->matriculation }}--}}
                                        {{--@foreach ($client->matriculation as $item)--}}
                                            {{--@if( count($item['payment']) != 0)--}}
                                            {{--<tr class="bg-{{ $status_color[$item['payment']['status']] }}">--}}
                                                {{--<td class="text-center">{{ \Carbon\Carbon::parse( $item['payment']['created_at'] )->format('d/m/Y') }}</td>--}}
                                                {{--<td class="text-center">{{ $item['payment']['branch']['name'] }}</td>--}}
                                                {{--<td class="text-center">{{ $item['payment']['payment_method'] }}</td>--}}
                                                {{--<td class="text-center">{{ $item['payment']['note'] }}</td>--}}
                                                {{--<td class="text-center">{{ $Defaults->currency($item['payment']['total']) }}</td>--}}
                                                {{--<td class="text-center"></td>--}}
                                            {{--</tr>--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}

                                {{--</div>--}}
                                <!-- /.tab-pane -->

                                {{--<div class="tab-pane" id="settings">--}}

                                    {{--<ul class="todo-list">--}}

                                        {{--<li>--}}
                                            {{--<!-- drag handle -->--}}
                                              {{--<span>--}}
                                                {{--<i class="fa fa-envelope"></i>--}}
                                              {{--</span>--}}

                                            {{--<!-- todo text -->--}}
                                            {{--<span class="text">Receive notification on my Email</span>--}}
                                            {{--<!-- Emphasis label -->--}}
                                            {{--<span class="label label-success pull-right">Active</span>--}}
                                            {{--<!-- General tools such as edit or delete-->--}}
                                            {{--<div class="tools">--}}
                                                {{--<i class="fa fa-edit"></i>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}

                                        {{--<li>--}}
                                              {{--<span>--}}
                                                {{--<i class="fa fa-phone"></i>--}}
                                              {{--</span>--}}

                                            {{--<span class="text">Receive notification on my Phone</span>--}}
                                            {{--<small class="label label-success pull-right">Active</small>--}}
                                            {{--<div class="tools">--}}
                                                {{--<i class="fa fa-edit"></i>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}

                                {{--</div>--}}
                                <!-- /.tab-pane -->


                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
        </div>
        <!-- /.col -->
    </div>
@endsection