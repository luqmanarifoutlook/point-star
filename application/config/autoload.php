<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages']  = array();
$autoload['drivers']   = array();
$autoload['config']    = array();
$autoload['language']  = array();
$autoload['helper']    = array('url', 'form', 'security', 'file');
$autoload['libraries'] = array('database', 'session', 'form_validation', 'user_agent');
$autoload['model']     = array('data', 'func');
