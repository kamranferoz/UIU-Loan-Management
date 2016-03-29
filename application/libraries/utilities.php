<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/12/16
 * Time: 9:33 PM
 */

define('ADMIN_ROLE_TITLE', 'admin');
define('STUDENT_ROLE_TITLE', 'student');

define('LOAN_FOR_STUDENT', 'Debit');
define('LOAN_PAYMENT_FOR_STUDENT', 'Credit');

define("NEW_LOAN","Sent to the Department");
define("PROCESSING_LOAN","Loan is being reviewed by the authority");
define("EXISTING_LOAN","Approved");
define("DECLINED_LOAN","The application was declined by the authority");
define("DEBT_LOAN","You have not paid your previous loan. Please pay your existing loan");
define("RETURNED_LOAN","Paid in full");

global $exportItem;

$exportItem = array(NEW_LOAN, PROCESSING_LOAN, EXISTING_LOAN, DECLINED_LOAN, DEBT_LOAN, RETURNED_LOAN);