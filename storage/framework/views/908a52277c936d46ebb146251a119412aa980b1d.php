<?php $Defaults = app('App\Http\Controllers\Defaults'); ?>

<table id="table-backup" class="table table-bordered table-responsive table-design">
    <thead>
    <tr>
        <th class="col-md-5"><?php echo e(trans('adminlte_lang::message.name')); ?></th>
        <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.size')); ?></th>
        <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.create_time')); ?></th>
        <th class="col-md-2 text-center"><?php echo e(trans('adminlte_lang::message.modified_time')); ?></th>
        <th class="col-md-1"></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $backup): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($backup['name']); ?></td>
            <td class="text-center"><?php echo e($Defaults->human_filesize($backup['size'])); ?></td>
            <td class="text-center"><a data-toggle="tooltip" title="<?php echo e($backup['create_time']); ?>"><?php echo e(Carbon\Carbon::parse( $backup['create_time'] )->diffForHumans()); ?> </a></td>
            <td class="text-center"><a data-toggle="tooltip" title="<?php echo e($backup['modified_time']); ?>"><?php echo e(Carbon\Carbon::parse( $backup['modified_time'])->diffForHumans()); ?></a></td>
            <td class="text-center">
                
                <a href="<?php echo e(url('backups/'.$backup['name'].'/download')); ?>"  data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.download')); ?>">
                    <i class="fa fa-cloud-download"></i>
                </a>
                

                <a href="#restore-backup" data-url="<?php echo e(url('backups/restore')); ?>" id="restore-backup" data-type="<?php echo e(trans('adminlte_lang::message.restore')); ?>" data-form="<?php echo e(trans('adminlte_lang::message.database_backup')); ?>" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.restore')); ?>"  data-key="<?php echo e($backup['id']); ?>" data-name="<?php echo e($backup['name']); ?>" data-message="<?php echo e(trans('adminlte_lang::message.remove_info')); ?>">
                    <i class="glyphicon glyphicon-import"></i>
                </a>
                

                <a href="#remove-backup" data-url="<?php echo e(url('backups/remove')); ?>" style="color: #dd4b39" data-toggle="tooltip" id="remove-backup" title="<?php echo e(trans('adminlte_lang::message.remove')); ?>" data-key="<?php echo e($backup['id']); ?>" data-name="<?php echo e($backup['name']); ?>" data-message="<?php echo e(trans('adminlte_lang::message.remove_info')); ?>">
                    <i class="fa fa-trash"></i>
                </a>
                
            </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <tbody>
</table>

<script>
//    $(function () {
        <?php if($type == 'load'): ?>
            $('#table-backup').DataTable({
                "colVis": {
                    "buttonText": "Columns",
                    "overlayFade": 0,
                    "align": "right"
                },
                "language": {
                    "lengthMenu": '_MENU_ <?php echo e(trans('adminlte_lang::message.entries_per_page')); ?> ',
                    "search": '<?php echo e(trans('adminlte_lang::message.search')); ?>',
                    "paginate": {
                        "previous": '<i class="fa fa-angle-left"></i>',
                        "next": '<i class="fa fa-angle-right"></i>'
                    },
                    "emptyTable": "<?php echo e(trans('adminlte_lang::message.no_data_available')); ?>",
                }
            });
        <?php endif; ?>
//    });

</script>