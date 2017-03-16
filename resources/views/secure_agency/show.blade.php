@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.patient') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('adminlte_lang::message.secure_agency') }}
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="{{ asset($agency->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $agency->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.agency_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('secure_agency') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ url('secure_agency') }}/{{$agency->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('secure_agency.edit',$agency->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab">{{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                <li><a href="#insured" data-toggle="tab">{{ trans('adminlte_lang::message.insured') }}</a></li>
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
                                                    <a> {{ $agency->name }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b>{{ trans('adminlte_lang::message.nif') }}: </b>
                                                    <a>{{ $agency->nif }}</a>
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
                                                    <a> {{ $agency->address }}, {{ $agency->city }}, {{ $agency->island->name }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b>{{ trans('adminlte_lang::message.email') }}: </b>
                                                    <a href="mailto:{{ $agency->email }}"> {{$agency->email }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.phone') }}: </b>
                                                    <a href="tel:{{ $agency->phone }}">{{ $agency->phone }}</a>
                                                </li>

                                                <li class="list-group-item">
                                                    <i class="fa fa-facebook-official"></i>  <b>{{ trans('adminlte_lang::message.facebook') }}: </b>
                                                    <a>{{ $agency->facebook }}</a>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b>{{ trans('adminlte_lang::message.zip_code') }}: </b>
                                                    <a> {{ $agency->zip_code }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-globe"></i>  <b>{{ trans('adminlte_lang::message.website') }}: </b>
                                                    {!! link_to($agency ? $agency->website : null, $title = null, $attributes = ['target'=>'blank'], $secure = null) !!}
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-fax"></i>  <b>{{ trans('adminlte_lang::message.fax') }}: </b>
                                                    <a href="tel:{{ $agency->fax }}">{{ $agency->fax}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>
                                <!-- /.tab-pane -->

                                <!-- INSURED TABLE-->
                                <div class="tab-pane" id="insured">
                                    <table id="table-insured" class="table table-bordered table-striped table-design">
                                        <thead>
                                        <tr>
                                            <th class="col-md-4">{{ trans('adminlte_lang::message.insured_category') }}</th>
                                            <th class="col-md-4">{{ trans('adminlte_lang::message.name') }}</th>
                                            <th class="col-md-2">{{ trans('adminlte_lang::message.secure_number') }}</th>
                                            <th class="col-md-2">{{ trans('adminlte_lang::message.start_date') }}</th>
                                            <th class="col-md-3">{{ trans('adminlte_lang::message.end_date') }}</th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($insureds as $insured)
                                                <?php $patient = \App\Patient::where(['secure_card_id'=>$insured->id,'has_secure'=>1])->first(); ?>
                                                <?php $employee = \App\Employee::where(['secure_card_id'=>$insured->id,'has_secure'=>1])->first(); ?>

                                            @if(count($patient) != 0 || count($employee) != 0)
                                                <tr>
                                                    <td>{{ count($patient) != 0 ?  trans('adminlte_lang::message.patient')  : trans('adminlte_lang::message.employee')  }}</td>
                                                    <td>{{ count($patient) != 0 ? $patient->name : $employee->name }}</td>
                                                    <td>{{$insured->secure_number}}</td>
                                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $insured->start_date)->format('d-m-Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $insured->end_date)->format('d-m-Y') }}</td>
                                                    <td>
                                                        <a href="{{ count($patient) != 0 ? route('patients.show',$patient->id) : route('employees.show',$employee->id) }}" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.show_details') }}" data-remote='false'><i class="fa fa-address-card"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tbody>
                                    </table>
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