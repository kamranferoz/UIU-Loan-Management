<div id="page-wrapper" style="margin-left: 0; padding: 10px; border-left: 0;" class="active">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color: #FFF;">Loan Summary</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><h4>Total Requested Loan: <?php echo $total_requested_loan ?></h4></div>
                            <div><h4>Total Approved Loan: <?php echo $total_approved_loan ?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><h4>Loan Approved Date: <?php echo $approve_date ?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div><h4>Final Deadline: <?php echo $tenor ?></h4></div>
                            <div><h4>Total Loan Remaining: <?php echo $remaining_loan ?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Loan Transactions
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="studentDashboardDataTables">
                            <thead>
                            <tr>
                                <th>Transaction Date</th>
                                <th>Transaction Type</th>
                                <th>Transaction Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($transaction as $key => $value){ ?>
                                <tr class="<?php echo ($key % 2) ? "odd" : "even"; ?>">
                                    <td><?php echo date('F d, Y', $value['date']) ?></td>
                                    <td><?php echo $value['type'] ?></td>
                                    <td><?php echo $value['tranAmount'] ?></td>
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
    var dataTable = 'studentDashboardDataTables';
</script>