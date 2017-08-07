@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.employees_category') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.employees_category') }}
@endsection

@inject('Defaults', 'App\Http\Controllers\Defaults')


@section('main-content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.employees_category_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('employees_category') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i> {{ trans('adminlte_lang::message.employees_category_list') }}
                        </a>
                        <a href="{{ route('employees_category.edit',$employees_category->id) }}" class="btn btn-primary btn-sm"  data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i> {{ trans('adminlte_lang::message.edit') }}
                        </a>
                        <a href="{{ url('employees_category') }}/{{$employees_category->id}}/print" class="btn btn-primary btn-sm" target="_blank" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i> {{ trans('adminlte_lang::message.print') }}
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"><i class="fa fa-address-card-o"></i> {{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                <li><a href="#employees" data-toggle="tab"><i class="fa fa-users"></i> {{ trans('adminlte_lang::message.employees') }}</a></li>
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
                                                    <a> {{ $employees_category->name }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-money"></i>  <b>{{ trans('adminlte_lang::message.salary_base') }}: </b>
                                                    <a> {{ $Defaults->currency($employees_category->salary_base) }} </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="employees">

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
                                                @foreach ($employees_category->employee as $employee)
                                                    <tr>
                                                        <td>{{$employee->name}} </td>
                                                        <td>{{$employee->email}} </td>
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