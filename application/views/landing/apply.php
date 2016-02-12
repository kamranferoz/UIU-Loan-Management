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
            <form role="form" id="loanForm" method="post" action="">
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
                                        <label for="fname">First Name <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="fname" name="fname" placeholder="Enter your first name">
                                    </div>

                                    <div class="form-group" id="lnameDiv">
                                        <label for="lname">Last Name <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="lname" name="lname" placeholder="Enter your last name">
                                    </div>

                                    <div class="form-group" id="student_idDiv">
                                        <label for="student_id">Student ID <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="student_id" name="student_id" placeholder="Enter your university ID">
                                    </div>

                                    <div class="form-group" id="emailDiv">
                                        <label for="email">Email <span style="color: red">*</span></label>
                                        <input type="email" required class="form-control" id="email" name="email" placeholder="Enter your email">
                                   </div>

                                    <div class="form-group" id="nidDiv">
                                        <label for="nid">National ID</label>
                                        <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter your National ID">
                                    </div>

                                    <div class="form-group" id="students_present_addressDiv">
                                        <label for="students_present_address">Student's Present Address<span style="color: red">*</span></label></label>
                                        <input type="text" required class="form-control" id="students_present_address" name="students_present_address" placeholder="Enter your Present Address">
                                    </div>

                                    <div class="form-group" id="students_permanent_addressDiv">
                                        <label for="students_permanent_address">Student's Permanent Address</label>
                                        <input type="text" class="form-control" id="students_permanent_address" name="students_permanent_address" placeholder="Enter your Permanent Address">
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

                                    <div id="errorMsg3" style="color: red; display: none;">Please correct the following errors:</div>

                                    <div class="form-group" id="gnameDiv">
                                        <label for="gname">Guardian Name <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="gname" name="gname" placeholder="Enter guardian's name">
                                    </div>

                                    <div class="form-group">
                                        <label for="relation">Relation <span style="color: red">*</span></label>
                                        <select class="form-control" id="relation" name="relation">
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="brother">Brother</option>
                                            <option value="sister">Sister</option>
                                            <option value="uncle">Uncle</option>
                                            <option value="aunt">Aunt</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="gphoneDiv">
                                        <label for="gphone">Guardian Phone Number <span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="gphone" name="gphone" placeholder="Enter guardian's Phone Number">
                                    </div>

                                    <div class="form-group" id="gaddressDiv">
                                        <label for="gaddress">Guardian's Present Address<span style="color: red">*</span></label>
                                        <input type="text" required class="form-control" id="gaddress" name="gaddress" placeholder="Enter guardian's Present Address">
                                    </div>

                                    <a class="btn btn-outline btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Back</a>
                                    <a class="btn btn-outline btn-primary" onclick="checkValidationStepThree('#loanForm')">Submit</a>
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
            var fields = ['fname', 'lname', 'student_id', 'email', 'nid', 'students_present_address', 'students_permanent_address'], loop, errorFlag = false;
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
        function checkValidationStepThree(element){
            var fields = ['gname', 'relation', 'gphone', 'gaddress'], loop, errorFlag = false;
            for (loop = 0; loop < fields.length; loop++){
                if (!document.getElementById(fields[loop]).checkValidity()){
                    $('#' + fields[loop] + 'Div').addClass('has-error');
                    errorFlag = true;
                } else {
                    $('#' + fields[loop] + 'Div').removeClass('has-error');
                }
            }
            if (!errorFlag) {
                $('#errorMsg3').slideUp();
                $(element).submit();
            }
            else $('#errorMsg3').slideDown();
        }

    </script>
