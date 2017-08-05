<!-- PERSONAL INFORMATION -->
<div class="row">
    <span ><strong class="title"> <i class="fa fa-id-card-o"></i> <?php echo e(trans('adminlte_lang::message.personal_information')); ?></strong></span>
    <hr class="h-divider" >

    <?php if($setting['photo'] == true): ?>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-2" style="margin-top: 10px;">
            <img class="thumbnail avatar" src="<?php echo e(asset($people->avatar)); ?>" style="max-width: 100%; margin: 0 auto;">
        </div>
    <?php endif; ?>

    <div class="<?php if($setting['photo'] == true): ?> col-lg-5 col-md-5 <?php else: ?> col-lg-6 col-md-6 <?php endif; ?> col-sm-6 <?php if($setting['report'] == true): ?> col-xs-5 <?php endif; ?>">
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item" style="border-top:none;">
                <i class="fa fa-user"></i>  <b><?php echo e(trans('adminlte_lang::message.name')); ?>: </b>
                <a> <?php echo e($people->name); ?> </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-venus-mars"></i>  <b><?php echo e(trans('adminlte_lang::message.genre')); ?>: </b>
                <a> <?php echo e(trans('adminlte_lang::message.'.$people->genre)); ?> </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-heart"></i>  <b><?php echo e(trans('adminlte_lang::message.civil_state')); ?>: </b>
                <a><?php echo e(trans('adminlte_lang::message.'.$people->civil_state.'')); ?></a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-birthday-cake"></i>  <b><?php echo e(trans('adminlte_lang::message.birthday')); ?>: </b>
                <a><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $people->birthday)->format('d/m/Y')); ?></a>
            </li>
        </ul>
    </div>

    <div class="<?php if($setting['photo'] == true): ?> col-lg-5 col-md-5 <?php else: ?> col-lg-6 col-md-6 <?php endif; ?> col-sm-6 <?php if($setting['report'] == true): ?> col-xs-5 <?php endif; ?>">
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item" style="border-top:none;">
                <i class="fa fa-id-card"></i>  <b><?php echo e(trans('adminlte_lang::message.nationality')); ?>: </b>
                <a> <?php echo e($people->nationality); ?> </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-vcard-o"></i>  <b><?php echo e(trans('adminlte_lang::message.bi')); ?>: </b>
                <a> <?php echo e($people->bi); ?> </a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-vcard-o"></i>  <b><?php echo e(trans('adminlte_lang::message.nif')); ?>: </b>
                <a><?php echo e($people->nif); ?></a>
            </li>
            <li class="list-group-item">
                <i class="fa fa-users"></i>  <b><?php echo e(trans('adminlte_lang::message.parents')); ?>: </b>
                <a><?php echo e($people->parents); ?></a>
            </li>
        </ul>
    </div>
</div>

<?php if($setting['contact'] == true): ?>

    <!-- CONTACT INFORMATION -->
    <div class="row">
        <span ><strong class="title"> <i class="fa fa-phone"></i> <?php echo e(trans('adminlte_lang::message.contact_information')); ?></strong></span>
        <hr class="h-divider" >
        <div class="col-lg-6 col-md-6 col-sm-6 <?php if($setting['report'] == true): ?> col-xs-6 <?php endif; ?>">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top:none;">
                    <i class="fa fa-map-marker"></i>  <b><?php echo e(trans('adminlte_lang::message.address')); ?>: </b>
                    <a> <?php echo e($people->address); ?>, <?php echo e($people->city); ?>, <?php echo e($people->island->name); ?> </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-at"></i>  <b><?php echo e(trans('adminlte_lang::message.email')); ?>: </b>
                    <a> <?php echo e($people->email); ?> </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.phone')); ?>: </b>
                    <a><?php echo e($people->phone); ?></a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-mobile"></i>  <b><?php echo e(trans('adminlte_lang::message.mobile')); ?>: </b>
                    <a><?php echo e($people->mobile); ?></a>
                </li>
            </ul>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 <?php if($setting['report'] == true): ?> col-xs-6 <?php endif; ?>">
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top:none;">
                    <i class="fa fa-id-card"></i>  <b><?php echo e(trans('adminlte_lang::message.zip_code')); ?>: </b>
                    <a> <?php echo e($people->zip_code); ?> </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-globe"></i>  <b><?php echo e(trans('adminlte_lang::message.website')); ?>: </b>
                    <a> <?php echo e($people->website); ?> </a>
                </li>
                <li class="list-group-item">
                    <i class="fa fa-facebook-official"></i>  <b><?php echo e(trans('adminlte_lang::message.facebook')); ?>: </b>
                    <a><?php echo e($people->facebook); ?></a>
                </li>
                
                    
                    
                
            </ul>
        </div>
    </div>

<?php endif; ?>

<?php if($setting['work'] == true): ?>
    <!-- WORK INFORMATION -->
    <div class="row">
        <span ><strong class="title"> <i class="fa fa-briefcase"></i> <?php echo e(trans('adminlte_lang::message.work_information')); ?></strong></span>
        <hr class="h-divider" >
        <?php if($setting['type_people'] == 'employee'): ?>

            <div class="col-lg-6 col-md-6 col-sm-6 <?php if($setting['report'] == true): ?> col-xs-6 <?php endif; ?>">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-info"></i>  <b><?php echo e(trans('adminlte_lang::message.branch_name')); ?>: </b>
                        <a> <?php echo e($people->branch->name); ?> </a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>  <b><?php echo e(trans('adminlte_lang::message.address')); ?>: </b>
                        <a> <?php echo e($people->branch->address); ?> </a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.work_phone')); ?>: </b>
                        <a> <?php echo e($people->branch->phone); ?> </a>
                    </li>
        
                    <li class="list-group-item">
                        <i class="fa fa-quote-left"></i>  <b><?php echo e(trans('adminlte_lang::message.note')); ?>: </b>
                        <a> <?php echo e($people->note); ?> </a>
                    </li>
                </ul>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6 <?php if($setting['report'] == true): ?> col-xs-6 <?php endif; ?>">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-user-md"></i>  <b><?php echo e(trans('adminlte_lang::message.category')); ?>: </b>
                        <a> <?php echo e($people->category->name); ?> </a>
                    </li>
        
                    <li class="list-group-item">
                        <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.start_work')); ?>: </b>
                        <a> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $people->start_work)->format('d/m/Y')); ?> </a>
                    </li>
        
                    <li class="list-group-item">
                        <i class="fa fa-calendar"></i>  <b><?php echo e(trans('adminlte_lang::message.end_work')); ?>: </b>
                        <a> <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $people->end_work)->format('d/m/Y')); ?> </a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>

        <?php if($setting['type_people'] == 'client'): ?>
            <div class="col-lg-6 col-md-6 col-sm-6 <?php if($setting['report'] == true): ?> col-xs-6 <?php endif; ?>">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>  <b><?php echo e(trans('adminlte_lang::message.address')); ?>: </b>
                        <a> <?php echo e($people->work_address); ?> </a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-briefcase"></i>  <b><?php echo e(trans('adminlte_lang::message.profession')); ?>: </b>
                        <a> <?php echo e($people->profession); ?> </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 <?php if($setting['report'] == true): ?> col-xs-6 <?php endif; ?>">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <i class="fa fa-phone"></i>  <b><?php echo e(trans('adminlte_lang::message.work_phone')); ?>: </b>
                        <a> <?php echo e($people->work_phone); ?> </a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>    
<?php endif; ?>


