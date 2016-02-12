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
    }

    public function index()
    {
        if ($this->getUserRole() == STUDENT_ROLE_TITLE) {
            $this->viewLoad('student/dashboard');
        } else if ($this->getUserRole() == ADMIN_ROLE_TITLE){
            $this->viewLoad('admin/dashboard');
        }
    }
}