<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']  = 'site';
$route['404_override']        = 'site/page_404';

$route['index']               = 'site/index';
$route['signup']              = 'site/signup';
$route['login']               = 'site/login';
$route['home']                = 'site/home';
$route['explore']             = 'site/explore';

$route['register']            = 'action/register';
$route['auth']                = 'action/auth';
$route['logout']              = 'action/logout';
$route['update']              = 'action/update';
$route['add']                 = 'action/add';
$route['comment']             = 'action/comment';

$route['profile']             = 'users/profile';
$route['edit']                = 'users/edit';
$route['friends']             = 'users/friends';
$route['user/(:any)']         = 'users/detail/$1';
