@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.employee') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.employee') }}
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail avatar-employee" src="{{ asset($employee->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $employee->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.employee_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('employees') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        @if($employee->status == 1)
                            @can('edit_employee')
                                <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                        @endif

                        <a href="{{ url('employees') }}/{{$employee->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab"> <i class="fa fa-address-card-o"></i> {{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                <li><a href="#documents" data-toggle="tab"> <i class="fa fa-folder-open-o"></i> {{ trans('adminlte_lang::message.documents') }}</a></li>
                                {{--<li><a href="#settings" data-toggle="tab">Settings</a></li>--}}
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="personal_data">

                                    @include('people.show',['people'=>$employee,'setting'=>['photo'=>false,'contact'=>true,'report'=>false,'work'=>true,'type_people'=>'employee']])

                                    {{--@if($employee->has_secure == 1)--}}
                                        {{--@include('secure_card.show',['card'=>$employee])--}}
                                    {{--@endif--}}
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="documents">

                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>

                                    {!! Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]) !!}
                                        {!! Form::hidden('item_id', $employee->id, ['class'=>'form-control','id'=>'item_id']) !!}
                                        {!! Form::hidden('flag', 2, ['class'=>'form-control','id'=>'flag']) !!}
                                        @include('files.form', ['type'=>'create'])
                                    {!! Form::close() !!}

                                    <table id="table-documents" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="col-md-7">{{ trans('adminlte_lang::message.file_name') }}</th>
                                            <th class="col-md-2" style="text-align: center">{{ trans('adminlte_lang::message.file_type') }}</th>
                                            <th class="col-md-2"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($Files as $file)
                                            <tr class="file_document" data-key="{{ $file->id }}">
                                                <td class="name_original">{{$file->name_original}} </td>
                                                <td class="media_type" style="text-align: center">{{$file->media_type}}</td>
                                                <td>
                                                    <a href="#!preview" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.view') }}" class="file-preview" data-url="{{ url('files') }}/{{$file->id}}/preview" style="visibility: {{ $file->media_type != 'doc' ? 'visible':'hidden' }};"><i class="fa fa-eye"></i>
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

                                {{--<div class="tab-pane" id="settings">--}}

                                {{--</div>--}}
                                {{--<!-- /.tab-pane -->--}}
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