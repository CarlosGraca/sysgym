@extends('layouts.report')

@section('htmlheader_title')
	Avaliação da Apetidão Física de {{$clients[0]->name}}
@endsection

@section('main-content')
	<div class="loader" style="display:none; position:fixed; right:0; bottom:0; top:0;">
		<img src="{{asset('img/gears.gif')}}" />
	</div>
<!-- Main content -->
    <section class="invoice" id="download-content">
       <!-- this row will not appear when printing -->
			 @if($show === true)
        <div class="row no-print">
            <div class="col-xs-12">
                <span style="display: none;" id='id'>{{$test['id']}}</span>
                 <span style="display: none;" id='document'>Ficha de Avaliação Física</span>
                <a href="#" id="close-page" onclick="window.close();" class="btn btn-default pull-right"><i class="fa fa-close"></i> Close</a>
                <a href="#" id="print-page" onclick="window.print();" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</a>
                <a href="#" id="btn-download" type='tests' class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-cloud-download"></i> Download</a>
                <a href="#" id="btn-email" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-envelope"></i> Email</a>
            </div>
        </div>
				@endif
        <!-- title row -->
	    <div class="row">
	        <div class="col-xs-12">
	          <h2 class="page-header">
	            @if(isset($setting->logo_url))
    		    		<img  src="/uploads/{{$setting->logo_url}}" id="logo" class="img" alt="Cinque Terre" width="150">
    		    	@else
    		    		<img  src="/img/round-logo.jpg" id="logo" class="img-thumbnail" alt="Cinque Terre" width="150" >
		        	@endif
	            <small class="pull-right"><strong style="text-align: center;">Avaliação da Apetidão Física</strong></small>
	          </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

	        <div class="col-sm-4 invoice-col">
	          <address>
	            <b>Nome: </b><span id="name">{{$clients[0]->name}}</span><br>
	            <b>Data de nascimento: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $clients[0]->dt_nasc)->format('d-m-Y') }}<br>
	          </address>
	        </div><!-- /.col -->
	        <div class="col-sm-4 invoice-col">
	          <address>
              <span class="age" style="display:none;"><?php echo date_diff(date_create($clients[0]->dt_nasc),date_create($clients[0]->dt_test))->format('%y'); ?></span>
              <span class="sex" style="display:none;">{{$clients[0]->sexo}}</span>
              <b>Sexo:</b> {{$clients[0]->sexo == 1 ? 'Masculino':'Feminino'}} <br>
	            <b>Telemovel:</b> {{$clients[0]->telemovel}} <br>
	          </address>
	        </div><!-- /.col -->

          <div class="col-sm-4 invoice-col">
	          <address>
	            <b>Email: </b><span id="email">{{$clients[0]->email}}</span><br>
              <b>Data de avaliação: </b>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $clients[0]->dt_test)->format('d-m-Y')}}<br>
	          </address>
	        </div><!-- /.col -->

        </div><!-- /.row -->

	   <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered table-xs tabela" id="table-test">
	                <thead>
	                    <tr>
	                        <th class="col-md-6">Item avaliado</th>
	                        <th class="col-md-2" style="text-align:center;">Seus dados</th>
	                        <th class="col-md-2" style="text-align:center;">Mínimo</th>
	                        <th class="col-md-2" style="text-align:center;">Máximo</th>
	                    </tr>
	                </thead>
	                <tbody>
                      @foreach($item_name as $key => $item)
                        <tr>
                            <td>{{$item}}</td>
                            <td class="{{$key}}" style="text-align:center;">{{$test[$key]}}</td>
                            <td class="min-{{$key}}" style="text-align:center;"></td>
                            <td class="max-{{$key}}" style="text-align:center;"></td>
                        </tr>
                      @endForeach
	                </tbody>
	            </table>
            </div>
        </div>

	</section><!-- /.content -->
    <div class="clearfix"></div>
@endsection
