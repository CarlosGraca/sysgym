@extends('layouts.app')

@section('htmlheader_title')
	home
@endsection

@section('contentheader_title')
	{{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="row">
	    <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					@include('components.tools_bar')
				</div>

				{{--<div class="col-lg-12">--}}
					{{--<div class="box box-default">--}}
						{{--<div class="box-header with-border">--}}
							{{--<h3 class="box-title">Consult Agenda List</h3>--}}
							{{--<div class="pull-right box-tools">--}}
                                {{--<label for="datepicker" class="add-on"><i class="icon-calendar"></i></label>--}}
                                {{--<input type="button" class="btn btn-primary btn-sm " value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" id="datepicker" style='margin-right:5px;' data-toggle="tooltip" title="Date range"/>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="box-body no-padding">--}}
							{{--<!-- Custom tabs -->--}}
							{{--<div class="nav-tabs-custom">--}}
								{{--<ul class="nav nav-tabs">--}}
									{{--<li class="active"><a href="#consult_confirm" data-toggle="tab"><img src="{{asset('/img/icon/calendar_scheduled.png')}}" alt=""> CONSULT SCHEDULED</a></li>--}}
									{{--<li><a href="#consult_cancel" data-toggle="tab"><i class="fa fa-calendar-times-o"></i> CONSULT CANCELED</a></li>--}}
									{{--<li class="pull-right"></li>--}}
								{{--</ul>--}}
								{{--<div class="tab-content">--}}
									{{--<div class="tab-pane active" id="consult_confirm"  style="position: relative; height: 250px;">--}}

										{{--@include('consult_agenda.confirm_consult_list')--}}

									{{--</div>--}}
									{{--<!-- /.tab-pane -->--}}
									{{--<div class="tab-pane" id="consult_cancel"  style="position: relative; height: 250px;">--}}

										{{--@include('consult_agenda.cancel_consult_list')--}}

									{{--</div>--}}
									{{--<!-- /.tab-pane -->--}}
								{{--</div>--}}
								{{--<!-- /.tab-content -->--}}
							{{--</div>--}}

						{{--</div>--}}
					{{--</div>--}}

				{{--</div>--}}

			</div>


		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					{{--@include('dashboard.index',[])--}}
				</div>
				<div class="col-lg-12">
					@can('view_users_page')
						@include('users.user_list')
					@endcan
				</div>
			</div>

		</div>
	</div>
@endsection
