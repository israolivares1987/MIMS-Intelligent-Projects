<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MIMS Intelligent Projects</title>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css');?>" rel="stylesheet">

     <script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js');?>"></script>

  
  </head>

  <body>
    <hr><div align="center"><img src="<?php echo base_url('assets/img/logo-mims.png');?>" width="300" height="150" ></div><hr>
    <div class="container">
    <div class="col-md-4 col-md-offset-4">
    <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
   
        <label for="user_name" class="sr-only">Username</label>
        <input type="text" name="user_name" class="form-control" placeholder="Nombre Usuario" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label for="cod_emp" class="sr-only">Código Empresa</label>
        <input type="text" name="cod_emp" class="form-control" placeholder="Codigo Empresa">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <div> <?php
       
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
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    </div>

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  </body>
</html>