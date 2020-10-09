<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Func extends CI_Model
{
    public function sessionUser()
    {
        return $this->session->user ? json_decode(json_encode($this->session->user), false) : null;
    }

    public function sessionCheck($required = null)
    {
        $user = $this->sessionUser();
        if (($required == true) && is_null($user)) {
            redirect(base_url('login'));
        } elseif (($required == false) && !is_null($user)) {
            redirect(base_url('home'));
        }
        return $user;
    }

    public function input($request, $parameter, $type = 'text')
    {
        switch ($request) {
            case 'get':
                $value = $this->input->get($parameter);
                break;
            case 'post':
                $value = $this->input->post($parameter);
                break;
            default:
                return null;
        }
        $value = trim($value);
        $value = xss_clean($value);
        if ((is_null($value)) || ($value == "")) {
            return $value = null;
        }
        switch ($type) {
            case 'lowercase':
                $value = strtolower($value);
                break;
            case 'uppercase':
                $value = strtoupper($value);
                break;
            case 'propercase':
                $value = ucwords(strtolower($value));
                break;
            case 'number':
                preg_match_all('!\d+!', $value, $matches);
                $value = !is_null($matches) ? join($matches[0], "") : 0;
                break;
            case 'password':
                $value = md5($value);
                break;
            default:
                break;
        }
        return $value;
    }

    public function upload($input, $path, $name = null)
    {
        $data = array();
        $path = $path[strlen($path) - 1] != '/' ? $path . '/' : $path;
        if (!is_dir(FCPATH . $path)) {
            mkdir(FCPATH . $path, 0777);
        }
        $origin    = $_FILES[$input]['tmp_name'];
        $names     = explode('.', $_FILES[$input]['name']);
        $extension = $names[count($names) - 1];
        $temp      = '';
        $image     = '';
        if (preg_match('/jpg|jpeg/i', $extension)) {
            $temp = imagecreatefromjpeg($origin);
        } else if (preg_match('/png/i', $extension)) {
            $temp = imagecreatefrompng($origin);
        } else if (preg_match('/gif/i', $extension)) {
            $temp = imagecreatefromgif($origin);
        } else if (preg_match('/bmp/i', $extension)) {
            $temp = imagecreatefrombmp($origin);
        }
        if ($temp) {
            $image = is_null($name) ? url_title(substr(join($names, '.'), 0, (-1 * strlen($extension))), '-', true) . '.jpg' : $name;
            imagejpeg($temp, FCPATH . $path . $image, 100);
            imagedestroy($temp);
            $data = array(
                'path'    => $path,
                'image'   => $image,
            );
        }
        return $data;
    }
}
