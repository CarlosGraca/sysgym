<?php if(count($canceled) == 0): ?>
    <div class="text-center">
        <img src="<?php echo e(asset('img/no_agenda_regist.png')); ?>" alt="" style="margin: 20px 0;">
        <p>Congratulations! <br>No Consult Canceled.</p>
    </div>

<?php else: ?>
    <?php echo $__env->make('components.consult_agenda_list',['consult_agenda'=>$canceled,'table_name'=>'table_row_cancel','type'=>'cancel'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>