<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect(base_url());
    }

    public function register()
    {
        $this->func->sessionCheck(false);
        $name     = $this->func->input('post', 'name', 'propercase');
        $email    = $this->func->input('post', 'email', 'lowercase');
        $password = $this->func->input('post', 'password', 'password');
        if ($this->data->registerCheck($email)) {
            $user = $this->data->registerSet($name, $email, $password);
            $this->session->set_userdata('user', $user);
            redirect(base_url('home'));
        }
        redirect(base_url('login'));
    }

    public function auth()
    {
        $this->func->sessionCheck(false);
        $email    = $this->func->input('post', 'email', 'lowercase');
        $password = $this->func->input('post', 'password', 'password');
        if (!is_null($user = $this->data->loginCheck($email, $password))) {
            $this->session->set_userdata('user', $user);
            redirect(base_url('home'));
        }
        redirect(base_url('login'));
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url());
    }

    public function add($id)
    {
        $self = $this->func->sessionCheck(true);
        if ($this->data->friendCheck($self->id, $id) == false) {
            $this->data->friendSet($self->id, $id);
        }
        redirect($this->agent->referrer());
    }

    public function update()
    {
        $user  = $this->func->sessionCheck(true);
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
