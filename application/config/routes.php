<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['v1/titles/(:num)']['get'] = "v1/titles/get_title/$1";
$route['v1/titles']['get'] = "v1/titles/list_titles";
$route['v1/titles/(:num)']['patch'] = "v1/titles/update_title/$1";
$route['v1/titles']['post'] = "v1/titles/create_title";
$route['v1/titles/search']['post'] = "v1/titles/search_title";

$route['v1/books/(:num)']['get'] = "v1/books/get_book/$1";
$route['v1/books']['get'] = "v1/books/list_books";
$route['v1/books/(:num)']['patch'] = "v1/books/update_book/$1";
$route['v1/books']['post'] = "v1/books/create_book";
$route['v1/books/(:num)']['delete'] = "v1/books/delete_book/$1";
$route['v1/books/search']['post'] = "v1/books/search_book_by";
$route['v1/books/return/(:num)']['patch'] = "v1/books/return_book/$1";
$route['v1/books/return']['get'] = "v1/books/list_returnbooks";
$route['v1/books/borrow']['post'] = "v1/books/borrow_book";

$route['v1/users/(:num)']['get'] = "v1/users/get_user/$1";
$route['v1/users']['get'] = "v1/users/list_users";
$route['v1/users/(:num)']['patch'] = "v1/users/update_user/$1";
$route['v1/users']['post'] = "v1/users/create_user";
$route['v1/users/(:num)']['delete'] = "v1/users/delete_user/$1";
$route['v1/users/search']['post'] = "v1/users/search_user_by";
$route['v1/users/login']['post'] = "v1/users/login";
$route['v1/users/logout']['post'] = "v1/users/logout";
$route['v1/users/session']['post'] = "v1/users/session_update";
$route['v1/users/getvalues']['post'] = "v1/users/get_vales_from_session_hash";

$route['v1/subjects/(:num)']['get'] = "v1/subjects/get_subject/$1";
$route['v1/subjects']['get'] = "v1/subjects/list_subjects";
$route['v1/subjects/(:num)']['patch'] = "v1/subjects/update_subject/$1";
$route['v1/subjects']['post'] = "v1/subjects/create_subject";
$route['v1/subjects/search']['post'] = "v1/subjects/searchSubject";

// Front-end routes
//Book
$route['book']['get'] = "book/index";
$route['viewbook']['get'] = "book/viewBook";
$route['borrow']['get'] = "book/borrowBook";
$route['return']['get'] = "book/returnBook";
$route['searchreturn']['get'] = "book/searchReturn";
$route['viewreturn']['get'] = "book/viewReturn";

//Title
$route['title']['get'] = "title/index";
$route['viewtitle']['get'] = "title/viewTitle";
$route['title-success']['get'] = "title/viewTitleSuccess";
$route['title-fail']['get'] = "title/viewTitleFail";

//User
$route['user']['get'] = "user/index";
$route['viewuser']['get'] = "user/viewUser";
$route['user-success']['get'] = "user/viewUserSuccess";
$route['user-fail']['get'] = "user/viewUserFail";

//Subject
$route['subject']['get'] = "subject/index";
$route['subject-success']['get'] = "subject/viewSubjectSuccess";
$route['subject-fail']['get'] = "subject/viewSubjectFail";

//Process
$route['process']['get'] = "process/index";