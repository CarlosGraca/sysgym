<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('adminlte_lang::message.client_profile')); ?> - <?php echo e($people->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <!-- Main content -->
    <section class="invoice" id="download-content">

        <!-- title row -->
        <div class="row" style="margin-top:0;">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style="padding: 10px 0 0 10px; -webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 5px;">
                            <img  src="<?php echo e(asset($company->logo)); ?>" id="logo" alt="Cinque Terre" height="120" class="pull-left">
                    </div>
                </div>

                <!-- PATIENT INFORMATION -->
                <div class="row" style="margin-top:20px;">

                    <div class="col-lg-12 invoice-info">
                        <?php echo $__env->make('people.show',['people' =>  $people,'setting'=>['photo'=>true,'contact'=>true,'report'=>true, 'work'=>true, 'type_people'=> $type_people]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                </div>



            </div><!-- /.col -->
        </div>
        <!-- END PATIENT INFORMATION -->

        <!-- FOOTER -->
        
            
            
                
                
                
                
                
                
            
            
                
                    
                

                

                        

                

        
        <!-- END FOOTER -->

        <!-- PATIENT ODONTOGRAM INFORMATION
        <div class="row" style="margin-top:20px;">
            <div class="col-lg-12">

                <div class="col-lg-12" style="border:1px solid darkgray; -webkit-border-radius: 25px;-moz-border-radius: 25px;border-radius: 25px;">

                    <div class="row text-center">
                        <h4>Odontograma</h4>
                    </div>

                    <!-- info row --
                    <div class="row invoice-info text-center" style="margin: 5px;">

                        <img src="<?php echo e(asset('img/clinic/odontograma.png')); ?>" alt="">

                    </div><!-- /.row

                </div>
            </div><!-- /.col
        </div>
        <!-- END PATIENT ODONTOGRAM INFORMATION --


-->


    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.report', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>