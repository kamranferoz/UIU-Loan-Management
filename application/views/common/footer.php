</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-lg-10 col-md-offset-1">
        <hr/>
        <h5 class="text-center" style="font-weight: bold;">Copyright &copy; 2016 United International University.</h5>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url() ?>static/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url() ?>static/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>static/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom static JavaScript -->
<script src="<?php echo base_url() ?>static/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    $(document).ready(function() {
        if (typeof dataTable != 'undefined'){
            $('#' + dataTable).DataTable({
                responsive: true,
                "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
            });
        }
    });
</script>

</body>

</html>