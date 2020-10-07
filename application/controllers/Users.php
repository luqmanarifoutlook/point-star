<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function profile()
    {
        $data = array(
            'page' => array(
                'menu'             => "Profile",
                'title'            => "My Profile",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('profile', $data);
    }

    public function edit()
    {
        $data = array(
            'page' => array(
                'menu'             => "Profile",
                'title'            => "Edit Profile",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('edit', $data);
    }
}
