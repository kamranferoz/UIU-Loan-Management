<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class StudentDashboard extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->redirectPublicUser();
        $this->load->model('StudentModel');
    }

    public function index()
    {
        redirect('StudentDashboard/loanDetails', 'refresh');
    }


    public function loanDetails(){
        $transaction = $this->StudentModel->loadTransaction($this->getUserId());

        $data = array(
            'total_approved_loan' => $transaction[0]['approvedLoanAmount'],
            'total_requested_loan' => $transaction[0]['requestedLoanAmount'],
            'approve_date' => date('F d, Y', $transaction[0]['approved_date']),
            'remaining_loan' => $transaction[0]['remaining_amount'],
            'tenor' => $transaction[0]['tenor'],
        );

        $data['transaction'] = $transaction;
        $this->viewLoad('student/dashboard', $data);
    }
}