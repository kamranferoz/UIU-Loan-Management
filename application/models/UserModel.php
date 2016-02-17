<?php
/**
 * Created by PhpStorm.
 * User: mohammadfaisalahmed
 * Date: 2/17/16
 * Time: 7:33 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function login()
    {
        $username = $this->postGet('username');
        $password = $this->postGet('password');

        $this->db->select("users.id, role.id as role_id");
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->join('role', 'role.id = users.role_id', 'left');
        $res = $this->db->get('users');

        foreach ($res->result() as $user) {
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('user_id', $user->id);
            $role = ($user->role_id == 1) ? ADMIN_ROLE_TITLE : STUDENT_ROLE_TITLE;
            $this->session->set_userdata('role', $role);
            return true;
        }
        return false;
    }
}