<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class Dashboard extends Base
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->isLoggedIn()){
            redirect('user/login', 'refresh');
        }
        $this->load->model('StudentModel');
    }

    public function index()
    {
        if ($this->getUserRole() == STUDENT_ROLE_TITLE) {
            $transaction = $this->StudentModel->loadTransaction($this->getUserId());
            $distribution_date = date('F d, Y', $transaction[0]['distribution_date']);
            $cycle_due_date = date('dS', $transaction[0]['cycle_due_date']);
            $installment_amount = $transaction[0]['installment_amount'];
            $tenor = $transaction[0]['tenor'];
            $total_loan = $transaction[0]['loanAmount'];
            $installment_system = $transaction[0]['installment_system'];
            $total_return = 0;

            foreach($transaction as $key => $value){
                if ($value['type'] == LOAN_PAYMENT_FOR_STUDENT) {
                    $total_return += $value['tranAmount'];
                    $total_return += $value['adjustment'];
                    $transaction[$key]['class'] = 'success';
                } else {
                    $transaction[$key]['class'] = 'danger';
                }
            }

            $remaining_loan = $total_loan - $total_return;

            $data = array(
                'total_loan' => $total_loan,
                'total_return' => $total_return,
                'remaining_loan' => $remaining_loan,

                'distribution_date' => $distribution_date,
                'tenor' => $tenor,

                'installment_system' => $installment_system,
                'cycle_due_date' => $cycle_due_date,
                'installment_amount' => $installment_amount,
            );

            $data['transaction'] = $transaction;
            $this->viewLoad('student/dashboard', $data);
        } else if ($this->getUserRole() == ADMIN_ROLE_TITLE){
            $this->viewLoad('admin/dashboard');
        }
    }
}