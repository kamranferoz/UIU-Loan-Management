<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH . "../application/libraries/utilities.php";

class Base extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    }

    public function isLoggedIn(){
        //TODO: Implement login check here
        return true;
    }

    public function getUserRole(){
        //TODO: query user role and return from here
        $role = ADMIN_ROLE_TITLE;
        return $role;
    }

    public function viewLoad($view, $data = null){
        if (!isset($data['hide_menu'])){
            $data['hide_menu'] = '';
        }
        $data['user_role'] = $this->getUserRole();
        $this->load->view('common/header');

        if (!$this->isLoggedIn()){
            $this->load->view("landing/landingHeader", $data);
            $this->load->view("landing/landingLeftMenu", $data);
        } else {
            $this->load->view("common/menu", $data);
            if ($data['user_role'] == STUDENT_ROLE_TITLE){

            } else if ($data['user_role'] == ADMIN_ROLE_TITLE){
            }
        }

        $this->load->view("$view", $data);

        if (!$this->isLoggedIn()){
            $this->load->view("landing/landingFooter", $data);
        } else {
            if ($data['user_role'] == STUDENT_ROLE_TITLE){

            } else if ($data['user_role'] == ADMIN_ROLE_TITLE){

            }
        }

        $this->load->view('common/footer');
    }
}
