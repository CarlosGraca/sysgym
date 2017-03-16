@extends('layouts.report')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.setup_system') }}
@endsection

@section('main-content')
    <!-- BEGIN VALIDATION FORM WIZARD -->
    <div class="row" style="margin-top: 10px; ">
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span> <i class="fa fa-gears"></i> {{ trans('adminlte_lang::message.setup_system') }}</span>
                    </h3>
                </div>
                <div class="box-body">
                    <div id="setup_wizard" class="form-wizard form-wizard-horizontal">
                            <div class="form-wizard-nav">
                                <div class="progress active">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped"></div>
                                </div>
                                <ul class="nav nav-justified nav-tabs-custom" id="nav-tab">
                                    <li class="active" data-key="1"><a href="#step1" data-toggle="tab"><span class="step"><i class="fa fa-building"></i></span> <span class="title">{{ trans('adminlte_lang::message.company') }}</span></a></li>
                                    <li data-key="2"><a href="#step2" data-toggle="tab"><span class="step"><i class="fa fa-user-secret"></i></span> <span class="title">{{ trans('adminlte_lang::message.user') }}</span></a></li>
                                    <li data-key="3"><a href="#step3" data-toggle="tab"><span class="step"><i class="fa fa-wrench"></i></span> <span class="title">{{ trans('adminlte_lang::message.system') }}</span></a></li>
                                </ul>
                            </div><!--end .form-wizard-nav -->
                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="step1">
                                    <div class="col-lg-12">
                                    <br/><br/>
                                        {!! Form::open(['route'=>'company.store', 'id'=>'company-form','files'=>true,'class'=>'form-validation-1']) !!}
                                            @include('company.form', ['submitButtonText'=>'Save','type'=>'create','form'=>'setup'])
                                        {!! Form::close() !!}
                                    </div>
                                </div><!--end #step1 -->
                                <div class="tab-pane" id="step2">
                                    <div class="col-lg-12">
                                        <br/><br/>
                                        {!! Form::open(['route'=>'users.store', 'id'=>'user-form','files'=>true,'class'=>'form-validation-2']) !!}
                                            @include('users.form', ['type'=>'create'])
                                        {!! Form::close() !!}
                                    </div>
                                </div><!--end #step2 -->
                                <div class="tab-pane" id="step3">
                                    <div class="col-lg-12">
                                        <br/><br/>
                                        {!! Form::model($system, ['method'=>'PATCH','route'=>['system.update', $system->id],'id'=>'system-form','files'=>true,'class'=>'form-validation-3'])!!}
                                            @include('system.form', ['submitButtonText'=>'save','type'=>'update','form'=>'setup'])
                                        {!! Form::close() !!}
                                    </div>
                                </div><!--end #step3 -->
                                <div class="col-lg-12">
                                    <ul class="pager wizard">
                                        <li class="previous"><a class="btn-raised" href="javascript:void(0);"><i class="fa fa-arrow-left"></i> Previous</a></li>
                                        <li class="next"><a class="btn-raised" href="javascript:void(0);">Next <i class="fa fa-arrow-right"></i></a></li>
                                        <li class="pull-right submit" style="display: none;"><a class="btn-raised" href="javascript:void(0);" id="send">Submit <i class="fa fa-send"></i></a></li>
                                    </ul>
                                </div>
                        </div>

                    </div><!--end #rootwizard -->
                </div>
                <div class="box-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0.0
                    </div>
                    <strong>Copyright &copy; 2016-<span id="app_date"></span> <a href="#">MCSolution</a>.</strong> All rights reserved.
                </div>
            </div><!--end .col -->
        </div>
    </div><!--end .row -->
    <!-- END VALIDATION FORM WIZARD -->
@endsection