<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        return false;
    }

    public function viewLoad($view, $data = null){
        if (!isset($data['hide_menu'])){
            $data['hide_menu'] = '';
        }
        $this->load->view('header');
        if (!$this->isLoggedIn()){
            $this->load->view("landing/landingHeader", $data);
            $this->load->view("landing/landingLeftMenu", $data);
        }
        $this->load->view("$view", $data);
        if (!$this->isLoggedIn()){
            $this->load->view("landing/landingFooter", $data);
        }
        $this->load->view('footer');
    }
}
