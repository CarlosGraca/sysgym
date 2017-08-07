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


@section('main-content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.role_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('roles') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i> {{ trans('adminlte_lang::message.role_list') }}
                        </a>
                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>
                        <a href="{{ url('roles') }}/{{$role->id}}/print" class="btn btn-primary btn-sm" target="_blank" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i> {{ trans('adminlte_lang::message.print') }}
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><i class="fa fa-address-card-o"></i> {{ trans('adminlte_lang::message.personal_data') }}</a></li>
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
                                                <li class="list-group-item">
                                                    <i class="fa fa-user"></i>  <b>{{ trans('adminlte_lang::message.display_name') }}: </b>
                                                    <a> {{ $role->display_name }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-quote-left"></i>  <b>{{ trans('adminlte_lang::message.description') }}: </b>
                                                    <a> {{ $role->description }} </a>
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
                                                    <th class="col-md-2">{{ trans('adminlte_lang::message.type') }}</th>
                                                    <th class="col-md-2">{{ trans('adminlte_lang::message.name') }}</th>
                                                    <th class="col-md-8">{{ trans('adminlte_lang::message.description') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {{--{{ $role->permission }}--}}
                                                @foreach ($role->permission as $permission)
                                                    <tr>
                                                        <td class="name">{{$permission->type}} </td>
                                                        <td class="name">{{$permission->tenant_menu->menus->title}} </td>
                                                        <td class="description">{{$permission->tenant_menu->menus->description}} </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
                                                @foreach ($role->user as $user)
                                                    <tr>
                                                        <td class="name">{{$user->name}} </td>
                                                        <td class="email">{{$user->email}} </td>
                                                    </tr>
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