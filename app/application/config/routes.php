<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pastes/app';

$route['(:any)'] = 'pastes/app/$1';
$route['api/get/(:any)'] = 'api/get/$1';
$route['api/new'] = 'api/new';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
