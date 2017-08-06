<div class="row">
	<?php echo Form::hidden('menu_id', ($type == 'update' ? $menu->id : null), ['class'=>'form-control','id'=>'menu_id']); ?>

    <?php echo Form::hidden('user_id', \Auth::user()->id, ['class'=>'form-control','id'=>'user_id']); ?>

    <?php echo Form::hidden('parent_id', ($type == 'update' ? $menu->parent_id : 0), ['class'=>'form-control','id'=>'parent_id']); ?>


	<span ><strong class="title"><?php echo e(trans('adminlte_lang::message.menus_information')); ?></strong></span>
    <hr class="h-divider" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('title','(*) '.trans('adminlte_lang::message.title')); ?>

			<?php echo Form::text('title', ($type == 'update' ? $menu->title : null) , ['class'=>'form-control','onfocus'=>'onfocus']); ?>

		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('url','(*) '.trans('adminlte_lang::message.url')); ?>

            <?php echo Form::text('url', ($type == 'update' ? $menu->title : null) , ['class'=>'form-control']); ?>

        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('icon',trans('adminlte_lang::message.icon')); ?>

            <?php echo Form::text('icon', ($type == 'update' ? $menu->icon : null) , ['class'=>'form-control']); ?>

        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group-sm">
            <?php echo Form::label('menu_order',trans('adminlte_lang::message.menu_order')); ?>

            <?php echo Form::number('menu_order', ($type == 'update' ? $menu->menu_order : null) , ['class'=>'form-control']); ?>

        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group form-group-sm">
            <?php echo Form::label('main_menu',trans('adminlte_lang::message.main_menu') ); ?>

            <?php echo Form::text('main_menu', ($type == 'update' ? ($menu->parent_id == 0 ? null : $menu->parent->title) : null) , ['class'=>'form-control','placeholder'=>'Type Main Menu Title']); ?>

        </div>
    </div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group form-group-sm">
			<?php echo Form::label('description',trans('adminlte_lang::message.description') ); ?>

			<?php echo Form::textarea('description', ($type == 'update' ? $menu->description : null) , ['class'=>'form-control']); ?>

		</div>
	</div>
</div>