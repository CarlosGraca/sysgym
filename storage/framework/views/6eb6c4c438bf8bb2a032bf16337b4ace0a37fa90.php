<?php $defaults = app('App\Http\Controllers\Defaults'); ?>
<?php
    $total = 0;
    $total_discount = 0;
?>


<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(trans('adminlte_lang::message.invoice')); ?>#<?php echo e($defaults->getNumberFormat($payment->id)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice'); ?>
    <style>@page  { size: A5 }</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice-body-class'); ?>
A5
<?php $__env->stopSection(); ?>



<?php $__env->startSection('main-content'); ?>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 style="margin:0 auto;"-->

<section class="sheet padding-10mm">

        <!-- Write HTML just like a web page -->
        <div>
            <table width="100%" border="0" >
                <tr>
                    <td colspan="2"><img src="<?php echo e(asset(\Auth::user()->branch->avatar)); ?>" alt="" height="80"></td>
                </tr>
                <tr style="white-space: nowrap;">
                    <td width="43%">
                        <br>
                        <address>
                            <strong><?php echo e(\Auth::user()->branch->name); ?></strong> <br>
                            <?php echo e(\Auth::user()->branch->address.', '.\Auth::user()->branch->city); ?> <br>
                            <span>NIF:</span> <?php echo e(\Auth::user()->tenant->nif); ?> <br>
                            <span>Telef/Fax:</span> <?php echo e(\Auth::user()->branch->phone.'/'.\Auth::user()->branch->fax); ?>

                        </address>
                    </td>
                    <td width="57%">
                        <p class="text-center" style="margin-bottom: 0;"> <strong>FATURA Nº <?php echo e($defaults->getNumberFormat($payment->id)); ?> / <?php echo e(\Carbon\Carbon::parse($payment->created_at)->format('Y')); ?>


                            </strong></p>
                        <address style="border: 1px solid #0f0f0f; padding: 5px 10px; border-radius: 5px;">
                            <strong>Exmo.(s) Sr.(s)</strong> <br>
                            <strong><?php echo e($payment->client->name); ?></strong> <br>
                            <strong><?php echo e($payment->client->address.', '.$payment->client->city); ?></strong> <br>
                            <strong>NIF: <?php echo e($payment->client->nif); ?></strong>
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
                                <td><?php echo e(\Carbon\Carbon::parse($payment->created_at)->format('d/m/Y')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($payment->created_at)->addMonths(1)->format('d/m/Y')); ?></td>
                                <td><?php echo e(trans('adminlte_lang::message.'.$payment->payment_method)); ?></td>
                                <td><?php echo e(\Auth::user()->branch->system->currency); ?></td>
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

                            <?php $__currentLoopData = $payment->parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                <tr>
                                    <td><?php echo e($p->modality->name); ?></td>
                                    <td class="text-center">1</td>
                                    <td class="text-right"><?php echo e(number_format($p->value_pay, 2, ',', '')); ?></td>
                                    <td class="text-center"><?php echo e(number_format($p->discount, 1, ',', '').'%'); ?></td>
                                    <td class="text-center"><?php echo e(number_format($p->iva, 1, ',', '').'%'); ?></td>
                                    <td class="text-right"><?php echo e(number_format(floatval( $p->value_pay -(($p->value_pay*$p->discount)/100) ), 2, ',', '')); ?></td>
                                </tr>
                            <?php
                                $total += floatval( $p->value_pay -(($p->value_pay*$p->discount)/100) );
                                $total_discount += floatval( ($p->value_pay*$p->discount) /100 );
                                ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            <tr>
                                <td colspan="6" style="border-top: none; white-space: nowrap;" >
                                    <hr align="center" width="100%" style="border: 1px dotted #000; margin-bottom: 0px;">
                                    <p style="font-size: 12px; font-weight: bold;"><?php echo e(trans('adminlte_lang::message.note').': '.$payment->note); ?></p>
                                </td>
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
                        <hr align="center" width="100%" size="1" style="border: 1px solid #000;">

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
                                            <td><?php echo e(number_format($payment->iva, 1, ',', '')); ?></td>
                                            <td><?php echo e(number_format( $total , 2, ',', '')); ?></td>
                                            <td><?php echo e(number_format($payment->iva, 2, ',', '')); ?></td>
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
                                            <td width="49%" align="right"><?php echo e($defaults->currency(floatval( $payment->value_pay -(($payment->value_pay*$payment->discount)/100) ))); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Total Mercadoria s/ IVA:</td>
                                            <td align="right"><?php echo e($defaults->currency( $total )); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Desconto Global:</td>
                                            <td align="right"><?php echo e($defaults->currency( $total_discount )); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Total Liquido:</td>
                                            <td align="right"><?php echo e($defaults->currency( $total )); ?></td>
                                        </tr>
                                        <tr>
                                            <td align="right">Total IVA:</td>
                                            <td align="right"><?php echo e($defaults->currency( $payment->iva )); ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000; border-left: none; border-right: none; font-size: 18px; font-weight: bold;">
                                            <td align="right">A Pagar:</td>
                                            <td align="right"><?php echo e($defaults->currency( floatval( $total ))); ?></td>
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
                            <?php echo e($defaults->translateToWords( intval($total) ).' '.strtolower(\Auth::user()->branch->system->currency)); ?>

                        </p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="font-size:11px;">
            <span class="pull-left">
            	Documento Processado por Computador
                </span>
                        <span class="pull-right">
                           &copy; 2017 SysGym
                            
             	
                </span>
                    </td>
                </tr>

            </table>
            <!-- FIM TABLE FOOTER -->
        </div>

</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.report', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>