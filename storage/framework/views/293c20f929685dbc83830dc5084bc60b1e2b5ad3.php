<?php $defaults = app('App\Http\Controllers\Defaults'); ?>



<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.client_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice'); ?>
    <style>@page  { size: A4 }</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('invoice-body-class'); ?>
    A4
<?php $__env->stopSection(); ?>



<?php $__env->startSection('main-content'); ?>

    <section class="sheet padding-10mm">
        <div>
            <table width="100%" border="0" >
                <tr>
                    <td width="25%">
                        <img src="<?php echo e(asset(\Auth::user()->branch->avatar)); ?>" alt="" height="80">
                    </td>
                    <td width="75%">
                        <address>
                            <strong><?php echo e(\Auth::user()->branch->name); ?></strong> <br>
                            <?php echo e(\Auth::user()->branch->address.', '.\Auth::user()->branch->city); ?> <br>
                            <span>NIF:</span> <?php echo e(\Auth::user()->tenant->nif); ?> <br>
                            <span>Telef/Fax:</span> <?php echo e(\Auth::user()->branch->phone.'/'.\Auth::user()->branch->fax); ?>

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
                                <td><?php echo e(\Carbon\Carbon::now()->format('d/m/Y')); ?></td>
                                <td><?php echo e(count($people)); ?></td>
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

                            <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($person->name); ?></td>
                                <td align="center"><?php echo e($person->name); ?></td>
                                <td><?php echo e($person->mobile.' / '.$person->phone); ?></td>
                                <td align="center"><?php echo e(trans('adminlte_lang::message.'.$person->genre)); ?></td>
                                <td><?php echo e($person->address); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.report', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>