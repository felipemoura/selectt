<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// home
$route['default_controller'] = 'home';
//$route['home/(.*)'] = 'home';
// people
$route['people'] = 'people';
$route['people/(.*)'] = 'people';
// publication
$route['publication'] = 'publication';
$route['publication/(.*)'] = 'publication';
// available techniques
$route['available-techniques'] = 'available_techniques';
$route['available-techniques/(.*)'] = 'available_techniques';
// contact
$route['contact'] = 'contact';
$route['contact/sendContactMail'] = 'contact/sendContactMail';
$route['contact/(.*)'] = 'contact';

// login
$route['login'] = 'login';
$route['login/logout'] = 'login/logout';
$route['login/logout/(.*)'] = 'login/logout';
$route['login/loginCheck'] = 'login/loginCheck';
$route['login/loginCheck/(.*)'] = 'login/loginCheck';
$route['login/(.*)'] = 'login';

// register
$route['register'] = 'register';
$route['register/registerCheck'] = 'register/registerCheck';
$route['register/verify/(:any)'] = 'register/verify/$1';
$route['register/(.*)'] = 'register';

// logged
$route['logged'] = 'logged';
$route['logged/(.*)'] = 'logged';

// inserting
$route['insert_test'] = 'insert_test';
$route['insert_test/insert_database'] = 'insert_test/insert_database';
$route['insert_test/(.*)'] = 'insert_test';

//  results 
$route['results'] = 'results';
$route['results/(.*)'] = 'results';

// form
$route['form'] = 'form';
$route['form/getResults'] = 'form/getResults';
$route['form/(.*)'] = 'form';

// admin
$route['admin'] = 'admin';


// admin techniques
$route['admin/techniques'] = 'admin/techniques';
$route['admin/deleteRecord/(:num)'] = 'admin/deleteRecord/$1';
$route['admin/approveRecord/(:num)'] = 'admin/approveRecord/$1';
$route['admin/editInfo/(:num)'] = 'admin/editInfo/$1';
$route['admin/updateRecord/(:num)'] = 'admin/updateRecord/$1';
// invalid admin techiniquesp ath
$route['admin/techniques/(.*)'] = 'admin/techniques';
$route['admin/deleteRecord/(.*)'] = 'admin/techniques';
$route['admin/approveRecord/(.*)'] = 'admin/techniques';
$route['admin/editInfo/(.*)'] = 'admin/techniques';
$route['admin/updateRecord/(.*)'] = 'admin/techniques';


// admin users
$route['admin/users'] = 'admin/users';
$route['admin/deleteUser/(:num)'] = 'admin/deleteUser/$1';
$route['admin/approveUserAdmin/(:num)'] = 'admin/approveUserAdmin/$1';
$route['admin/disapproveUserAdmin/(:num)'] = 'admin/disapproveUserAdmin/$1';
$route['admin/approveUser/(:num)'] = 'admin/approveUser/$1';
$route['admin/updateUser/(:num)'] = 'admin/updateUser/$1';
$route['admin/editUser/(:num)'] = 'admin/editUser/$1';
// invalid admin users path
$route['admin/users/(.*)'] = 'admin/users';
$route['admin/deleteUser/(.*)'] = 'admin/users';
$route['admin/approveUserAdmin/(.*)'] = 'admin/users';
$route['admin/disapproveUserAdmin/(.*)'] = 'admin/users';
$route['admin/approveUser/(.*)'] = 'admin/users';
$route['admin/updateUser/(.*)'] = 'admin/users';
$route['admin/editUser/(.*)'] = 'admin/users';


// invalid
//$route['(.*)'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
