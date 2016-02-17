<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:32 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH . "../application/libraries/utilities.php";

class BaseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function debug($debugArray){
        echo "<pre>";
        print_r($debugArray);
        echo "</pre>";
    }

    function getPost($attr, $filter = true) {
        $return = trim($this->input->get_post($attr, $filter));
        return $return;
    }

    function postGet($attr, $filter = true) {
        $return = trim($this->input->post_get($attr, $filter));
        return $return;
    }
}