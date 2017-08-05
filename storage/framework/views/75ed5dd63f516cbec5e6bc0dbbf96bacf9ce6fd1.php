<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo e(trans('adminlte_lang::message.app_name')); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/css/font-awesome.min.css')); ?>">
    <!-- <link href="<?php echo e(asset('/css/animate.min.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('/css/animate.css')); ?>" rel="stylesheet" /> 
    <link href="<?php echo e(asset('/css/prettyPhoto.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('/css/style_auth.css')); ?>" rel="stylesheet">
    <!-- =======================================================
        Theme Name: OnePage
        Theme URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
    <style>
        .col-xs-push-1 {
    left: 8.33333333%;
    margin-top: -12px;
    margin-left: 15px;
}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                    <div class="site-logo">
                        <a href="/" class="brand"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a>
                    </div>

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav navbar-right">
                             <?php if(Auth::guest()): ?>
                                <li class="login"><a href="<?php echo e(url('/login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                <?php echo e(trans('adminlte_lang::message.login')); ?></a></li>
                                <li><a href="<?php echo e(url('/auth/register')); ?>"><?php echo e(trans('adminlte_lang::message.register')); ?></a></li>
                            <?php else: ?>
                                <li class="login"><a href="/home"><?php echo e(Auth::user()->name); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.Navbar-collapse -->       
            </div>
        </div>      
    </nav>
    <div id="home">
        <div class="slider">
        </div>
    </div>
    <section id="contact">
        <div class="contact-page">
            <div class="container">
                <div class="center">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>Ótima escolha!</h2>              
                        <p class="text-center">Obrigado por escolher nos escolher.</p>
                    </div>
                </div>
            </div>

            <div class="container">

                 <?php echo $__env->make('layouts.shared.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 
                <form action="<?php echo e(url('/register_tenant')); ?>" method="post">
                    <div class="row contact-wrap">  
                       
                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                       <div class="col-md-6">  
                             <div class="form-group">
                                <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Nome da Campania" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subdomain_name" class="form-control" id="subdomain_name" placeholder="Sub Nome da Campania" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.fullname')); ?>" name="name" value="<?php echo e(old('name')); ?>"/>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.email')); ?>" name="email" value="<?php echo e(old('email')); ?>"/>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.password')); ?>" name="password"/>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.retrypepassword')); ?>" name="password_confirmation"/>
                            </div>                           
                        </div>
                        <div class="col-md-6">  
                             <div class="form-group">
                                <input type="text" name="location" id="location" class="location form-control" placeholder="Search Location..."  ></td>
                            </div>
                            <div class="geo-details">
                                <div class="form-group">
                                    <input type="text" data-geo="country"  class="location form-control" placeholder="País" value="" id="country" name="country">
                                </div>

                                <div class="form-group">
                                    <input type="text" data-geo="country_short" class="location form-control"  placeholder="Codigo de Pais" value="" id="country_code" name="country_code">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="location form-control" placeholder="Endereço" value="" id="address_1" name="address_1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="location form-control" placeholder="Estado" data-geo="administrative_area_level_1" value="" id="state" name="state">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="location form-control" placeholder="Codigo de Estado" data-geo="administrative_area_level_1_short" value="" id="state_code" name="state_code" > 
                                </div>
                                <div class="form-group">
                                    <input type="text" class="location form-control" placeholder="Cidade" data-geo="administrative_area_level_2" value="" id="city" name="city">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="location form-control" placeholder="Latitude" data-geo="lat" value="" id="latitude" name="latitude">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="location form-control" placeholder="Longitude" data-geo="lng" value="" id="longitude" name="longitude">
                                </div>
                            </div>
                      </div>                              
                    </div><!--/.row-->
                    <hr>
                    <div class="row">
                       <div class="col-lg-6 col-md-offset-6">
                            <div class="col-xs-1">
                                <label>
                                    <div class="checkbox_register icheck">
                                        <label>
                                            <input type="checkbox" name="terms">
                                        </label>
                                    </div>
                                </label>
                            </div><!-- /.col -->
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal"><?php echo e(trans('adminlte_lang::message.terms')); ?></button>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-xs-4 col-xs-push-1">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('adminlte_lang::message.register')); ?></button>
                            </div><!-- /.col -->
                        </div>
                    </div> 
                </form>   
            </div><!--/.container-->
        </div><!--/#contact-page-->     
    </section>
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
                    </div>
                    &copy; <?php echo e(trans('adminlte_lang::message.app_name')); ?>. All Rights Reserved.
                    <div class="credits">
                        <!-- 
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=OnePage
                        -->
                    </div>
                </div>
                
                <div class="top-bar">           
                    <div class="col-lg-12">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <?php echo $__env->make('auth.terms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

   
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo e(asset('/js/jquery.js')); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('/js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/jquery.isotope.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/jquery.easing.min.js')); ?>"></script>  
     <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>-->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script src="<?php echo e(asset('/js/jquery.geocomplete.min.js')); ?>"></script>
    <script> 
        $(function () { 
            $("#location").geocomplete({
              details: ".geo-details",
              detailsAttribute: "data-geo"
            });

        });
    </script>
    
</body>
</html>