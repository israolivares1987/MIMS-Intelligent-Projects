<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MIMS Intelligent Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Login MIMS 2.0">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="<?php echo base_url('assets/css/main.login.css')?>" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg"></div>
                                        <div class="slider-content"><img src="<?php echo base_url('assets/images/logo-mims.png');?>" width="300" height="150"></div>
                                    </div>
                                </div>
                               
                             
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
<span class="d-block">Bienvenido,</span>
<span>Favor Iniciar sesion con su cuenta.</span></h4>
                            <div class="divider row"></div>
                            <div>
                                <form class="" action="<?php echo site_url('login/auth');?>" method="post">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="user_name" class="">Username</label>
                                                <input name="user_name" id="user_name" placeholder="Nombre de Usuario..." type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="password" class="">Password</label>
                                                <input name="password" id="password" placeholder="Password aqui ..." type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="cod_emp" class="">Código Empresa</label>
                                                <input name="cod_emp" id="cod_emp" placeholder="Código Empresa ..." type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            <button class="btn btn-primary btn-lg">Iniciar Sesion</button>
                                            <?php

       $arr = $this->session->flashdata();
       if(!empty($arr['msg'])){

         $html = '<div class="alert alert-danger">';
         $html .= '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
         $html .= '<strong>';
         $html .= $arr['msg'];
         $html .= '</strong>';    
         $html .= '</div>'; 
         $html .= '</div>';
         echo $html;
       }

   ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/scripts/main.login.js')?>"></script>
</body>

</html>