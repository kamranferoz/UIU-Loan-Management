<?php
require_once BASEPATH . "../application/libraries/utilities.php";
?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">United International University</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url() ?>index.php/user/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

        <div class="navbar-brand navbar-right">Welcome <?php echo $username ?></div>

        <?php if ($user_role == ADMIN_ROLE_TITLE) { ?>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url() ?>index.php/dashboard"><i class="fa fa-th-list fa-fw"></i> New Loan Applications</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/dashboard"><i class="fa fa-recycle fa-fw"></i> Processing Loan Queue</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/dashboard"><i class="fa fa-check fa-fw"></i> Existing Loan Queue</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/dashboard"><i class="fa fa-times fa-fw"></i> Declined Loan Queue</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
        <?php } ?>
    </nav>

<!--</div>-->
