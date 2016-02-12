<div class="row">
    <div class="col-lg-12">
        <h4 class="text-right" style="margin-top: 0;"><a href="<?php echo base_url() ?>index.php/user/login" style="margin: 10px 0; display: inline-block">Back to login</a></h4>
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

                                    <div id="errorMsg" style="display: none;" class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" onclick="closeNotification('#errorMsg')" aria-hidden="true">×</button>
                                        Please correct the following errors:
                                    </div>

                                    <div class="form-group" id="fnameDiv">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" required class="form-control" id="fname" name="fname" placeholder="Enter your first name">
                                    </div>

                                    <div class="form-group" id="lnameDiv">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" required class="form-control" id="lname" name="lname" placeholder="Enter your last name">
                                    </div>

                                    <div class="form-group" id="student_idDiv">
                                        <label>Student ID <span class="required">*</span></label>
                                        <input type="text" required class="form-control" id="student_id" name="student_id" placeholder="Enter your university ID">
                                    </div>

                                    <div class="form-group" id="emailDiv">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" required class="form-control" id="email" name="email" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group" id="nidDiv">
                                        <label for="nid">National ID</label>
                                        <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter your National ID">
                                    </div>

                                    <div class="form-group" id="students_present_addressDiv">
                                        <label for="students_present_address">Student's Present Address <span class="required">*</span></label></label>
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

                                    <div id="errorMsg2" style="display: none;" class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" onclick="closeNotification('#errorMsg2')" aria-hidden="true">×</button>
                                        Please correct the following errors:
                                    </div>

                                    <div class="form-group" id="loan_amountDiv">
                                        <label for="loan_amount">Amount <span class="required">*</span></label>
                                        <input type="number" required class="form-control" id="loan_amount" name="loan_amount" placeholder="Enter your loan ammount">
                                    </div>
                                    <div class="form-group">
                                        <label>Tenor</label>
                                        <select class="form-control">
                                            <option value="4 months">Within 4 months</option>
                                            <option value="6 months">Within 6 months</option>
                                            <option value="1 year">Within 1 year</option>
                                            <option value="2 years">Within 2 years</option>
                                            <option value="3 years">Within 3 years</option>
                                            <option value="4 years">Within 4 years</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="reasonDiv">
                                        <label for="reason">Reason <span class="required">*</span></label>
                                        <textarea id="reason" required class="form-control" rows="3" placeholder="Enter your reason.."></textarea>
                                    </div>

                                    <a class="btn btn-outline btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Back</a>
                                    <a class="btn btn-outline btn-primary" onclick="checkValidationStepTwo('#collapseThreeTrigger')">Next</a>
                                    <a style="visibility: hidden;" id="collapseThreeTrigger" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"></a>
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

                                    <div id="errorMsg3" style="display: none;" class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" onclick="closeNotification('#errorMsg3')" aria-hidden="true">×</button>
                                        Please correct the following errors:
                                    </div>


                                    <div class="form-group" id="gnameDiv">
                                        <label for="gname">Guardian Name <span class="required">*</span></label>
                                        <input type="text" required class="form-control" id="gname" name="gname" placeholder="Enter guardian's name">
                                    </div>

                                    <div class="form-group">
                                        <label for="relation">Relation <span class="required">*</span></label>
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
                                        <label for="gphone">Guardian Phone Number <span class="required">*</span></label>
                                        <input type="text" required class="form-control" id="gphone" name="gphone" placeholder="Enter guardian's Phone Number">
                                    </div>

                                    <div class="form-group" id="gaddressDiv">
                                        <label for="gaddress">Guardian's Present Address<span class="required">*</span></label>
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
        function checkValidationStepTwo(element){
            var fields = ['loan_amount','reason'], loop, errorFlag = false;
            for (loop = 0; loop < fields.length; loop++){
                if (!document.getElementById(fields[loop]).checkValidity()){
                    $('#' + fields[loop] + 'Div').addClass('has-error');
                    errorFlag = true;
                } else {
                    $('#' + fields[loop] + 'Div').removeClass('has-error');
                }
            }
            if (!errorFlag) {
                $('#errorMsg2').slideUp();
                $(element).click();
            }
            else $('#errorMsg2').slideDown();
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

        function closeNotification(e){
            $(e).slideUp();
        }

    </script>