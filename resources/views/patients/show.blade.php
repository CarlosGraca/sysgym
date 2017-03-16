@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.patient') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    {{ trans('patients') }}
@endsection


@section('main-content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="text-center">
                        <img class="thumbnail" src="{{ asset($patient->avatar) }}" style="max-width: 100%; width: 250px; margin: 0 auto; z-index: -1;">
                        <i class="fa fa-camera" style="  position: absolute; left: 0; top: 50%; width: 100%; text-align: center;   font-size: 18px; display: none;"></i>
                    </div>

                    <h3 class="profile-username text-center">{{ $patient->name }}</h3>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('adminlte_lang::message.patient_profile') }}</h3>
                    <div class="pull-right box-tools">
                        <a href="{{ url('patients') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.list') }}">
                            <i class="fa fa-list"></i>
                        </a>
                        <a href="{{ url('patients') }}/{{$patient->id}}/print" class="btn btn-primary btn-sm" target="_blank" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.print') }}">
                            <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('patients.edit',$patient->id) }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.edit') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#personal_data" data-toggle="tab">{{ trans('adminlte_lang::message.personal_data') }}</a></li>
                                <li><a href="#documents" data-toggle="tab">{{ trans('adminlte_lang::message.documents') }}</a></li>
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
                                                    <a> {{ $patient->name }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-venus-mars"></i>  <b>{{ trans('adminlte_lang::message.genre') }}: </b>
                                                    <a> {{trans('adminlte_lang::message.'.$patient->genre)}} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-heart"></i>  <b>{{ trans('adminlte_lang::message.civil_state') }}: </b>
                                                    <a>{{ trans('adminlte_lang::message.'.$patient->civil_state.'') }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-birthday-cake"></i>  <b>{{ trans('adminlte_lang::message.birthday') }}: </b>
                                                    <a>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->birthday)->format('d-m-Y') }}</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b>{{ trans('adminlte_lang::message.nationality') }}: </b>
                                                    <a> {{ $patient->nationality }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b>{{ trans('adminlte_lang::message.bi') }}: </b>
                                                    <a> {{$patient->bi}} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-vcard-o"></i>  <b>{{ trans('adminlte_lang::message.nif') }}: </b>
                                                    <a>{{ $patient->nif }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-users"></i>  <b>{{ trans('adminlte_lang::message.parents') }}: </b>
                                                    <a>{{  $patient->parents }}</a>
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
                                                    <a> {{ $patient->address }}, {{ $patient->city }}, {{ $patient->island->name }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b>{{ trans('adminlte_lang::message.email') }}: </b>
                                                    <a> {{$patient->email }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.phone') }}: </b>
                                                    <a>{{ $patient->phone }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-mobile"></i>  <b>{{ trans('adminlte_lang::message.mobile') }}: </b>
                                                    <a>{{ $patient->mobile}}</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-id-card"></i>  <b>{{ trans('adminlte_lang::message.zip_code') }}: </b>
                                                    <a> {{ $patient->zip_code }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-globe"></i>  <b>{{ trans('adminlte_lang::message.website') }}: </b>
                                                    <a> {{$patient->website}} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-facebook-official"></i>  <b>{{ trans('adminlte_lang::message.facebook') }}: </b>
                                                    <a>{{ $patient->facebook }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-shield"></i>  <b>{{ trans('adminlte_lang::message.has_secure') }}: </b>
                                                    <a>{{  $patient->has_secure == 1 ? trans('adminlte_lang::message.yes') : trans('adminlte_lang::message.not') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- WORK INFORMATION -->
                                    <div class="row">
                                        <span ><strong class="title"> <i class="fa fa-briefcase"></i> {{ trans('adminlte_lang::message.work_information') }}</strong></span>
                                        <hr class="h-divider" >
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-map-marker"></i>  <b>{{ trans('adminlte_lang::message.address') }}: </b>
                                                    <a> {{ $patient->work_address }} </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <i class="fa fa-at"></i>  <b>{{ trans('adminlte_lang::message.profession') }}: </b>
                                                    <a> {{$patient->profession }} </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <i class="fa fa-phone"></i>  <b>{{ trans('adminlte_lang::message.work_phone') }}: </b>
                                                    <a> {{ $patient->work_phone }} </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                @if($patient->has_secure == 1)
                                    <!-- SECURE INFORMATION -->
                                        <div class="row">
                                            <span ><strong class="title"> <i class="fa fa-shield"></i> {{ trans('adminlte_lang::message.secure_information') }}</strong></span>
                                            <hr class="h-divider" >
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <i class="fa fa-shield"></i>  <b>{{ trans('adminlte_lang::message.secure_agency') }}: </b>
                                                        <a href="{{ route('secure_agency.show',$patient->secure_card->secure_agency->id) }}"> {{ $patient->secure_card->secure_agency->name }} </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa fa-id-card-o"></i>  <b>{{ trans('adminlte_lang::message.secure_number') }}: </b>
                                                        <a> {{ $patient->secure_card->secure_number }} </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa fa-quote-left"></i>  <b>{{ trans('adminlte_lang::message.note') }}: </b>
                                                        <a> {{ $patient->secure_card->note }} </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <i class="fa fa-calendar"></i>  <b>{{ trans('adminlte_lang::message.start_date') }}: </b>
                                                        <a> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->secure_card->start_date)->format('d-m-Y') }} </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa fa-calendar"></i>  <b>{{ trans('adminlte_lang::message.end_date') }}: </b>
                                                        <a> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $patient->secure_card->end_date)->format('d-m-Y') }} </a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    @endif
                                
                                </div>
                                <!-- /.tab-pane -->

                                <!-- DOCUMENTS TABLE-->
                                <div class="tab-pane" id="documents">

                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                    </div>

                                    {!! Form::open(['route'=>'files.store', 'id'=>'files-form','files'=>true]) !!}
                                        {!! Form::hidden('item_id', $patient->id, ['class'=>'form-control','id'=>'item_id']) !!}
                                        {!! Form::hidden('flag', 1, ['class'=>'form-control','id'=>'flag']) !!}
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