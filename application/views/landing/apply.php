<div class="row">
    <div class="col-lg-12">
        <h4 class="text-right" style="margin-top: 0;"><a href="<?php echo base_url() ?>../index.php/user/login" style="margin: 10px 0; display: inline-block">Back to login</a></h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Applicant's Detail
            </div>
            <form role="form">
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Personal Information
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div id="errorMsg" style="color: red; display: none;">Please correct the following errors:</div>

                                    <div class="form-group" id="fnameDiv">
                                        <label>First Name <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="fname" name="fname" placeholder="Enter your first name">
                                    </div>

                                    <div class="form-group" id="lnameDiv">
                                        <label>Last Name <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="lname" name="lname" placeholder="Enter your last name">
                                    </div>

                                    <div class="form-group" id="student_idDiv">
                                        <label>Student ID <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="student_id" name="student_id" placeholder="Enter your university ID">
                                    </div>

                                    <div class="form-group" id="emailDiv">
                                        <label>Email <span style="color: red">*</span></label>
                                        <input type="email" required class="form-control" id="email" name="email" placeholder="Enter your email">
                                   </div>

                                    <a class="btn btn-outline btn-primary" onclick="checkValidationStepOne('#collapseTwoTrigger')">Next</a>
                                    <a style="visibility: hidden;" id="collapseTwoTrigger" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Loan Information
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <a class="btn btn-outline btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Back</a>
                                    <a class="btn btn-outline btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Next</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Guarantor Information
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <a class="btn btn-outline btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Back</a>
                                    <input type="submit" class="btn btn-outline btn-primary" value="Submit"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .panel-body -->
            </form>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

    <script type="text/javascript">
        function checkValidationStepOne(element){
            var fields = ['fname', 'lname', 'student_id', 'email'], loop, errorFlag = false;
            for (loop = 0; loop < fields.length; loop++){
                if (!document.getElementById(fields[loop]).checkValidity()){
                    $('#' + fields[loop] + 'Div').addClass('has-error');
                    errorFlag = true;
                } else {
                    $('#' + fields[loop] + 'Div').removeClass('has-error');
                }
            }
            if (!errorFlag) {
                $('#errorMsg').slideUp();
                $(element).click();
            }
            else $('#errorMsg').slideDown();
        }
    </script>
