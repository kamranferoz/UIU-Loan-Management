<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:33 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseModel.php';

class AdminModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function getApplications($status = NEW_LOAN){
        $data = array();
        $this->db->select("*");
        $this->db->from("loan");
        $this->db->join("personal_info p", "p.user_id = loan.user_id", "left");
        $this->db->join("loan_guarantor g", "g.loan_id = loan.id", "left");
        $this->db->join("users", "users.id = loan.user_id", "left");
        $this->db->where('loan.status', $status);
        $res = $this->db->get('');

        foreach ($res->result() as $row) {
            $currentApplication = array(
                'fullname' => $row->firstname . " " . $row->lastname,
                'user_id' => $row->user_id,
                'student_id' => $row->student_id,
                'cgpa' => $row->student_cgpa,
                'phone' => $row->phone,
                'email' => $row->email,
                'permanent_address'=> $row->permanent_address,
                'present_address' => $row->present_address,
                'note' => $row->note,
                'status' => $row->status,
                'guarantor_name' => $row->guarantor_name,
                'relation' => $row->relation,
                'guarantor_contact_no' => $row->guarantor_contact_no,
                'guarantor_address' => $row->guarantor_address,
                'amount' => $row->amount,
                'tenor' => $row->tenor,
                'date_taken' => date("jS F, Y", $row->approved_date),
                'created_time' => date("jS F, Y", $row->created_time),
            );
            $data[] = $currentApplication;
        }

        return $data;

    }

    function getDetailsOfApplication($loan_application_user_id, $existing_loan = false){
        $data = array();

        $this->db->select('*');
        $this->db->from('loan');
        $this->db->join('personal_info p', "p.user_id = loan.user_id", "left");
        $this->db->join('users', "users.id = loan.user_id", "left");
        $this->db->join('loan_guarantor', "loan_guarantor.loan_id = loan.id", "left");
        $this->db->where("loan.user_id", $loan_application_user_id);
        $res = $this->db->get();

        foreach ($res->result_array() as $row){
            $data['details'] = $row;
            break;
        }

        if ($existing_loan) {
            $this->db->select('t.amount, t.type, t.date, t.loan_id, t.adjustment, t.id');
            $this->db->from('transaction t');
            $this->db->join('loan', "t.loan_id = loan.id", "left");
            $this->db->where("loan.user_id", $loan_application_user_id);
            $res = $this->db->get();

            foreach ($res->result_array() as $row){
                $data['transactions'][] = $row;
            }
        }

        return $data;
    }

    function updateApplication($loan_application_user_id){
        /*
         * TODO: Email to the applicant when necessary with password
         *
         * */
        $action = $this->postGet('action');
        if ($action == 'addTransaction') {
            $data = array(
                'loan_id' => $this->postGet('loan_id'),
                'amount' => $this->postGet('amount'),
                'type' => $this->postGet('type'),
                'date' => strtotime($this->postGet('date')),
            );

            $this->db->insert('transaction', $data);
        } else if ($action == 'statusUpdate') {
            $data = array(
                'status' => $this->postGet('status'),
            );

            if ($data['status'] == EXISTING_LOAN) {
                $data['approved_date'] = time();
            }

            $this->db->where('user_id', $loan_application_user_id);
            $this->db->update('loan', $data);
        }

        return true;
    }

    function writeCSV($data){
        $fileName = FCPATH . "export/data.csv";;

        $list = array(
            0 => array('Student Name', 'Student ID', 'CGPA', 'Email', 'Phone', 'Present Address', 'Permanent Address',
            'Loan Amount', 'Loan Tenor', 'Loan Reason', 'Loan Status',
            'Loan Guarantor Name', 'Loan Guarantor Relation', 'Loan Guarantor Contact No.', 'Loan Guarantor Address')
        );

        foreach ($data as $key => $value) {
            $list[] = array(
                $value['fullname'], $value['student_id'], $value['cgpa'], $value['email'], $value['phone'], $value['present_address'],$value['permanent_address'],
                $value['amount'], $value['tenor'], $value['note'], $value['status'],
                $value['guarantor_name'], $value['relation'], $value['guarantor_contact_no'], $value['guarantor_address'],
            );
        }

        $fp = fopen($fileName, 'w');

        foreach ($list as $fields) {
            $status = fputcsv($fp, $fields);
            if ($status === false) {
                return false;
            }
        }

        fclose($fp);

        return true;
    }
}