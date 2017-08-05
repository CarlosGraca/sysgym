@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.role') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.role') }}
@endsection

{{--@inject('Defaults', 'App\Http\Controllers\Defaults')--}}


@section('main-content')
    <div class="row">
        {{--<div class="col-md-3">--}}

            {{--<!-- Profile Image -->--}}
            {{--<div class="box box-primary">--}}
                {{--<div class="box-body box-profile">--}}
                    {{--<div class="text-center">--}}
                        {{--<img class="thumbnail" src="{{ asset($role->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">--}}
                        {{--<i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>--}}
                    {{--</div>--}}

                    {{--<h3 class="profile-username text-center">{{ $role->name }}</h3>--}}
                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--<!-- /.box -->--}}


        {{--</div>--}}
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.role_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('roles') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ url('roles') }}/{{$role->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
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
                                <li><a href="#users" data-toggle="tab"><i class="fa fa-user-secret"></i> {{ trans('adminlte_lang::message.users') }}</a></li>
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
                                                    <a> {{ $role->name }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-quote-left"></i>  <b>{{ trans('adminlte_lang::message.description') }}: </b>
                                                    <a> {{ $role->label }} </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <span ><strong class="title"><i class="fa fa-key"></i> {{ trans('adminlte_lang::message.permissions') }}</strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-12">
                                            <table id="table-permission" class="table table-bordered table-striped table-design">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-2">{{ trans('adminlte_lang::message.name') }}</th>
                                                    <th class="col-md-10">{{ trans('adminlte_lang::message.description') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($role->permission as $permission)
                                                    <tr>
                                                        <td class="name">{{$permission->name}} </td>
                                                        <td class="description">{{$permission->label}} </td>
                                                    </tr>
                                                @endforeach
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

                                <div class="tab-pane" id="users">

                                    {{--{{ $users }}--}}

                                    <div class="row">
                                        {{--<span ><strong class="title"><i class="fa fa-key"></i> {{ trans('adminlte_lang::message.permissions') }}</strong></span>--}}
                                        {{--<hr class="h-divider" >--}}
                                        <div class="col-lg-12">
                                            <table id="table-users" class="table table-bordered table-striped table-design">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-2">{{ trans('adminlte_lang::message.name') }}</th>
                                                    <th class="col-md-10">{{ trans('adminlte_lang::message.email') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $user)
                                                    @if($user->roles->first()->id == $role->id)
{{--                                                    {{ $user->roles->first()->id }}--}}
                                                        <tr>
                                                            <td class="name">{{$user->name}} </td>
                                                            <td class="email">{{$user->email}} </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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