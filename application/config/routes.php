<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['v1/books/(:num)']['get'] = "v1/books/get_book/$1";
$route['v1/books']['get'] = "v1/books/list_books";
$route['v1/books/(:num)']['put'] = "v1/books/update_book/$1";
$route['v1/books']['post'] = "v1/books/create_book";
$route['v1/books/(:num)']['delete'] = "v1/books/delete_book/$1";

$route['v1/users/(:num)']['get'] = "v1/users/get_user/$1";
$route['v1/users']['get'] = "v1/users/list_users";
$route['v1/users/(:num)']['put'] = "v1/users/update_user/$1";
$route['v1/users']['post'] = "v1/users/create_user/$1";
$route['v1/users/(:num)']['delete'] = "v1/users/delete_user/$1";

