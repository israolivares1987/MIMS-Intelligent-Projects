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
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                          MANTENEDORES
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">  
                   
                    <li class="nav-item">
                      <a href="<?php echo site_url('Bodega/index_man_bodega');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bodegas</p>
                      </a>
                    </li>
              </ul>
            </li>  
        </ul>
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


             <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="nav-icon fas fa-warehouse"></i>
                      <p>
                          BODEGA
                      </p>
                    </a>
                    <ul class="nav nav-treeview">  
                   
                    <li class="nav-item">
                      <a href="<?php echo site_url('Bodega/crearRR');?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-sm"></i>
                        <p>Crear Reporte de Recepción (RR)</p>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                    <a href="<?php echo site_url('Bodega/crearRE');?>" class="nav-link">
                        <i class="far fa-circle nav-icon" ></i>
                        <p>Crear Reserva de Material (RM)</p>
                      </a>
                    </li>

                    <li class="nav-item">
                    <a href="<?php echo site_url('ReporteEntrega/finalizarRE');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear Reporte de Entrega (RE)</p>
                      </a>
                    </li>

                    <li class="nav-item">
                    <a href="<?php echo site_url('Bodega/crearEXB');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear EXB</p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="<?php echo site_url('Bodega/crearEI');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Crear EI</p>
                      </a>
                    </li>
              </ul>
            </li> 

            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="fas fa-history nav-icon"></i>
                      <p>
                      HISTORICOS
                      </p>
                    </a>
                    <ul class="nav nav-treeview">  
                   
                    <li class="nav-item">
                    <a href="<?php echo site_url('ReporteRecepcion/index_historico_rr');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Historico RR</p>
                      </a>
                    </li>

                    <li class="nav-item">
                    <a href="<?php echo site_url('ReporteEntrega/index_historico_re');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Historico RE</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Historico EXB</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Historico EI</p>
                      </a>
                    </li>
              </ul>
            </li>  

            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link text-sm">
                    <i class="fas fa-truck nav-icon"></i>
                      <p>
                      REPORTES
                      </p>
                    </a>
                    <ul class="nav nav-treeview">  
                   
                    <li class="nav-item">
                       <a href="<?php echo site_url('Bodega/reporteDiario');?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte Diario</p>
                      </a>
                    </li>
              </ul>
            </li>  

            </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 