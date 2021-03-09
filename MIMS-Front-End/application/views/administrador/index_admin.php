<script type="text/javascript">
    
    document.body.onload = function() {
      updateCountEmpresa();
      updateCountUsuario();
      };

    function updateCountEmpresa(){
        console.log("inicio");    
        $.ajax({
            url: 		'<?php echo base_url('index.php/Empresa/getCountEmpresa'); ?>',
            type: 		'POST',
            dataType: 'JSON',                
        }).done(function(result) {
            $('#countEmpresa').html(result);
        }).fail(function() {
            console.log("error recuperar cantidad empresas");
        })
    }

    function updateCountUsuario(){
        console.log("inicio");    
        $.ajax({
            url: 		'<?php echo base_url('index.php/Usuario/getCountUsuario'); ?>',
            type: 		'POST',
            dataType: 'JSON',                
        }).done(function(result) {
            $('#countUsuarios').html(result);
        }).fail(function() {
            console.log("error recuperar cantidad usuario");
        })
    }
    

</script>


<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mantenedores Admin</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
          
        <div class="row">
         
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Empresas</span>
              <span id="countEmpresa" class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
              <span id="countUsuarios" class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        
        </div><!-- /.row -->
        
      </div><!-- /.card-body -->
      <!-- /.card -->


    