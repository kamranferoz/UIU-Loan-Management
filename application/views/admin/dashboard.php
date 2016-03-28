<div id="page-wrapper" style="padding: 10px; border-left: 0;" class="active">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="color: #FFFFFF;">
                    <?php echo $menuTitle ?>
                    <!--<a href="<?php /*echo base_url() */?>index.php/AdminDashboard/download/<?php /*echo $item */?>" style="float: right;">Export as CSV</a>-->
                    <a href="#" style="float: right; color: #FFFFFF">Export as CSV</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="adminDashboardDataTables">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>CGPA</th>
                                <th>Phone</th>
                                <th>Loan Amount</th>
                                <th>Tenor</th>
                                <th>Created Date</th>
                                <?php if (isset($status) && $status == 'existing') { ?><th>Approved Date</th><?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($application as $key => $value) { ?>
                                <tr class="<?php echo ($key % 2) ? "even $key" : "odd $key"; ?> gradeX">
                                    <td>
                                        <a href="<?php echo base_url() ?>index.php/AdminDashboard/viewApplication/<?php echo $value['user_id'] ?>/<?php echo (isset($status) && $status == 'existing') ? "1" : "0"; ?>">
                                            <?php echo $value['student_id'] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $value['cgpa'] ?></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['amount'] ?></td>
                                    <td><?php echo $value['tenor'] ?></td>
                                    <td class="center"><?php echo $value['created_time'] ?></td>
                                    <?php if (isset($status) && $status == 'existing') { ?><td class="center"><?php echo $value['date_taken'] ?></td><?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript">
    var dataTable = 'adminDashboardDataTables';
</script>