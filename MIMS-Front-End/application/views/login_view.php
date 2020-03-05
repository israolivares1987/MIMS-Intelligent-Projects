<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MIMS Intelligent Projects</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css');?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js');?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <hr><div align="center"><img src="<?php echo base_url('assets/img/logo-mims.png');?>" width="300" height="150" ></div><hr>
    <div class="container">
    <div class="col-md-4 col-md-offset-4">
    <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
   
        <!--<h2 class="form-signin-heading">MIMS Intelligent Projects</h2>-->
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
         $html = '<div class="alert alert-danger" role="alert">';
         $html .= '<strong>';
         $html .= $arr['msg'];
         $html .= '</strong>';    
         $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'; 
         $html .= '<span aria-hidden="true">×</span>'; 
         $html .= '</button> ';
         $html .= '</div>'; 
         echo $html;
       }


       
   ?> </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js');?>"></script>
  </body>
</html>