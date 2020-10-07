<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $this->func->logged(true);
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
        if ($this->func->logged()) {
            redirect(base_url('home'));
        }
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
        if ($this->func->logged()) {
            redirect(base_url('home'));
        }
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
        // $this->func->logged(true);
        $data = array(
            'page' => array(
                'menu'             => "Home",
                'title'            => "Welcome to Cospace! The best friendship platform for you",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('home', $data);
    }

    public function explore()
    {
        // $this->func->logged(true);
        $data = array(
            'page' => array(
                'menu'             => "Explore",
                'title'            => "Explore Your Partner From Around The World",
                'meta_description' => "This is a platform for you to make friends, be free!",
            ),
        );
        $this->load->view('explore', $data);
    }

    public function check()
    {
        if ($this->func->logged()) {
            redirect(base_url('home'));
        }
        $username = $this->func->input('post', 'username', 'username');
        $password = $this->func->input('post', 'password', 'password');
        $user     = $this->data->get('user', "WHERE (username = '$username' OR email = '$username') AND password = '$password' AND status = 'Active'");
        if (!is_null($user)) {
            $this->session->set_userdata('user', $user);
            redirect(base_url('home'));
        }
        redirect(base_url('login'));
    }

    public function forgot()
    {
        if ($this->func->logged()) {
            redirect(base_url('home'));
        }
        $this->load->view('forgot');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url('index'));
    }

    public function profile()
    {
        $this->func->logged(true);
        $data = array(
            'user' => $this->func->logged(),
        );
        $this->load->view('profile', $data);
    }

    public function profile_update()
    {
        $user  = $this->func->logged(true);
        $check = $this->data->get('user', "WHERE username = '" . $this->func->input('post', 'username', 'username') . "' AND id != '$user->id'");
        if (!is_null($check)) {
            redirect(base_url('profile'));
        }
        $avatar = $this->func->upload('avatar', 'assets/img/user', $this->func->input('post', 'username', 'username') . '.jpg');
        $update = array(
            'username' => $this->func->input('post', 'username', 'username'),
            'password' => $this->func->input('post', 'password', 'password') ? $this->func->input('post', 'password', 'password') : $user->password,
            'name'     => $this->func->input('post', 'name'),
            'phone'    => $this->func->input('post', 'phone'),
            'email'    => $this->func->input('post', 'email'),
            'status'   => $this->func->input('post', 'status'),
            'avatar'   => !empty($avatar) ? $avatar[0]['image'] : $user->avatar,
        );
        $user = $this->data->update('user', $update, $user->id);
        $this->session->set_userdata('user', $user);
        redirect(base_url('profile'));
    }
}