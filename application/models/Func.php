<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Func extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function auth()
    {
        return $this->session->user ? json_decode(json_encode($this->session->user), false) : null;
    }

    public function logged($required = false)
    {
        $user = $this->auth();
        if ($required) {
            if (is_null($user)) {
                redirect('login');
            }
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
        switch ($type) {
            case 'text':
                $breaks  = array("<br /> ", "<br> ", "<br/> ", "<br />", "<br>", "<br/>");
                $special = array("\"");
                $value   = nl2br($value);
                $value   = addslashes($value);
                $value   = preg_replace('!\s+!', ' ', $value);
                $value   = str_ireplace($breaks, "\r\n", $value);
                $value   = str_ireplace($special, "”", $value);
                $value   = stripslashes($value);
                break;
            case 'number':
                preg_match_all('!\d+!', $value, $matches);
                $value = !is_null($matches) ? join($matches[0], "") : 0;
                break;
            case 'password':
                $value = md5($value);
                break;
            default:
                if (is_null($value) || ($value == "")) {
                    $value = null;
                }
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
        if ($count = count($_FILES[$input]['name'])) {
            for ($i = 0; $i < $count; $i++) {
                $origin    = $_FILES[$input]['tmp_name'][$i];
                $names     = explode('.', $_FILES[$input]['name'][$i]);
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
                    $photo = array(
                        'path'    => $path,
                        'image'   => $image,
                        'sorting' => $i + 1,
                    );
                    array_push($data, $photo);
                }
            }
        }
        return $data;
    }
}
