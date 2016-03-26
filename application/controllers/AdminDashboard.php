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
        $newApplication = $this->AdminModel->newApplication();
        $newApplication['menuTitle'] = 'New Loan Application';
        $this->viewLoad('admin/dashboard', $newApplication);
    }

    public function processingApplication()
    {
        $processing = $this->AdminModel->newApplication(PROCESSING);
        $processing['menuTitle'] = 'Application in Processing';
        $this->viewLoad('admin/dashboard', $processing);
    }

    public function existingLoan()
    {
        $existing = $this->AdminModel->newApplication(EXISTING);
        $existing['menuTitle'] = 'Current Loan';
        $this->viewLoad('admin/dashboard', $existing);
    }

    public function declinedApplication()
    {
        $declined = $this->AdminModel->newApplication(DECLINED);
        $declined['menuTitle'] = 'Declined Loan Queue';
        $this->viewLoad('admin/dashboard', $declined);
    }

    public function loanDebt()
    {
        $debt = $this->AdminModel->newApplication(DEBT);
        $debt['menuTitle'] = 'Loan in Debt';
        $this->viewLoad('admin/dashboard', $debt);
    }

}