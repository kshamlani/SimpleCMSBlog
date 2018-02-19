<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['contents/create'] = 'contents/create';
$route['contents/update'] = 'contents/update';
$route['contents/(:any)'] = 'contents/view/$1';
$route['contents'] = 'contents/index';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/contents/(:any)'] = 'categories/contents/$1';

$route['edit-admins'] = 'admins/edit_admins';
$route['edit-admin/(:any)'] = 'admins/edit_admin/$1';
$route['delete-admin'] = 'admins/delete_admin';

$route['default_controller'] = 'contents';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
