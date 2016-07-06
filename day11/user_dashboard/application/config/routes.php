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

$route['default_controller'] = "main";
$route['new'] = "main/register";
$route['dashboard'] = "main/dashboard";
$route['signin'] = "main/signin";
$route['register'] = "main/register";
$route['register_process'] = "main/register_process";
$route['reset_session'] = "main/reset_session";
$route['add_post/(:num)'] = "main/add_post/$1";
// $route['add_post'] = "main/add_post";
$route['add_comment/(:num)/(:num)'] = "main/add_comment/$1/$2";
$route['edit/(:num)'] = "main/edit/$1";
$route['remove/(:num)'] = "main/remove/$1";
$route['show/(:num)'] = "main/show/$1";
// $route['show'] = "main/show";

/* End of file routes.php */
/* Location: ./application/config/routes.php */