@extends('layouts.report')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.client_profile') }}
@endsection

@section('invoice')
    <style>@page { size: A5 }</style>
@endsection

@section('invoice-body-class')
A5
@endsection

@inject('defaults', 'App\Http\Controllers\Defaults')


@section('main-content')

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 style="margin:0 auto;"-->
<section class="sheet padding-10mm" style="margin:0 auto;">

        <!-- Write HTML just like a web page -->
        <div>
            <table width="100%" border="0" >
                <tr>
                    <td colspan="2"><img src="{{ asset(\Auth::user()->branch->avatar) }}" alt="" height="80"></td>
                </tr>
                <tr style="white-space: nowrap;">
                    <td width="43%">
                        <br>
                        <address>
                            <strong>{{ \Auth::user()->branch->name }}</strong> <br>
                            {{ \Auth::user()->branch->address.', '.\Auth::user()->branch->city }} <br>
                            <span>NIF:</span> {{ \Auth::user()->tenant->nif }} <br>
                            <span>Telef/Fax:</span> {{ \Auth::user()->branch->phone.'/'.\Auth::user()->branch->fax }}
                        </address>
                    </td>
                    <td width="57%">
                        <p class="text-center" style="margin-bottom: 0;"> <strong>FATURA Nº 001/2017</strong></p>
                        <address style="border: 1px solid #0f0f0f; padding: 5px 10px; border-radius: 5px;">
                            <strong>Exmo.(s) Sr.(s)</strong> <br>
                            <strong>{{ $payment->client->name }}</strong> <br>
                            <strong>{{ $payment->client->address.', '.$payment->client->city }}</strong> <br>
                            <strong>NIF: {{ $payment->client->nif }}</strong>
                        </address>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><table width="100%" border="1" class="text-center">
                            <tr>
                                <th width="25%" scope="col" class="text-center">Data</th>
                                <th width="25%" scope="col" class="text-center">Vencimento</th>
                                <th width="35%" scope="col" class="text-center">Forma de Pagamento</th>
                                <th width="15%" scope="col" class="text-center">Moeda</th>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->addMonths(1)->format('d/m/Y') }}</td>
                                <td>{{ trans('adminlte_lang::message.'.$payment->payment_method) }}</td>
                                <td>{{ \Auth::user()->branch->system->currency }}</td>
                            </tr>
                        </table>          </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="100%" border="0" class="table table-hover" style="white-space: nowrap;">
                            <tr>
                                <th width="45%" scope="col">Produto/Descrição</th>
                                <th width="4%" class="text-center" scope="col">Qt.</th>
                                <th width="14%" class="text-right" scope="col">Preço</th>
                                <th width="15%" class="text-center" scope="col">%Desc</th>
                                <th width="11%" class="text-center" scope="col">%IVA</th>
                                <th width="11%" class="text-right" scope="col">Valor</th>
                            </tr>
                            <tr>
                                <td>{{ $payment->modality->name }}</td>
                                <td class="text-center">1</td>
                                <td class="text-right">{{ $payment->value_pay }}</td>
                                <td class="text-center">{{ number_format($payment->discount, 1, ',', '').'%' }}</td>
                                <td class="text-center">{{ number_format($payment->iva, 1, ',', '').'%' }}</td>
                                <td class="text-right">{{ number_format(floatval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) ), 2, ',', '')  }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>


            </table>


        </div>

        <div style="width: 483px; position:absolute; bottom: 0; margin-bottom: 10px;">
            <!-- TABLE FOOTER style="position:absolute; bottom:0; margin-bottom: 10px;" -->
            <table style="white-space: nowrap;" width="100%">

                <tr>

                    <td colspan="2">
                        <hr align="center" width="100%" size="1">

                        <table width="100%" border="0">
                            <tr>
                                <!-- TABLE FOOTER LADO ESQUERDO -->

                                <td width="48%" valign="top">

                                    <!-- QUADRO DE RESUMO DE IVA -->
                                    <table width="95%" border="1" class="text-center">
                                        <tr>
                                            <td colspan="3" class="text-center">Quadro Resumo do IVA</td>
                                        </tr>
                                        <tr>
                                            <td><strong>TAXA (%)</strong></td>
                                            <td><strong>Incidência</strong></td>
                                            <td><strong>Valor</strong></td>
                                        </tr>
                                        <tr>
                                            <td>{{ number_format($payment->iva, 1, ',', '') }}</td>
                                            <td>{{ number_format(floatval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) ), 2, ',', '')  }}</td>
                                            <td>{{ number_format($payment->iva, 2, ',', '') }}</td>
                                        </tr>
                                    </table>
                                    <!-- FIM DO QUADRO DE RESUMO DE IVA -->

                                </td>
                                <!-- FIM TABLE FOOTER LADO ESQUERDO -->

                                <!-- TABLE FOOTER LADO DIREITO -->
                                <td width="52%">

                                    <!-- TABLE TOTAL A PAGAR -->
                                    <table width="100%" border="0">
                                        <tr>
                                            <td width="51%" align="right">Total Mercadoria c/ IVA:</td>
                                            <td width="49%" align="right">{{ $defaults->currency(floatval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) )) }}</td>
                                        </tr>
                                        <tr>
                                            <td align="right">Total Mercadoria s/ IVA:</td>
                                            <td align="right">{{ $defaults->currency( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) ) }}</td>
                                        </tr>
                                        <tr>
                                            <td align="right">Desconto Global:</td>
                                            <td align="right">{{ $defaults->currency($payment->discount) }}</td>
                                        </tr>
                                        <tr>
                                            <td align="right">Total Liquido:</td>
                                            <td align="right">{{ $defaults->currency(floatval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) )) }}</td>
                                        </tr>
                                        <tr>
                                            <td align="right">Total IVA:</td>
                                            <td align="right">{{ $defaults->currency($payment->iva ) }}</td>
                                        </tr>
                                        <tr style="border: 1px solid #000; border-left: none; border-right: none; font-size: 18px; font-weight: bold;">
                                            <td align="right">A Pagar:</td>
                                            <td align="right">{{ $defaults->currency(floatval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) )) }}</td>
                                        </tr>
                                    </table>
                                    <!-- FIM TABLE TOTAL A PAGAR -->
                                </td>
                                <!-- FIM TABLE FOOTER LADO DIREITO -->
                            </tr>

                        </table>

                    </td>

                </tr>

                <tr>
                    <td colspan="2">
                        <p class="text-center" style="border: 1px solid #000; border-left:none; border-right:none; margin-top:10px; white-space: normal; width: 483px;">
                            {{ $defaults->translateToWords( intval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) ) ).' '.strtolower(\Auth::user()->branch->system->currency) }}
                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="font-size:11px;">
            <span class="pull-left">
            	Documento Processado por Computador
                </span>
                        <span class="pull-right">
             	Original
                </span>
                    </td>
                </tr>

            </table>
            <!-- FIM TABLE FOOTER -->
        </div>

</section>

@endsection
