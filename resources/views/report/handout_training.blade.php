
@extends('layouts.report')

@section('htmlheader_title')
	Ficha de Treino de {{$clients->name}}
@endsection

@section('main-content')
    <style type="text/css">
        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
            padding: 1px 1px 1px 8px;
        }
    </style>
    <div class="loader" style="display:none; position:fixed; right:0; bottom:0; top:0;">
		<img src="{{asset('img/gears.gif')}}" />
	</div>
<!-- Main content -->
    <section class="invoice" id="download-content">
       <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                 <span style="display: none;" id='document'>Ficha de Treino</span>
                <a href="#" id="close-page" onclick="window.close();" class="btn btn-default pull-right"><i class="fa fa-close"></i> Close</a>
                <a href="#" id="print-page" onclick="window.print();"  style="margin-right: 5px;" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
                <a href="#" id="btn-download" type='sheets' style="margin-right: 5px;" class="btn btn-default pull-right"><i class="fa fa-cloud-download"></i> Download</a>
                <a href="#" id="btn-email" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-envelope"></i> Email</a>
            </div>
        </div>
        <!-- title row -->
	    <div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
    		       @if(isset($setting->logo_url))
        		    	<img  src="/uploads/{{$setting->logo_url}}" class="img" alt="Cinque Terre" width="150">
        		    @else
        		    	<img  src="/img/round-logo.jpg" class="img-thumbnail" alt="Cinque Terre" width="150" >
    		        @endif
	            <small class="pull-right"><strong style="text-align: center;">Ficha de Treino</strong></small>
	          </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

	        <div class="col-sm-3 invoice-col">
	          <address>
	            <b>Nome: </b><span id="name">{{$clients->name}}</span><br>
	            <b>Data de nacimento: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $clients->dt_nasc)->format('d-m-Y') }}<br>
	          </address>
	        </div><!-- /.col -->
	        <div class="col-sm-3 invoice-col">
	          <address>
	            @if ($clients->type_student === 1 )
	            	<b>Aluno: </b>Iniciante<br>
	            @elseif($clients->type_student === 2)
	            	<b>Aluno: </b>Intermédio<br>
	             @elseif($clients->type_student === 3)
	            	<b>Aluno: </b>Avançado<br>
	            @endif

	            <b>Objetivos: </b>{{$clients->objective}}<br>
	          </address>
	        </div><!-- /.col -->
	        <div class="col-sm-3 invoice-col">
	          <b>Dias de treino: </b>{{$clients->training_days}}<br>
	          <b>Data de Inicio: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $clients->date_start)->format('d-m-Y') }}<br>
	        </div><!-- /.col -->
	        <div class="col-sm-3 invoice-col">
	          <b>Email: </b><span id="email">{{$clients->email}}</span><br>
	          <b>KG: </b><span id="kg">{{$clients->kg}}</span><br>
	        </div><!-- /.col -->
        </div><!-- /.row -->
	   <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-xs" class="tabela-sheet" id="table-biceps-antebraco">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Biceps e Antebraço</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($biceps_antebraco as $element)
                              <tr>
                                  <td>{{$element->ordem}}</td>
                                  <td>{{$element->name}}</td>
                                  <td>{{$element->serie}}</td>
                                  <td>{{$element->repet}}</td>
                                  <td>{{$element->map}}</td>
                              </tr>
                        @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
	    <div class="row">
	        <div class="col-xs-12 table-responsive">
                <table class="table table-bordered" class="tabela-sheet" id="table-triceps">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Triceps</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($triceps as $element)
                              <tr>
                                  <td>{{$element->ordem}}</td>
                                  <td>{{$element->name}}</td>
                                  <td>{{$element->serie}}</td>
                                  <td>{{$element->repet}}</td>
                                  <td>{{$element->map}}</td>
                              </tr>
                        @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
	    <div class="row">
	        <div class="col-xs-12 table-responsive">
                <table class="table table-bordered" class="tabela-sheet" id="table-ombro-trapezio">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Ombro e Trapézio</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($ombro_trapezio as $element)
                              <tr>
                                  <td>{{$element->ordem}}</td>
                                  <td>{{$element->name}}</td>
                                  <td>{{$element->serie}}</td>
                                  <td>{{$element->repet}}</td>
                                  <td>{{$element->map}}</td>
                              </tr>
                        @endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-xs-12 table-responsive">
	            <table class="table table-bordered" class="tabela-sheet" id="table-peitoral">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Peitoral</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($peitoral as $element)
                              <tr>
                                  <td>{{$element->ordem}}</td>
                                  <td>{{$element->name}}</td>
                                  <td>{{$element->serie}}</td>
                                  <td>{{$element->repet}}</td>
                                  <td>{{$element->map}}</td>
                              </tr>
                        @endforeach
	                </tbody>
	            </table>
	         </div>
		</div>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered" class="tabela-sheet" id="table-costas">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Costas</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($costas as $element)
                              <tr>
                                  <td>{{$element->ordem}}</td>
                                  <td>{{$element->name}}</td>
                                  <td>{{$element->serie}}</td>
                                  <td>{{$element->repet}}</td>
                                  <td>{{$element->map}}</td>
                              </tr>
                        @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 table-responsive">
	            <table class="table table-bordered" class="tabela-sheet" id="table-quadril-perna-coxa">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Quadril, Coxa e Perna</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                     @foreach ($quadril_perna_coxa as $element)
	                        <tr>
	                            <td>{{$element->ordem}}</td>
	                            <td>{{$element->name}}</td>
	                            <td>{{$element->serie}}</td>
	                            <td>{{$element->repet}}</td>
	                            <td>{{$element->map}}</td>
	                        </tr>
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
        </div>
	    <div class="row">
	        <div class="col-xs-12 table-responsive">
	            <table class="table table-bordered" class="tabela-sheet" id="table-abdomen">
	                <thead>
	                    <tr>
	                        <th class="col-md-1">Ordem</th>
	                        <th class="col-md-8">Exercicio: <span class="text-uppercase text-danger">Abdomen</span></th>
	                        <th class="col-md-1">Séries</th>
	                        <th class="col-md-1">Repet.</th>
	                        <th class="col-md-1">Máq.</th>
	                    </tr>
	                </thead>
	                <tbody>
	                     @foreach ($abdomen as $element)
                            <tr>
                                <td>{{$element->ordem}}</td>
                                <td>{{$element->name}}</td>
                                <td>{{$element->serie}}</td>
                                <td>{{$element->repet}}</td>
                                <td>{{$element->map}}</td>
                            </tr>
                        @endforeach
	                </tbody>
	            </table>
            </div>
        </div>
	</section><!-- /.content -->
    <div class="clearfix"></div>
@endsection
