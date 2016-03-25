<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:33 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        $username = $this->postGet('username');
        $password = $this->postGet('password');

        $this->db->select("users.id, role.id as role_id");
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->join('role', 'role.id = users.role_id', 'left');
        $res = $this->db->get('users');

        foreach ($res->result() as $user) {
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('user_id', $user->id);
            $role = ($user->role_id == 1) ? ADMIN_ROLE_TITLE : STUDENT_ROLE_TITLE;
            $this->session->set_userdata('role', $role);
            return true;
        }
        return false;
    }
    function newLoanApplication(){
        /*
         *  TODO:
            Email to the admin
            Email to the applicant with the information (unique loan id)
        */

        $fname = $this->postGet('fname');
        $lname = $this->postGet('lname');
        $nid = $this->postGet('nid');
        $student_id = $this->postGet('student_id');
        $student_cgpa = $this->postGet('student_cgpa');
        $student_phone = $this->postGet('student_phone');
        $students_present_address = $this->postGet('students_present_address');
        $students_permanent_address = $this->postGet('students_permanent_address');

        $loan_amount = $this->postGet('loan_amount');
        $tenor = $this->postGet('tenor');
        $reason = $this->postGet('reason');

        $gname = $this->postGet('gname');
        $relation = $this->postGet('relation');
        $gphone = $this->postGet('gphone');
        $gaddress = $this->postGet('gaddress');

        if ($student_id == ''){
            return 'Student id is required.';
        }
        if ($fname == ''){
            return 'First name is required.';
        }
        if ($lname == ''){
            return 'Last name is required.';
        }
        if ($student_cgpa == ''){
            return 'Students CGPA is required.';
        }
        if ($student_phone == ''){
            return 'Students phone number is required.';
        }
        if ($students_present_address == ''){
            return 'Students present address is required.';
        }
        if ($loan_amount == ''){
            return 'Loan amount is required.';
        }
        if ($reason == ''){
            return 'Reason is required.';
        }
        if ($gname == ''){
            return 'Guardians name is required.';
        }
        if ($relation == ''){
            return 'Relation is required.';
        }
        if ($gphone == ''){
            return 'guardians phone number is required.';
        }
        if ($gaddress == ''){
            return 'guardians address is required.';
        }

        $userData = array(
            'username' => time(),
            'password' => md5($student_id),
            'email' => $this->postGet('email'),
            'role_id' => '2'
        );

        $user_id = $this->db->insert('users', $userData);

        if (!$user_id){
            return "An error found. Please try again later!";
        }

        $personal_info_data = array(
            'user_id' => $user_id,
            'firstname' => $fname ,
            'lastname' => $lname ,
            'national_id' => $nid ,
            'student_id' => $student_id ,
            'student_cgpa' => $student_cgpa ,
            'present_address' => $students_present_address,
            'parmanent_address' => $students_permanent_address,
            'phone' => $student_phone
        );

        $personal_info_id = $this->db->insert('personal_info', $personal_info_data);

        if (!$personal_info_data){
            return "An error found. Please try again later!";
        }

        $loan_data = array(
            'user_id' => $user_id,
            'amount' => $loan_amount ,
            'installment_amount' => ($loan_amount / $tenor),
            'tenor' => $tenor ,
            'note' => $reason
        );

        $loan_id = $this->db->insert('loan', $loan_data);

        if (!$loan_data){
            return "An error found. Please try again later!";
        }

        $loan_guarantor_data = array(
            'loan_id' => $loan_id ,
            'guarantor_name' => $gname ,
            'relation' => $relation,
            'guarantor_contact_no' => $gphone ,
            'guarantor_address' => $gaddress
        );

        $loan_guarantor_id = $this->db->insert('loan_guarantor', $loan_guarantor_data);

        if (!$loan_guarantor_data){
            return "An error found. Please try again later!";
        }

        return true;
    }
}