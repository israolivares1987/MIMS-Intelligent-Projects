      <div class="container">
      <div class="row">
   <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             </div>
             <ul class="nav navbar-nav navbar">
                <li>
                 <img src="<?php echo base_url()."assets/img/".$this->session->userdata('icono');?>" alt="MIMS" >
                </li>
              </ul>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Expediting Module <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('activador/creaExpediting');?>">Register Expediting</a></li>
                  <li><a href="<?php echo site_url('activador/listaExpediting');?>">List Expediting</a></li>
                  <li><a href="#">List Bucksheet</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Bucksheet</li>
                  <li><a href="#">List Bucksheet</a></li>
                </ul>
              </li>
               
              </ul>
              
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo site_url('login/logout');?>">Cerrar Sesión</a></li>
              </ul> 
                
             
            </div>
          </div>
        </nav>
  


 


</body>
</html>