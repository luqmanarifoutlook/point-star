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
        $self     = $this->func->sessionCheck(true);
        $user     = $this->data->userGet($self->id);
        $name     = $this->func->input('post', 'name', 'propercase');
        $phone    = $this->func->input('post', 'phone', 'number');
        $email    = $this->func->input('post', 'email', 'lowercase');
        $bio      = $this->func->input('post', 'bio');
        $password = $this->func->input('post', 'password', 'password');
        $avatar   = $this->func->upload('avatar', 'assets/images/users', md5($self->id) . '.jpg');
        $data     = array(
            'name'     => $name,
            'phone'    => $phone,
            'email'    => $email,
            'bio'      => $bio,
            'avatar'   => !empty($avatar) ? $avatar['image'] : $user->avatar,
            'password' => $password ? $password : $self->password,
        );
        $user = $this->data->userUpdate($data, $self->id);
        $this->session->set_userdata('user', $user);
        redirect(base_url('profile/' . $self->id));
    }

    public function comment()
    {
        $self      = $this->func->sessionCheck(true);
        $id_friend = $this->func->input('post', 'id_friend', 'number');
        $message   = $this->func->input('post', 'message');
        $this->data->commentSet($self->id, $id_friend, $message);
        redirect($this->agent->referrer());
    }
}
