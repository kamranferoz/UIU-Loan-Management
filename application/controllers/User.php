<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base.php';

class User extends Base {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->isLoggedIn()){
            redirect('dashboard', 'refresh');
        }
        redirect('user/login', 'refresh');
    }

    public function login(){
        if ($this->isLoggedIn()){
            redirect('dashboard', 'refresh');
        }

        $data = array(
            'hide_menu' => 'login'
        );
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->UserModel->login()) {
                redirect('dashboard', 'refresh');
            } else {
                $data['error'] = 'Invalid Username or password.';
            }
        } else {
            $data['notification'] = 'Please enter your username and password to login.';
        }

        $this->viewLoad('landing/login', $data);
    }

    public function logout(){
        if ($this->isLoggedIn()){
            $this->session->sess_destroy();
        }
        redirect('user/login', 'refresh');
    }

    public function applyForLoan(){
        if ($this->isLoggedIn()){
            redirect('dashboard', 'refresh');
        }
        $data = array(
            'hide_menu' => 'apply'
        );

        if ($error = $this->getSessionAttr('error')){
            $data['error'] = $error;
            $this->unsetSessionAttr('error');
        }

        $this->viewLoad('landing/apply', $data);
    }

    public function forgotPassword(){
        if ($this->isLoggedIn()){
            redirect('dashboard', 'refresh');
        }
        $this->viewLoad('landing/forgot_password');
    }

    public function loanStatus(){
        if ($this->isLoggedIn()){
            redirect('dashboard', 'refresh');
        }
        $data = array(
            'hide_menu' => 'loan_status'
        );
        $this->viewLoad('landing/loan_status', $data);
    }

    public function faq(){
        $data = array(
            'hide_menu' => 'faq'
        );
        $this->viewLoad('landing/faq', $data);
    }
    public function newLoanApplication(){
        $data = array(
            'hide_menu' => 'applyFormSubmit'
        );

        $loanApplicationStatus = $this->UserModel->newLoanApplication();

        if ($loanApplicationStatus === true) {
            $this->viewLoad('landing/loanApplicationSuccessful', $data);
        } else {
            $this->setSessionAttr("error", "$loanApplicationStatus");
            redirect('user/applyForLoan', 'refresh');
        }
    }
}
