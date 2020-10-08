<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']  = 'site';
$route['404_override']        = 'site/page_404';

$route['index']               = 'site/index';
$route['signup']              = 'site/signup';
$route['login']               = 'site/login';
$route['home']                = 'site/home';
$route['explore']             = 'site/explore';
$route['profile/(:any)']      = 'site/profile/$1';
$route['edit']                = 'site/edit';

$route['register']            = 'action/register';
$route['auth']                = 'action/auth';
$route['logout']              = 'action/logout';
$route['update']              = 'action/update';
$route['add/(:any)']          = 'action/add/$1';
$route['comment']             = 'action/comment';
$route['friends']             = 'users/friends';
$route['user/(:any)']         = 'users/detail/$1';
