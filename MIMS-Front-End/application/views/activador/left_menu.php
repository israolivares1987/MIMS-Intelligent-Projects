 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4 sidebar-light-danger">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-sm navbar-light" >
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
               <li class="nav-header">Mantenedores</li>
          <li class="nav-item">
            <a href="<?php echo site_url('Activador/index_empleados');?>" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Empleados</p>
            </a>
          </li>
               
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-header">Proyectos</li>
          
                 <?php echo $arrProyectos?>     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>