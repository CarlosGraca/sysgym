@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.branch') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.branch') }}
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="{{ asset($branch->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $branch->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.branch_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('branches') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ url('branches') }}/{{$branch->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('branches.edit',$branch->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab">{{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                <li><a href="#officeHours" data-toggle="tab">{{ trans('adminlte_lang::message.office_hours') }}</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="personal_data">
                                    <!-- PERSONAL INFORMATION -->
                                    <div class="row">
                                        <span ><strong class="title"> <i class="fa fa-id-card-o"></i> {{ trans('adminlte_lang::message.personal_information') }}</strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-user"></i>  <b>{{ trans('adminlte_lang::message.name') }}: </b>
                                                    <a> {{ $branch->name }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b>{{ trans('adminlte_lang::message.manager') }}: </b>
                                                    <a>{{ $branch->manager }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- CONTACT INFORMATION -->
                                    <div class="row">
                                        <span ><strong class="title"> <i class="fa fa-phone"></i> {{ trans('adminlte_lang::message.contact_information') }}</strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-map-marker"></i>  <b>{{ trans('adminlte_lang::message.address') }}: </b>
                                                    <a> {{ $branch->address }}, {{ $branch->city }}, {{ $branch->island->name }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b>{{ trans('adminlte_lang::message.email') }}: </b>
                                                    <a> {{$branch->email }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.phone') }}: </b>
                                                    <a>{{ $branch->phone }}</a>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b>{{ trans('adminlte_lang::message.zip_code') }}: </b>
                                                    <a> {{ $branch->zip_code }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-fax"></i>  <b>{{ trans('adminlte_lang::message.fax') }}: </b>
                                                    <a>{{ $branch->fax}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- /.tab-pane -->

                                <!-- OFFICE HOURS TABLE-->
                                <div class="tab-pane" id="officeHours">
                                {{--<!----}}
                                    {{--<table id="table-office_hours" class="table table-bordered table-striped">--}}

                                        {{--<thead>--}}
                                        {{--<th class="col-md-4">{{ trans('adminlte_lang::message.week_day') }}</th>--}}
                                        {{--<th class="col-md-4">{{ trans('adminlte_lang::message.start_time') }}</th>--}}
                                        {{--<th class="col-md-2">{{ trans('adminlte_lang::message.end_time') }}</th>--}}
                                        {{--</thead>--}}

                                        {{--<tbody>--}}
                                        {{--@if(isset($schedules))--}}
                                            {{--@foreach($schedules as $schedule)--}}
                                                {{--<tr class="office_hours_tables" data-key="{{ $schedule->id }}">--}}
                                                    {{--<td class="week_name" data-value="{{ $schedule->week_day }}">{{ trans('adminlte_lang::message.'.$schedule->week_day) }}</td>--}}
                                                    {{--<td class="start_time" >{{ $schedule->start_time }}</td>--}}
                                                    {{--<td class="end_time" >{{ $schedule->end_time }}</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{---->--}}



                                    {{--<div class="box box-default">--}}
                                        {{--<div class="box-header with-border">--}}
                                            {{--<h3 class="box-title"><i class="fa fa-clock-o"></i> {{ trans('adminlte_lang::message.office_hours') }}</h3>--}}
                                            {{--<div class="pull-right box-tools">--}}
                                                {{--<a href="#!print" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">--}}
                                                    {{--<i class="fa fa-print"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div><!-- /.box-header -->--}}

                                        {{--<div class="box-body">--}}

                                            <table id="table-office_hours" class="table table-bordered table-striped">

                                                <thead>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.monday') }}</th>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.tuesday') }}</th>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.wednesday') }}</th>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.thursday') }}</th>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.friday') }}</th>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.saturday') }}</th>
                                                    <th class="col-md-1" style="text-align: center">{{ trans('adminlte_lang::message.sunday') }}</th>
                                                </thead>
                                                <tbody>

                                                @if(isset($aux))
                                                    <tr>
                                                        @foreach($aux as $key => $item)
                                                            <td style="text-align: center; padding: 2px;">
                                                                <hr style="margin-top: 0; border: 0px">
                                                                @foreach($item as $i)
                                                                    <span> {{ $i['start_time'] }} </span>
                                                                    <hr>
                                                                    <span> {{ $i['end_time'] }} </span>
                                                                    <hr>
                                                                @endforeach
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endif


                                                </tbody>
                                            </table>
                                        {{--</div>--}}
                                    {{--</div>--}}


                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">


                                </div>
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