<?php $__env->startSection('htmlheader_title'); ?>
    Menu
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php echo e(trans('adminlte_lang::message.app_name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_description'); ?>
 Menu
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="row">
        <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <div class="col-lg-12">
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">  <?php echo e(trans('adminlte_lang::message.menu_list')); ?> </h3>
                  <div class="pull-left box-tools">
                         <a href="<?php echo e(url('menus/create')); ?>" class="btn btn-primary btn-sm" role="button" data-toggle="tooltip" title="<?php echo e(trans('adminlte_lang::message.new_menu')); ?>">
                              <i class="fa fa-plus"></i> <?php echo e(trans('adminlte_lang::message.new_menu')); ?>

                         </a>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                   
                        <table class="table table-hover table-design">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Url</th>
                                <th>Icon</th>
                               
                                <th>Order</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo $menu->title; ?></td>
                                    <td><?php echo $menu->url; ?></td>
                                    <td><?php echo $menu->icon; ?></td>
                                   
                                    <td><?php echo $menu->menu_order; ?></td>
                                    <td><?php if($menu->status === 1): ?>
                                            <span class="label label-success">Ativo</span>
                                        <?php elseif($menu->status === 0): ?>
                                             <span class="label label-danger">Inativo</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions">
                                        <a href="<?php echo e(route('menus.edit',$menu->id)); ?>" class="btn btn-primary btn-xs", data-remote='false'])>      <i class="fa fa-edit"></i>
                                        </a>                           
                                         <button type="button" class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#confirmDelete" data-id="<?php echo e($menu->id); ?>" data-name="<?php echo e($menu->id); ?>" data-title="Confirma Alterar estado Menu" data-url="/menus/" title="Alterar Estado">
                                            <i class="fa fa-exchange"></i>
                                        </button> 
                                    </td>
                                </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>