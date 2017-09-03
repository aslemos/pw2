<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
| ----------------------------------------------
| URI ROUTING
| ----------------------------------------------
*/

/*
$route['usagers/login'] = 'usagers/login';
$route['usagers/logout'] = 'usagers/logout';
$route['usagers/register'] = 'usagers/register';
$route['usagers/update'] = 'usagers/update';
$route['usagers/(:any)'] = 'usagers/view/$1';
//$route['usagers/admin']  = 'usagers/admin';
$route['usagers'] 	 = 'usagers/index';

$route['vehicules/user'] = 'vehicules/user';
$route['vehicules/create'] = 'vehicules/create';
$route['vehicules/update'] = 'vehicules/update';
$route['vehicules/vehicule_list'] = 'vehicules/vehicule_list';
$route['vehicules/(:any)'] = 'vehicules/view/$1';
$route['vehicules'] 	   = 'vehicules/index';

$route['roles/create'] = 'roles/create';
$route['roles/usagers/(:any)'] = 'roles/usagers/$1';
$route['roles'] = 'roles/index';

$route['marques/create'] = 'marques/create';
$route['marques/update'] = 'marques/update';
$route['marques/vehicules/(:any)'] = 'marques/vehicules/$1';
$route['marques'] = 'marques/index';

$route['modeles/create'] = 'modeles/create';
$route['modeles/vehicules/(:any)'] = 'modeles/vehicules/$1';
$route['modeles'] = 'modeles/index';


$route['home/user'] = 'home/user';
$route['home/vehicule'] = 'home/vehicule';
$route['home/about'] = 'home/about';
$route['default_controller'] = 'home/index';
*/
$route['default_controller'] = 'accueil';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
