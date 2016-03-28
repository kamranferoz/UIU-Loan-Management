<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class AdminDashboard extends Base
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->isLoggedIn()){
            redirect('user/login', 'refresh');
        }
        $this->load->model('AdminModel');
    }

    public function index()
    {
        redirect('AdminDashboard/newApplicant', 'refresh');
    }

    public function newApplicant()
    {
        $newApplication = array();
        $newApplication['application'] = $this->AdminModel->getApplications();
        $newApplication['menuTitle'] = 'New Loan Application';
        $newApplication['item'] = 1;
        $this->viewLoad('admin/dashboard', $newApplication);
    }

    public function processingApplication()
    {
        $processing = array();
        $processing['application'] = $this->AdminModel->getApplications(PROCESSING_LOAN);
        $processing['menuTitle'] = 'Application in Processing';
        $processing['item'] = 2;
        $this->viewLoad('admin/dashboard', $processing);
    }

    public function existingLoan()
    {
        $existing = array();
        $existing['application'] = $this->AdminModel->getApplications(EXISTING_LOAN);
        $existing['status'] = 'existing';
        $existing['item'] = 3;
        $existing['menuTitle'] = 'Current Loan';
        $this->viewLoad('admin/dashboard', $existing);
    }

    public function declinedApplication()
    {
        $declined = array();
        $declined['application'] = $this->AdminModel->getApplications(DECLINED_LOAN);
        $declined['menuTitle'] = 'Declined Loan Queue';
        $declined['item'] = 4;
        $this->viewLoad('admin/dashboard', $declined);
    }

    public function loanDebt()
    {
        $debt = array();
        $debt['application'] = $this->AdminModel->getApplications(DEBT_LOAN);
        $debt['menuTitle'] = 'Loan in Debt';
        $debt['item'] = 5;
        $this->viewLoad('admin/dashboard', $debt);
    }

    public function loanReturned()
    {
        $returned = array();
        $returned['application'] = $this->AdminModel->getApplications(RETURNED_LOAN);
        $returned['menuTitle'] = 'Returned Loan';
        $returned['item'] = 6;
        $this->viewLoad('admin/dashboard', $returned);
    }

    public function viewApplication()
    {
        $loan_application_user_id = $this->uri->segment(3);
        /*$existing_loan = !!($this->uri->segment(4));*/
        $existing_loan = 1;

        $data = array();
        if (strtolower($this->input->method()) == 'post'){
            $message = $this->AdminModel->updateApplication($loan_application_user_id);
            if ($message === true) {
                $data['success'] = 'The loan is updated successfully.';
            } else {
                $data['error'] = $message;
            }
        }

        $data['application_detail'] = $this->AdminModel->getDetailsOfApplication($loan_application_user_id, $existing_loan);
        if (!isset($data['application_detail']['transactions'])) { $data['application_detail']['transactions'] = array(); }

        $this->viewLoad('admin/application_detail', $data);
    }

    public function download(){
        $item = $this->uri->segment(3);
    }
}