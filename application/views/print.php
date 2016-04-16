<div style="padding: 5px;">
    <script type="text/javascript">
        function prepareToPrint(){
            document.getElementById('printButton').style.display = 'none';
            window.print();
            document.getElementById('printButton').style.display = 'block';
        }
    </script>
    <p id="printButton" style="text-align: center;">
        <button type="button" onclick="prepareToPrint();">Print Application</button>
    </p>
    <p>
        Date: <?php echo date("jS F, Y", time()) ?><br/>
        The Vice Chancellor
    </p>
    <p>
        Through<br/>
        Directorate of Student Affairs<br/>
        United International University<br/>
        House # 80, Road # 8/A, Satmasjid Road<br/>
        Dhamoondi, Dhaka-1209
    </p>

    <p>
        <strong>Subject: <span style="text-decoration: underline;">Application for Loan from Student Welfare Fund.</span></strong>
    </p>

    <p>
        <strong>Dear Sir,</strong>
    </p>
    <p>
        I am <?php echo $fullname ?> bearing ID <?php echo $student_id ?> am a student of United International
        University.
        I have already completed <?php echo $completed_credits ?> credits up to <?php echo $last_semester ?>. I will register <?php echo $taken_credits ?> credits on <?php echo $next_semester ?>. My current
        CGPA is <?php echo $cgpa ?> and GPA of last trimester is <?php echo $previous_semester_gpa ?>, due to some financial problem of my parents I need
        BDT <?php echo $requested_amount ?> as loan from student welfare fund to continue my study smoothly. I will pay back the loan if granted, within
        <?php echo $tenor  ?> .
    </p>

    <p>So, I would be kind enough if you granted my loan.</p>

    <div style="float: right;">
        <div style="border: 1px solid #000000; padding: 2px; width: 350px;">Remarks</div>
        <div style="border: 1px solid #000000; padding: 2px; height: 120px;">&nbsp;</div>
        <div style="border: 1px solid #000000; padding: 2px;">DSA</div>
        <div style="border: 1px solid #000000; padding: 2px; height: 120px;">&nbsp;</div>
        <div style="border: 1px solid #000000; padding: 2px;">Vice Chancellor</div>
        <div style="border: 1px solid #000000; padding: 2px; height: 80px;">&nbsp;</div>
    </div>

    <p> Sincerely Yours </p>

    Student Name: <?php echo $fullname  ?><br>
    Id: <?php echo $student_id  ?><br>
    <!--Dept: <br>-->
    Phone: <?php echo $phone  ?><br>
    Email: <?php echo $email  ?><br> <br> <br> <br> <br>

    Guardian Name: <?php echo $guarantor_name  ?><br>
    Relation: <?php echo $relation  ?><br>
    Phone: <?php echo $guarantor_contact_no  ?>
</div>