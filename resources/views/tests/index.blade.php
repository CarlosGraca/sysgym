@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.list_test') }}
@endsection

@section('contentheader_title')
  {{ trans('adminlte_lang::message.app_name') }}
@endsection

@section('contentheader_description')
  {{ trans('adminlte_lang::message.list_test') }}
@endsection

@inject('TestController', 'App\Http\Controllers\TestController')

@section('main-content')
    @include('layouts.shared.alert')
	<div class="row">
	    <div class="col-lg-12">
	        <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title"></h3>
	              <div class="pull-left box-tools">
	                  <a href="{{ url('tests/create') }}" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="{{ trans('adminlte_lang::message.new_test') }}">
	                       <i class="fa fa-plus"></i>
	                  </a>

	              </div><!-- /. tools -->
	            </div><!-- /.box-header -->

	            <div class="box-body">
	                <table id="table-tests" class="table table-bordered table-striped">
		                <thead>
		                  <tr>
		                    <th style="width: 10px" class="col-md-1">#</th>
		                    <th class="col-md-3">Aluno</th>
		                    <th class="col-md-2">IMC kg/m²</th>
		                    <th class="col-md-2">% de Gordura</th>
		                    <th class="col-md-2">Data Avaliação</th>
		                    <th class="col-md-2"></th>
		                  </tr>
		                </thead>
		                <tbody>
							  @foreach ($tests as $test)
									<tr>
										<td>{{ $test->id }}</td>
										<td>{{ $test->client->name }}</td>
										<td>{{ $TestController->get_imc($test->peso,$test->estatura) }}</td>
										<td>{{ $test->gordura }}</td>
										<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $test->dt_test)->format('d-m-Y') }}</td>
										<td>
												<button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="{{ $test->id }}" data-name="{{ $test->name }}" data-title="Confirm test deletion" data-url="/tests/">
						                            <i class="fa fa-trash"></i>
						                        </button>
												</button>
												<a href="{{ route('tests.edit',$test->id) }}" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Editar" ])>   <i class="fa fa-edit"></i>
													</a>
												<a href="{{ url('tests/pdf/') }}/{{$test->id}}" target="_blank" class="btn btn-primary btn-xs", data-toggle="tooltip" title="Detalhes" ])>   <i class="fa fa-list-alt"></i>
														</a>
										</td>
									</tr>
								@endforeach
		                <tbody>
                </table>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
