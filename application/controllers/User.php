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
        $this->viewLoad('landing/login');
    }

    public function logout(){
        //TODO: Add successful logout message
        redirect('user/login', 'refresh');
    }

    public function applyForLoan(){
        if ($this->isLoggedIn()){
            redirect('dashboard', 'refresh');
        }
        $data = array(
            'hide_menu' => 'all'
        );
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
            'hide_menu' => 'all'
        );
        $this->viewLoad('landing/faq', $data);
    }
}
