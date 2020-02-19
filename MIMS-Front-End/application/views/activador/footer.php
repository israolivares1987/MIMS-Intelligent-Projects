
 <footer>
        <div class="col-md-12" style="text-align:center;">
            <hr>
            Copyright - 2020 | <a href="http://mimsprojects.com">mimsprojects.com</a>
        </div>
    </footer>
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.fixedHeader.min.js');?>"></script>


  <script src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
  <script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.buttons.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/jszip.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/pdfmake.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
  
  
  <script type="text/javascript" class="init">
	
  $(document).ready(function() {
    $('#ListExpediting').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'csvHtml5'
      ],
      fixedHeader: {
            header: true,
            footer: true
        },
        paging: false,
        fixedColumns: true,
        scrollX: "400px",
        scrollCollapse: true,
        paging: false,
    } );
    
    $('#ListBuckSheet').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'csvHtml5'
      ],
      fixedHeader: {
            header: true,
            footer: true
        },
        paging: false,
        fixedColumns: true,
        scrollX: "400px",
        scrollCollapse: true,
        paging: false,
    } );
  } );
  
    </script>
 
  </body>
</html>
