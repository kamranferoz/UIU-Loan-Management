<?php if ($hide_menu != 'all') { ?>
<div class="col-lg-4 login-left-menu">
    <div class="row" style="margin: 10px 0px 10px 10px;">
        <a href="<?php echo base_url() ?>../index.php/user/applyForLoan">
            <button type="button" class="btn btn-success btn-circle btn-lg" style="float: left"><i class="fa fa-money"></i>
            </button>
            <h3 style="margin-top: 12px; margin-left: 5px; display: inline-block">Apply for Loan</h3>
        </a>
    </div>
    <div class="row"  style="margin: 10px 0px 10px 10px;">
        <a href="<?php echo base_url() ?>../index.php/user/faq">
            <button type="button" class="btn btn-primary btn-circle btn-lg" style="float: left"><i class="fa fa-list"></i>
            </button>
            <h3 style="margin-top: 12px; margin-left: 5px; display: inline-block">FAQ</h3>
        </a>
    </div>
    <?php if ($hide_menu != 'loan_status') { ?>
        <div class="row"  style="margin: 10px 0px 10px 10px;">
            <a href="<?php echo base_url() ?>../index.php/user/loanStatus">
                <button type="button" class="btn btn-info btn-circle btn-lg" style="float: left"><i class="fa fa-check"></i>
                </button>
                <h3 style="margin-top: 12px; margin-left: 5px; display: inline-block">Loan Status</h3>
            </a>
        </div>
    <?php } ?>
</div>
<?php } ?>