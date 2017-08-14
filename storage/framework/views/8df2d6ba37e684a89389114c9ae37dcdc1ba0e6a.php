<div class="row">
	
    <span ><strong class="title"><?php echo e(trans('adminlte_lang::message.permissions_information')); ?></strong></span>
    <hr class="h-divider" >
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
        <div class="form-group has-feedback">
            <?php echo Form::select('role_id',  [''=>'Escolha o Perfil'] + $profiles,null, ['class'=>'form-control select2','style'=>'width: 100%;', 'required'=>true]); ?>

        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
        <div class="form-group has-feedback">
        <?php echo Form::select('permissions_menus[]' ,$menus, $m_menus, ['class'=>'form-control select2','multiple'=>'multiple', 'style'=>'width: 100%;']); ?>         
          </div>
    </div>
    </div>