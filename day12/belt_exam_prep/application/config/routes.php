<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'main';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "books";
$route['register'] = "books/register";
$route['login'] = "books/login";
$route['books_main'] = "books/books_main";
$route['add'] = "books/add";
$route['add_review'] = "books/add_review";
$route['add_book_review'] = "books/add_book_review";
$route['display/(:num)'] = "books/display/$1";
$route['display'] = "books/display";
$route['detail/(:num)'] = "books/detail/$1";
$route['user_detail/(:num)'] = "books/user_detail/$1";
$route['remove/(:num)'] = "books/remove/$1";
$route['clear'] = "books/reset_session";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
