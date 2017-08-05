@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.modality') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.modality') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')


@section('main-content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="{{ asset($modality->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $modality->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.modality_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('modalities') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ url('modalities') }}/{{$modality->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('modalities.edit',$modality->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><i class="fa fa-address-card-o"></i> {{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                {{--<li><a href="#officeHours" data-toggle="tab"><i class="fa fa-clock"></i> {{ trans('adminlte_lang::message.office_hours') }}</a></li>--}}
                                <li><a href="#students" data-toggle="tab"><i class="fa fa-user"></i> Student</a></li>
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
                                                    <a> {{ $modality->name }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-money"></i>  <b>{{ trans('adminlte_lang::message.price') }}: </b>
                                                    <a>{{ $Defaults->currency($modality->price) }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span ><strong class="title"><i class="fa fa-clock-o"></i> {{ trans('adminlte_lang::message.schedule') }}</strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-12">
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
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- /.tab-pane -->

                                {{--<!-- OFFICE HOURS TABLE-->--}}
                                {{--<div class="tab-pane" id="officeHours">--}}


                                {{--</div>--}}
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="students">

{{--                                    {{ $modality->matriculation_modality }}--}}

                                    <table id="table-office_hours" class="table table-bordered table-striped">

                                        <thead>
                                        <th class="col-md-5" >{{ trans('adminlte_lang::message.name') }}</th>
                                        <th class="col-md-2 text-center" >{{ trans('adminlte_lang::message.price_with_iva') }}</th>
                                        <th class="col-md-1 text-center" >{{ trans('adminlte_lang::message.iva') }} (%)</th>
                                        <th class="col-md-2 text-center" >{{ trans('adminlte_lang::message.discount') }}</th>
                                        <th class="col-md-2 text-center" >{{ trans('adminlte_lang::message.total') }}</th>
                                        </thead>
                                        <tbody>

                                        @if(isset($modality->matriculation_modality))
                                            @foreach($modality->matriculation_modality as $student)
                                            <tr>
                                                <td><a href="#show" data-url="{{ route('clients.show',$student->client_id) }}" id="people_show_popup" data-title="{{ trans('adminlte_lang::message.client_details') }}">{{ $student->client->name }}</a> </td>
                                                <td class="text-center"> {{ $Defaults->currency($student->price) }} </td>
                                                <td class="text-center"> {{ $student->iva}} % </td>
                                                <td class="text-center"> {{ $Defaults->currency($student->discount) }} </td>
                                                <td class="text-center"> {{ $Defaults->currency($student->total) }} </td>
                                            </tr>
                                            @endforeach
                                        @endif


                                        </tbody>
                                    </table>

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