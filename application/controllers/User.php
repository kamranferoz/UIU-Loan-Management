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
        redirect('user/login', 'refresh');
    }

    public function login(){
        $this->viewLoad('landing/login');
    }

    public function logout(){
        //TODO: Add successful logout message
        redirect('user/login', 'refresh');
    }

    public function applyForLoan(){
        $data = array(
            'hide_menu' => 'all'
        );
        $this->viewLoad('landing/apply', $data);
    }

    public function forgotPassword(){
        $this->viewLoad('landing/forgot_password');
    }

    public function loanStatus(){
        $data = array(
            'hide_menu' => 'loan_status'
        );
        $this->viewLoad('landing/loan_status', $data);
    }

    public function faq(){
        $data = array(
            'hide_menu' => 'all'
        );
        $this->viewLoad('landing/faq', $data);
    }
}
