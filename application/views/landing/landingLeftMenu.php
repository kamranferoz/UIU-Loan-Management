<?php if ($hide_menu != 'all') { ?>
<div class="col-lg-4 login-left-menu">
    <?php if ($hide_menu != 'login') { ?>
        <div class="row"  style="margin: 10px 0px 10px 10px;">
            <a href="<?php echo base_url() ?>index.php/user/login">
                <button type="button" class="btn btn-warning btn-group-xs" style="float: left"><i class="fa fa-2x fa-reply"></i>
                </button>
                <h3 style="margin-top: 8px; margin-left: 5px; display: inline-block">Back to Login</h3>
            </a>
        </div>
    <?php } ?>
    <?php if ($hide_menu != 'apply' && $hide_menu != 'applyFormSubmit') { ?>
        <div class="row" style="margin: 10px 0px 10px 10px;">
            <a href="<?php echo base_url() ?>index.php/user/applyForLoan">
                <button type="button" class="btn btn-success btn-group-xs" style="float: left"><i class="fa fa-2x fa-money"></i>
                </button>
                <h3 style="margin-top: 8px; margin-left: 5px; display: inline-block">Apply for Loan</h3>
            </a>
        </div>
    <?php } ?>
    <?php if ($hide_menu != 'loan_status') { ?>
        <div class="row"  style="margin: 10px 0px 10px 10px;">
            <a href="<?php echo base_url() ?>index.php/user/loanStatus">
                <button type="button" class="btn btn-info btn-group-xs" style="float: left"><i class="fa fa-2x fa-check"></i>
                </button>
                <h3 style="margin-top: 8px; margin-left: 5px; display: inline-block">Loan Status</h3>
            </a>
        </div>
    <?php } ?>
    <?php if ($hide_menu != 'faq') { ?>
        <div class="row"  style="margin: 10px 0px 10px 10px;">
            <a href="<?php echo base_url() ?>index.php/user/faq">
                <button type="button" class="btn btn-primary btn-group-xs" style="float: left"><i class="fa fa-2x fa-list"></i>
                </button>
                <h3 style="margin-top: 8px; margin-left: 5px; display: inline-block">FAQ</h3>
            </a>
        </div>
    <?php } ?>

     <?php if ($hide_menu == 'apply') { ?>
        <div class="row"  style="margin: 10px 0px 10px 10px;">
            <img width="275" src="<?php echo base_url() ?>static/images/applyNow.png"/>
        </div>
    <?php } ?>
</div>
<?php } ?>
