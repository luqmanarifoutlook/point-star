<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
    public function index()
    {
        $this->func->sessionCheck(true);
        redirect(base_url('home'));
    }

    public function page_404()
    {
        $data = array(
            'page' => array(
                'menu'             => "404",
                'title'            => "Page not found!",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('404', $data);
    }

    public function login()
    {
        $this->func->sessionCheck(false);
        $data = array(
            'page' => array(
                'menu'             => "Login",
                'title'            => "Welcome to Cospace! The best friendship platform for you",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('login', $data);
    }

    public function signup()
    {
        $this->func->sessionCheck(false);
        $data = array(
            'page' => array(
                'menu'             => "Sign Up",
                'title'            => "Welcome to Cospace! The best friendship platform for you",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('signup', $data);
    }

    public function home()
    {
        $self = $this->func->sessionCheck(true);
        $data = array(
            'page'  => array(
                'menu'             => "Home",
                'title'            => "Welcome to Cospace! The best friendship platform for you",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
            'users' => $this->data->userList($self->id, 3),
            'self'  => $self,
        );
        $this->load->view('home', $data);
    }

    public function explore()
    {
        $self = $this->func->sessionCheck(true);
        $data = array(
            'page'  => array(
                'menu'             => "Explore",
                'title'            => "Explore Your Partner From Around The World",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
            'users' => $this->data->userList($self->id),
            'self'  => $self,
        );
        $this->load->view('explore', $data);
    }

    public function profile($id)
    {
        $self = $this->func->sessionCheck(true);
        $user = $this->data->userGet($id);
        $data = array(
            'page'     => array(
                'menu'             => "Profile",
                'title'            => "Profile of " . $user->name,
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
            'comments' => $this->data->commentList($id),
            'friends'  => $this->data->friendList($id),
            'user'     => $user,
            'self'     => $self,
        );
        $this->load->view('profile', $data);
    }

    public function edit()
    {
        $self = $this->func->sessionCheck(true);
        $data = array(
            'page' => array(
                'menu'             => "Profile",
                'title'            => "Edit Profile",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
            'self' => $self,
        );
        $this->load->view('edit', $data);
    }
}
