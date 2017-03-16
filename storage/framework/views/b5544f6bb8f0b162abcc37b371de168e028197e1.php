<div class="box-body slimscroll table-responsive no-padding">
    <table id="table-consult_agenda" class="table table-hover">

        <tbody>
        <?php $__currentLoopData = $consult_agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr class="<?php echo e($table_name); ?>" data-key="<?php echo e($agenda->id); ?>">
                <td class="col-md-6">

                    <div class="user-panel">
                        <div class="pull-left image">
                            <img  src="<?php echo e(url('/')); ?>/<?php echo e($agenda->patient_avatar); ?>" class="list_image" alt="Cinque Terre" style="max-height: 50px; max-width: 50px;">
                        </div>
                        <div class="pull-left info">
                            <p>
                                <a class="users-list-name" href="<?php echo e(route('patients.show',$agenda->patient_id)); ?>" data-toggle="tooltip"  data-placement="bottom" title="<?php echo e($agenda->patient); ?>" style="margin-bottom: 5px;" ><?php echo e($agenda->patient); ?></a>
                                <a href="tel:<?php echo e($agenda->mobile); ?>" style="color: rgba(0, 0, 0, 0.51); " ><i class="fa fa-mobile"></i> <?php echo e($agenda->mobile); ?> /</a>  <a href="tel:<?php echo e($agenda->phone); ?>" style="color: rgba(0, 0, 0, 0.51); " ><i class="fa fa-phone"></i> <?php echo e($agenda->phone); ?></a>
                                <br>
                                <a href="#" style="color: rgba(0, 0, 0, 0.51);" ><i class="fa fa-at"></i> <?php echo e($agenda->email); ?></a>
                            </p>
                            <!-- Status -->
                        </div>
                    </div>

                </td>

                <td class="col-md-3">
                    <div class="user-panel">
                        <div class="text-center">
                            <p>
                                <a class="users-list-name" href="#" data-toggle="tooltip"  data-placement="bottom" title="<?php echo e(\Carbon\Carbon::parse($agenda->date)->diffForHumans()); ?>" ><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $agenda->date)->format('d/m/Y')); ?> - <?php echo e($agenda->starttime); ?></a>
                                <span style="color: rgba(0, 0, 0, 0.51); display: block; white-space: nowrap; text-overflow: ellipsis;">
								  <?php echo e(trans('adminlte_lang::message.by')); ?> <a href="#" style=" color: rgba(0, 0, 0, 0.51);"  data-toggle="tooltip"  data-placement="top" title="<?php echo e($agenda->user_name); ?>" ><?php echo e($agenda->user_name); ?></a>
								</span>
                            </p>
                            <!-- Status -->
                        </div>
                    </div>
                </td>

                <td class="col-md-3">
                    <div class="user-panel">
                        <div class="pull-right text-center">
                            <div class="btn-group">

                                <?php if($type == 'confirm'): ?>
                                    <a href="#confirm" data-toggle="tooltip" data-placement="left"  data-key="<?php echo e($agenda->id); ?>" id="agenda_confirm" title="<?php echo e(trans('adminlte_lang::message.confirm')); ?>">
                                        <i class="fa fa-check"></i>
                                    </a>

                                    <a href="#edit" data-url="<?php echo e(route('consult_agenda.edit',$agenda->id)); ?>" data-placement="left" class="show-agenda-modal" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.edit')); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="#cancel" data-toggle="tooltip" data-placement="left"  data-key="<?php echo e($agenda->id); ?>" id="agenda_cancel" title="<?php echo e(trans('adminlte_lang::message.cancel')); ?>">
                                        <i class="fa fa-ban"></i>
                                    </a>

                                <?php else: ?>
                                    <a href="#re-agenda" data-toggle="tooltip" data-placement="left"  data-key="<?php echo e($agenda->id); ?>" id="agenda_re_agenda" title="<?php echo e(trans('adminlte_lang::message.re_agenda')); ?>">
                                        <i class="fa fa-repeat"></i>
                                    </a>
                                <?php endif; ?>


                                <a href="#notification" data-toggle="tooltip" data-placement="left" data-key="<?php echo e($agenda->id); ?>" id="agenda_notificate" title="<?php echo e(trans('adminlte_lang::message.send_notification')); ?>">
                                    <i class="fa fa-send"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <tbody>

    </table>
</div>