<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="form-group form-group-sm">
            <?php echo Form::label('action_button',trans('adminlte_lang::message.action_button') ); ?>

            <?php echo Form::select('action_button',['sign_out' =>trans('adminlte_lang::message.signout'), 'lock_screen' =>trans('adminlte_lang::message.lockscreen') ], ($type == 'update' ? $user->action_button : null) , ['class'=>'form-control', 'placeholder' => trans('adminlte_lang::message.action_button_select')]); ?>

        </div>
    </div>
</div>