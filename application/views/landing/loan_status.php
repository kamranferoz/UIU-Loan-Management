<div class="col-lg-8">
    <div class="panel-heading">
        <h2 class="panel-title">Check Loan Status</h2>
    </div>
    <div class="panel-body">
        <form role="form">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Student ID" name="student_id" type="text" autofocus>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <input type="submit" class="btn btn-lg btn-warning btn-block" value="Submit"/>
            </fieldset>
        </form>
        <a href="<?php echo base_url() ?>index.php/user/login" style="margin: 10px 0; display: inline-block">Back
            to login</a>
    </div>
</div>
