<style type="text/css">
    * {
        font-family:Consolas
    }

    .tabela-sheet {
        border:solid 1px;
        width:100%
    }

    .tabela-sheet td {
        border:solid 1px;
    }

    .tabela-sheet .celulaEmEdicao {
        padding: 0;
    }

    .tabela-sheet .celulaEmEdicao input[type=text]{
        width:100%;
        border:0;
        background-color:rgb(255,253,210);  
    }
</style>
@include('clients.form',['form'=>null,'client'=>$client,'type'=>$type])
<div class="row">
    {!! Form::hidden('sheet_id', ($type == 'update' ? $sheet->id : null), ['class'=>'form-control','id'=>'sheet_id']) !!}
    <span ><strong class="title">Dados Ficha de Treino</strong></span>
    <hr class="h-divider" >
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            {!! Form::label('kg','Kg:') !!}
            {!! Form::text('kg',  $type == 'update' ?  $sheet->kg : null, ['class'=>'form-control']) !!}
        </div>
    </div>
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('altura','Altura:') !!}
			{!! Form::text('altura',$type == 'update' ?  $sheet->altura : null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('objective','Objectivos:') !!}
			{!! Form::text('objective', $type == 'update' ?  $sheet->objective : null, ['class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="col-lg-3 col-md-4 col-sm-6">
	    <div class="form-group form-group-sm">
	      {!! Form::label('type_student','Aluno:') !!}
	      {!! Form::select('type_student', [$type == 'update' ?  $sheet->type_student : 0=>'Escolha a Opção',1=>'Iniciante',2=>'Intermédio',3=>'Avançado'],null, ['class'=>'form-control']) !!}
	    </div>
	</div>
    <div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('training_days','Dias de treino:') !!}
			{!! Form::text('training_days', $type == 'update' ?  $sheet->training_days : null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6">
		<div class="form-group form-group-sm">
			{!! Form::label('date_start','Data Inicio:') !!}
			{!! Form::date('date_start', $type == 'update' ?  $sheet->date_start : \Carbon\Carbon::now()->subDay(0)->format('Y-m-d'), ['class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active">
             <a href="#biceps-antebraco" data-toggle="tab">Biceps e Antebraço</a>
        </li>
        <li>
            <a href="#triceps" data-toggle="tab">Triceps</a>
        </li>
        <li>
            <a href="#ombro-trapesio" data-toggle="tab">Ombros e Trapésio</a>
        </li>
        <li>
             <a href="#peitoral" data-toggle="tab">Peitoral</a>
        </li>
        <li>
            <a href="#costas" data-toggle="tab">Costas</a>
        </li>
        <li>
            <a href="#quadril-perna-coxa" data-toggle="tab">Quadril, Coxa e Perna</a>
        </li>
        <li>
             <a href="#abdmen" data-toggle="tab">Abdomen</a>
        </li>        
    </ul>
    <div class="tab-content">
        <!-- Biceps e Antebraço -->
        <div class="tab-pane active" id="biceps-antebraco">
            <table class="table table-bordered" class="tabela-sheet" id="table-biceps-antebraco">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($biceps_antebraco as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach                   
                </tbody>                                     
            </table>
        </div>
        <!-- Triceps -->
        <div class="tab-pane" id="triceps">
            <table class="table table-bordered" class="tabela-sheet" id="table-triceps">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($triceps as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach
                   
                </tbody>                                     
            </table>
        </div>
        <!-- Ombros e Trapésio -->
        <div class="tab-pane" id="ombro-trapesio">
            <table class="table table-bordered" class="tabela-sheet" id="table-ombro-trapezio">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($ombro_trapezio as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach
                   
                </tbody>                                     
            </table>
        </div>
        <!-- Ombros e Trapésio -->
        <div class="tab-pane" id="peitoral">
              <table class="table table-bordered" class="tabela-sheet" id="table-peitoral">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($peitoral as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach
                   
                </tbody>                                     
            </table>
        </div>
        <!-- Costas -->
        <div class="tab-pane" id="costas">
            <table class="table table-bordered" class="tabela-sheet" id="table-costas">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th >Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($costas as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach                   
                </tbody>                                     
            </table>
        </div>
        <!-- Quadril, Coxa e Perna -->
        <div class="tab-pane" id="quadril-perna-coxa">
            <table class="table table-bordered" class="tabela-sheet" id="table-quadril-perna-coxa">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($quadril_perna_coxa as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach
                   
                </tbody>                                     
            </table>
        </div>
        <!-- Abdmem -->
        <div class="tab-pane" id="abdmen">
              <table class="table table-bordered" class="tabela-sheet" id="table-abdomen">
                <thead>
                    <tr>
                        <th style="display:none;"></th>
                        <th>Ordem</th>
                        <th>Exercicio</th>
                        <th>Séries</th>
                        <th>Repet.</th>
                        <th>Máq.</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($abdomen as $element)
                        <tr>
                            <td style="display:none;">{{ $element->id}}</td>
                            <td class="ordem"></td>
                            <td>{{ $element->name}}</td>
                            <td class="series"></td>
                            <td class="repet"></td>
                            <td class="maq"></td>
                        </tr>
                   @endforeach
                   
                </tbody>                                     
            </table>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			{!! Form::label('note','Note:') !!}
			{!! Form::textarea('note', $type == 'update' ?  $sheet->note : null, ['class'=>'form-control','rows'=>'3','style'=>'width: 100%;'])  !!}
		</div> 
	</div>	
</div>