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
        echo 'hello World';
    }

    public function logout(){

    }

    public function registration(){

    }
}
