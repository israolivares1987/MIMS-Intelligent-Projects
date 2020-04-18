 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4 sidebar-light-danger">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link text-sm navbar-light" style="padding-left: 0px; padding-right: 0px;">
      <img src="<?php echo base_url()."assets/images/".$this->session->userdata('icono');?>" alt="Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MIMS Intelligent Projects</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()."assets/images/avatars/".$this->session->userdata('avatar');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                          MANTENEDORES
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">  
                    <li class="nav-item">
                      <a href="<?php echo site_url('Clientes/index');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Clientes</p>
                      </a>
                    </li>
                  </ul>
            </li>  
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                    <a href="<?php echo base_url();?>/index.php/ingenieria/proyectos" class="nav-link text-sm">
                      <i class="nav-icon fas fa-user-tie"></i>
                      <p>PROYECTOS</p>
                    </a>
            </li>
          
                     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 