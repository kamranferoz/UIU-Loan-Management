<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:33 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseModel.php';

class StudentModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function loadTransaction($userId){
        $data = array();
        $this->db->select("
            l.amount loanAmount, l.approved_date, l.distribution_date, l.installment_amount, l.cycle_due_date, l.tenor, l.installment_system,
            t.amount tranAmount, t.type, t.date, t.adjustment
        ");
        $this->db->where('l.user_id', $userId);
        $this->db->join('transaction t', 't.loan_id = l.id', 'left');
        $res = $this->db->get('loan l');

        foreach ($res->result_array() as $transaction) {
            $data[] = $transaction;
        }
        return $data;

    }
}