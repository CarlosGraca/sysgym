<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo e(trans('adminlte_lang::message.app_name')); ?></title>
    
    <!-- css -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('plugins/font-awesome/css/font-awesome.min.css')); ?>"" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/nivo-lightbox.css')); ?>"" rel="stylesheet" />
    <link href="<?php echo e(asset('css/nivo-lightbox-theme/default/default.css')); ?>"" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(asset('css/animate.css')); ?>"" rel="stylesheet" />

    <link href="<?php echo e(asset('css/prettyPhoto.css')); ?>"" rel="stylesheet"> 

    <link href="<?php echo e(asset('css/style.css')); ?>"" rel="stylesheet">
    <link href="<?php echo e(asset('css/style2.css')); ?>"" rel="stylesheet">


    <!-- template skin -->
    <link id="t-colors" href="<?php echo e(asset('color/default.css')); ?>"" rel="stylesheet">
    
    <!-- =======================================================
        Theme Name: Appland
        Theme URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->

    <style type="text/css">
        #carousel-slider a i {
            border: 1px solid #2487cd;
            border-radius: 50%;
            font-size: 30px;
            height: 50px;
            padding: 8px;
            position: absolute;
            top: 25%;
            width: 50px;
            color: #fff;
            background: #2487cd;
        }
        #menu .login {
            border-left: 1px solid #e4e8ea;
            margin-left: 20px;
        }
    </style>
</head>

<body>


<div id="wrapper">
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                    <div class="site-logo">
                        <a href="index.html" class="brand"><?php echo e(trans('adminlte_lang::message.app_name')); ?></a>
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
                              <li><a href="#home">Home</a></li>
                              <li><a href="#about">Sobre</a></li>
                              <li><a href="#content1">Recurso</a></li>
                              <li><a href="#portfolio">Plano e Preço</a></li>                                 
                              <li><a href="#contact">Contato</a></li>
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
            <div id="about-slider">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs">
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/slide1.jpg" class="img-responsive" alt=""> 
                        </div>
                       <div class="item">
                            <img src="images/slide2.jpg" class="img-responsive" alt=""> 
                       </div> 
                       <div class="item">
                            <img src="images/slide3.jpg" class="img-responsive" alt=""> 
                       </div> 
                    </div>
                    
                    <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                        <i class="fa fa-angle-left"></i> 
                    </a>
                    
                    <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                        <i class="fa fa-angle-right"></i> 
                    </a>
                </div> <!--/#carousel-slider-->
            </div><!--/#about-slider-->
        </div>
    </div>
    

    <section id="about">
        <div class="container">
            <div class="center">
                <div class="col-md-6 col-md-offset-3">
                    <h2>Sobre</h2>
                    <hr>                    
                    <p class="lead">Software completo para gestão de ginásio</p>
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInRight">
                    <img src="images/1.png" class="img-responsive" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni autem minus sint, commodi.</p>

                </div><!--/.col-sm-6-->

                <div class="col-sm-6 wow fadeInDown">
                    <div class="accordion">
                        <div class="panel-group" id="accordion1">
                          <div class="panel panel-default">
                            <div class="panel-heading active">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                  Web Design
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>

                            <div id="collapseOne1" class="panel-collapse collapse in">
                              <div class="panel-body">
                                  <div class="media accordion-inner">
                                        <div class="pull-left">
                                            <img class="img-responsive" src="images/accordion1.png">
                                        </div>
                                        <div class="media-body">
                                             <h4>Adipisicing elit</h4>
                                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                  Lorem ipsum dolor sit amet
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                            <div id="collapseTwo1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    Brunch 3 wolf moon tempor.<br>
                                    
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    non cupidatat skateboard dolor brunch.</p>
                                </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
                                  Lorem ipsum dolor sit amet
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                            <div id="collapseThree1" class="panel-collapse collapse">
                              <div class="panel-body">
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                Brunch 3 wolf moon tempor.<br>
                                
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                non cupidatat skateboard dolor brunch.</p>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                  Lorem ipsum dolor sit amet
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                            <div id="collapseFour1" class="panel-collapse collapse">
                                <div class="panel-body">
                                   <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    Brunch 3 wolf moon tempor.<br>
                                    
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                    non cupidatat skateboard dolor brunch.</p>
                                </div>
                            </div>
                          </div>
                        </div><!--/#accordion1-->
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#about-->
    
    <section id="content1" class="home-section">
    
        <div class="container">
            <div class="center">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2>Recursos Disponíveis</h2>
                    <hr>                    
                        <p class="lead">Facilidade no controle da gestão de ginásio 100% online</p>
                </div>
            </div>
        </div>
            
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="wow fadeInRight" data-wow-delay="0.3s">
                        <div class="features">                          
                            <i class="fa fa-check fa-2x circled bg-skin float-left"></i>
                            <h6>Modern interface</h6>
                            <p>
                            Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                            </p>
                        </div>
                        <div class="features">                          
                            <i class="fa fa-check fa-2x circled bg-skin float-left"></i>
                            <h5>Easy to use</h5>
                            <p>
                            Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                            </p>
                        </div>
                        <div class="features">                          
                            <i class="fa fa-check fa-2x circled bg-skin float-left"></i>
                            <h5>Free updates</h5>
                            <p>
                            Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInRight" data-wow-delay="0.3s">
                        <div class="features">                          
                            <i class="fa fa-check fa-2x circled bg-skin float-left"></i>
                            <h5>Modern interface</h5>
                            <p>
                            Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                            </p>
                        </div>
                        <div class="features">                          
                            <i class="fa fa-check fa-2x circled bg-skin float-left"></i>
                            <h5>Easy to use</h5>
                            <p>
                            Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                            </p>
                        </div>
                        <div class="features">                          
                            <i class="fa fa-check fa-2x circled bg-skin float-left"></i>
                            <h5>Free updates</h5>
                            <p>
                            Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Section: content -->
    
    <div class="divider-short"></div>
    
    <section id="content2" class="home-section">
    
        <div class="container">
            <div class="row text-center heading">
                <h3>Mais Recursos</h3>
            </div>
            
            
            <div class="row">
                <div class="col-md-6">
                    <div class="wow fadeInLeft" data-wow-delay="0.2s">
                        <p>
                        O Cartão Sócio electrónico vem facilitar a comunicação e disponibilizar informação útil e em tempo real da associação para o associado.
                        </p>
                        <p>
                         O cartão pode comprovar rapidamente a identidade do socio assim como o estado das suas quotas.
                        </p>
                        <p>Nesta área reservada e encriptada o sócio pode consultar as suas quotas, recibos, mensagens, avisos, notícias e o calendário de actividades.</p>
                        <div class="divider-short marginbot-30 margintop-30"></div>
                        <div class="features">                          
                            <i class="fa fa-android fa-2x circled bg-skin float-left"></i>
                            <h5>Android application</h5>
                        </div>
                        <div class="features">                          
                            <i class="fa fa-apple fa-2x circled bg-skin float-left"></i>
                            <h5>For Apple iOs</h5>
                        </div>
                        <div class="features">                          
                            <i class="fa fa-windows fa-2x circled bg-skin float-left"></i>
                            <h5>Windows version</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInRight" data-wow-delay="0.3s">
                        <img src="img/img-2.png" alt="" class="img-responsive" />
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- /Section: content -->
    
    <div class="divider-short"></div>
    <section id="works" class="home-section text-center">
        <div class="container">
            <div class="row text-center heading">
                <h3>Screenshots</h3>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >

                    <div class="row gallery-item">
                        <div class="col-md-3">
                            <a href="img/works/1.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg">
                                <img src="img/works/1.jpg" class="img-responsive" alt="img">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="img/works/2.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg">
                                <img src="img/works/2.jpg" class="img-responsive" alt="img">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="img/works/3.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg">
                                <img src="img/works/3.jpg" class="img-responsive" alt="img">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="img/works/4.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg">
                                <img src="img/works/4.jpg" class="img-responsive" alt="img">
                            </a>
                        </div>
                    </div>
    
                </div>
            </div>  
        </div>
    </section>


    <section id="callaction" class="home-section paddingtop-40">    
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callaction">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="cta-text">
                                    <h3>Need more advanced features?</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum ante eget faucibus. </p>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                        <div class="cta-btn">
                                        <a href="#" class="btn btn-skin btn-lg">Contact us</a>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>  
</div>
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
                        
                        <a href="https://bootstrapmade.com/">Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
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
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>                               
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    

   <!--  <footer>
    

        <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                
                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-left">
                    <p>&copy;Copyright - Appland. All rights reserved.</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                        <div class="text-right margintop-30">
                            <div class="credits">
                                <!-- 
                                    All the links in the footer should remain intact. 
                                    You can delete the links only if you purchased the pro version.
                                    Licensing information: https://bootstrapmade.com/license/
                                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=Appland
                                -->
                               <!--  <a href="https://bootstrapmade.com/free-one-page-bootstrap-themes-website-templates/">One Page Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        </div>
    </footer> 
</div>--> 



    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>     
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script> 

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.min.js"></script>
     <script src="js/jquery.scrollTo.js"></script> 
    <script src="js/nivo-lightbox.min.js"></script>
    <script src="js/main.js"></script>
    <!--<script src="js/custom.js"></script>-->
    
</body>

</html>
