@inject('defaults', 'App\Http\Controllers\Defaults')

@extends('layouts.report')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.client_list') }}
@endsection

@section('invoice')
    <style>@page { size: A4 }</style>
@endsection

@section('invoice-body-class')
    A4
@endsection



@section('main-content')

    <section class="sheet padding-10mm">
        <div>
            <table width="100%" border="0" >
                <tr>
                    <td width="25%">
                        <img src="{{ asset(\Auth::user()->branch->avatar) }}" alt="" height="80">
                    </td>
                    <td width="75%">
                        <address>
                            <strong>{{ \Auth::user()->branch->name }}</strong> <br>
                            {{ \Auth::user()->branch->address.', '.\Auth::user()->branch->city }} <br>
                            <span>NIF:</span> {{ \Auth::user()->tenant->nif }} <br>
                            <span>Telef/Fax:</span> {{ \Auth::user()->branch->phone.'/'.\Auth::user()->branch->fax }}
                        </address>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4 class="text-center"><span style="border-bottom:1px solid #000; font-weight:bold;"> RELATÓRIO DE LISTA DE CLIENTES </span> </h4>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <!-- INFORMACAO DE RELATORIO -->
                        <table width="100%" border="1" class="text-center">
                            <tr>
                                <th width="31%" scope="col" class="text-center">Data</th>
                                <th width="30%" scope="col" class="text-center">Quantidade</th>
                                <th width="39%" scope="col" class="text-center">Tipo de Relatório</th>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
                                <td>{{ count($people) }}</td>
                                <td>Clientes activos</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;

                    </td>
                </tr>

                <!-- LISTAGEM DE CLIENTES -->
                <tr>
                    <td colspan="2">
                        <table width="100%" border="0" class="table table-hover" style="white-space: normal;">
                            <tr>
                                <th width="26%" scope="col">Nome</th>
                                <th width="28%" class="text-center" scope="col">Email</th>
                                <th width="18%" class="text-center" scope="col">Contactos</th>
                                <th width="11%" class="text-center" scope="col">Género</th>
                                <th width="17%" class="text-center" scope="col">Endereço</th>
                            </tr>

                            @foreach($people as $person)
                            <tr>
                                <td>{{ $person->name }}</td>
                                <td align="center">{{ $person->name }}</td>
                                <td>{{ $person->mobile.' / '.$person->phone }}</td>
                                <td align="center">{{trans('adminlte_lang::message.'.$person->genre)}}</td>
                                <td>{{ $person->address }}</td>
                            </tr>
                            @endforeach

                        </table>
                    </td>
                </tr>
                <!-- FIM DA LISTAGEM DE CLIENTES -->

            </table>
        </div>

        <!-- FOOTER -->

        <div style="width: 718px; position:absolute; bottom: 0; margin-bottom: 10px;">
            <!-- TABLE FOOTER style="position:absolute; bottom:0; margin-bottom: 10px;" -->
            <table style="white-space: nowrap;" width="100%">

                <tbody>

                <tr>

                    <td colspan="2">&nbsp;

                    </td>
                    <!-- FIM TABLE FOOTER LADO DIREITO -->
                </tr>

                <tr>
                    <td colspan="2" style="font-size:11px; border-top: 1px solid #000;">
                        <span class="pull-left">
                            Documento Processado por Computador
                            </span>
                        <span class="pull-right">
                            &copy; 2017 SysGym
                            </span>
                    </td>
                </tr>

                </tbody>
            </table>
            <!-- FIM TABLE FOOTER -->
        </div>
    </section>

@endsection