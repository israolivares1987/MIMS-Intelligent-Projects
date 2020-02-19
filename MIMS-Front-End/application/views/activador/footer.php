
 <footer>
        <div class="col-md-12" style="text-align:center;">
            <hr>
            Copyright - 2020 | <a href="http://mimsprojects.com">mimsprojects.com</a>
        </div>
    </footer>
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('jquery.dataTables.min.css');?>"></script>
 
  <script> 
  $(document).ready(function() {
    $('#ListExpediting').DataTable();
    $('#ListBuckSheet').DataTable({
      "scrollX": true
    });

    
} );</script>

 
  </body>
</html>
