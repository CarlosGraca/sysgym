@extends('layouts.app')

@section('htmlheader_title')
	home
@endsection

@section('contentheader_title')
	{{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  Dashboard
@endsection


@section('main-content')
	<div class="row">
	    <div class="col-md-8 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					@include('components.tools_bar')
				</div>

				<div class="col-lg-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Agenda List</h3>
						</div>
						<div class="box-body no-padding">
							<!-- Custom tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">CONSULT TO CONFIRM</a></li>
									<li><a href="#tab_2" data-toggle="tab">CONSULT CANCELED</a></li>
									<li class="pull-right"></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1"  style="position: relative; height: 250px;">

										@if(count($agenda) == 0)
											<div class="text-center">
												<img src="{{ asset('img/no_agenda_regist.png') }}" alt="" style="margin: 20px 0;">
												<p>Congratulations! <br>All consult agenda for today is already confirmed.</p>
											</div>

										@else
											@include('components.consult_agenda_list',['consult_agenda'=>$agenda,'table_name'=>'table_row_confirm','type'=>'confirm'])
										@endif

									</div>
									<!-- /.tab-pane -->
									<div class="tab-pane" id="tab_2"  style="position: relative; height: 250px;">

										@if(count($canceled) == 0)
											<div class="text-center">
												<img src="{{ asset('img/no_agenda_regist.png') }}" alt="" style="margin: 20px 0;">
												<p>Congratulations! <br>No Consult Canceled.</p>
											</div>

										@else
											@include('components.consult_agenda_list',['consult_agenda'=>$canceled,'table_name'=>'table_row_cancel','type'=>'cancel'])
										@endif

									</div>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div>

						</div>
					</div>

				</div>

			</div>


		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-12">
					@include('dashboard.index',[])
				</div>
				<div class="col-lg-12">
					@include('users.user_list')
				</div>
			</div>

		</div>
	</div>
@endsection
