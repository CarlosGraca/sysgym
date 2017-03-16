@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.agenda') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
    Agenda
@endsection

@section('main-content')

    <!-- /.box-body -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">{{ trans('adminlte_lang::message.consult_calendar') }}</h3>

            <div class="box-tools">
                <div class="btn-group pull-right">
                    <a href="#" class="btn btn-primary btn-sm " data-toggle="tooltip" id="add-agenda" data-url="{{ url('consult_agenda/create') }}" title="{{ trans('adminlte_lang::message.consult_agenda') }}">
                        <i class="fa fa-calendar-plus-o"></i> {{ trans('adminlte_lang::message.consult_agenda') }}
                    </a>
            
                    <a href="{{ url('consult_agenda') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.consult_list') }}" style="display:none;">
                        <i class="fa fa-list"></i>
                    </a>

                </div>
            </div>
        </div>

        <div class="box-body">
            <!-- THE CALENDAR -->
            <div id="calendar" ></div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection