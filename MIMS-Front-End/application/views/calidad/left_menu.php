 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link text-sm navbar-light" style="padding-left: 0px; padding-right: 0px;">
      <img src="<?php echo base_url()."assets/dist/img/".$this->session->userdata('icono');?>" alt="Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="m-0 text-dark">MIMS Intelligent Projects</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()."assets/dist/img/".$this->session->userdata('avatar');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nombres')." ".$this->session->userdata('paterno')." ".$this->session->userdata('materno');?></a>
          <a href="#" class="d-block"><p><i class="fas fa-id-card"></i> ROL: <?php echo $this->session->userdata('nombre_rol');?> </p></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                      <i class="nav-icon fas fa-user-tie"></i>
                      <p>
                          CLIENTES
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">  
                    <?php echo $arrClientes?> 
              </ul>
            </li>

            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon  fas fa-shopping-cart"></i>
                      <p>COMPRAS</p>
                    </a>
            </li>

            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon  fas fa-tachometer-alt"></i>
                      <p>
                          ACTIVACIÓN
                      </p>
                    </a>
            </li>
            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon  fab fa-searchengin"></i>
                      <p>
                          CONTROL CALIDAD
                        
                      </p>
                    </a>
            </li>
            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon  fas fa-shipping-fast"></i>
                      <p>
                          LOGISTICA
                      </p>
                    </a>
            </li>
            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon fas fa-warehouse"></i>
                      <p>
                          BODEGA
                      </p>
                    </a>
            </li>
            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon fas fa-hard-hat"></i>
                      <p>
                      MATERIALS MANAGEMENT
                      </p>
                    </a>
            </li>
          
                     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 