@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.matriculation') }}
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ trans('adminlte_lang::message.list_matriculation') }} </h3>
                    <div class="pull-left box-tools">
                        <a href="{{ url('matriculation/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_matriculation') }}" >
                            <i class="fa fa-plus"></i> {{ trans('adminlte_lang::message.new_matriculation') }}
                        </a>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table id="table-matriculation" class="table table-hover table-design">
                        <thead>
                        <tr>
                            {{--<th style="width: 10px" class="col-md-1">#</th>--}}
                            <th class="col-md-1">{{ trans('adminlte_lang::message.date') }}</th>
                            <th class="col-md-3" style="text-align: center">{{ trans('adminlte_lang::message.client') }}</th>
                            <th class="col-md-3" style="text-align: center">{{ trans('adminlte_lang::message.modality') }}</th>
                            <th class="col-md-3" style="text-align: center">{{ trans('adminlte_lang::message.note') }}</th>
                            <th class="col-md-2" style="text-align: center">{{ trans('adminlte_lang::message.status') }}</th>
                            <th class="col-md-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($matriculation as $item)
                            <tr class="bg-{{ $status_color[$item->status] }}">
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $item->client->name }}</td>
                                <td>{{ $item->modality->name }}</td>
                                <td>{{ $item->note }}</td>
                                <td class="text-center"> {{ $status[$item->status] }} </td>
                                <td>
{{--                                    @can('view_matriculation')--}}
                                    <a href="{{ route('matriculation.show',$item->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{--@endcan--}}

                                    {{--@if($item->status == 1)--}}
                                        {{--@can('edit_matriculation')--}}
                                        <a href="{{ route('matriculation.edit',$item->id) }}"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}" id="update-procedure">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{--@endcan--}}
{{----}}
                                        {{--@can('publish_matriculation')--}}
                                        {{--<a href="#publish" data-toggle="tooltip" id="publish-matriculation" title="{{ trans('adminlte_lang::message.publish_matriculation') }}" data-key="{{ $item->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$item->client->name }}">--}}
                                            {{--<i class="fa fa-check"></i>--}}
                                        {{--</a>--}}
                                        {{--@endcan--}}

                                        {{--@can('cancel_matriculation')--}}
                                        {{--<a href="#cancel" data-toggle="tooltip" id="cancel-matriculation" title="{{ trans('adminlte_lang::message.cancel') }}" data-key="{{ $item->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$item->client->name }}">--}}
                                            {{--<i class="fa fa-ban"></i>--}}
                                        {{--</a>--}}
                                        {{--@endcan--}}
                                    {{--@endif--}}

                                    {{--@if($item->status == 2)--}}
                                        {{--@can('approve_matriculation')--}}
                                        {{--<a href="#approve" data-toggle="tooltip" id="approve-matriculation" title="{{ trans('adminlte_lang::message.approve') }}" data-key="{{ $item->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$item->client->name  }}">--}}
                                            {{--<i class="fa fa-thumbs-o-up"></i>--}}
                                        {{--</a>--}}
                                        {{--@endcan--}}
                                        {{--@can('reject_matriculation')--}}
                                        {{--<a href="#reject" data-toggle="tooltip" id="reject-matriculation" title="{{ trans('adminlte_lang::message.reject') }}" data-key="{{ $item->id }}" data-name="{{ trans('adminlte_lang::message.of').' '.$item->client->name }}">--}}
                                            {{--<i class="fa fa-thumbs-o-down"></i>--}}
                                        {{--</a>--}}
                                        {{--@endcan--}}
                                    {{--@endif--}}

{{--                                    @if($item->status == 3)--}}
                                        {{--@can('edit_payment')--}}
                                        {{--<a href="{{route('payments.edit',$item->payment->id) }}" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.payments') }}">--}}
                                            {{--<i class="fa fa-money"></i>--}}
                                        {{--</a>--}}
                                        {{--@endcan--}}
                                        {{--@endif--}}

                                    {{--@can('add_matriculation')--}}
                                    <a href="{{ url('matriculation') }}/{{$item->id}}/report" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                                        <i class="fa fa-print"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
