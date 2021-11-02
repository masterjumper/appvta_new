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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = "/Login/inicio";
$route['signin'] = "/Login/index";
$route['successpage'] = "/Login/successpage";

$route['inicio'] = "/Login/inicio";
$route['login'] = "login/verificar";

$route['grupo'] = "/grupo";
$route['new_grupo'] = "/grupo/new_grupo";
$route['grupo/(:any)']['DELETE'] = "grupo/delete/$1";

$route['usuario'] = "/usuario";
$route['new_usuario'] = "/usuario/new_usuario";
$route['usuario/(:any)']['DELETE'] = "usuario/delete/$1";

$route['grupocrea'] = "/grupocrea";
$route['new_grupocrea'] = "/grupocrea/new_grupocrea";
$route['grupocrea/(:any)']['DELETE'] = "grupocrea/delete/$1";

$route['alimentacion'] = "/alimentacion";
$route['new_alimentacion'] = "/alimentacion/new_alimentacion";
$route['alimentacion/(:any)']['DELETE'] = "alimentacion/delete/$1";

$route['biotipoanimal'] = "/biotipoanimal";
$route['new_biotipoanimal'] = "/biotipoanimal/new_biotipoanimal";
$route['biotipoanimal/(:any)']['DELETE'] = "biotipoanimal/delete/$1";

$route['biotipoanimal'] = "/destino";
$route['new_destino'] = "/destino/new_destino";
$route['destino/(:any)']['DELETE'] = "destino/delete/$1";

$route['provincia'] = "/provincia";
$route['new_provincia'] = "/provincia/new_provincia";
$route['provincia/(:any)']['DELETE'] = "provincia/delete/$1";

$route['localidad'] = "/localidad";
$route['new_localidad'] = "/localidad/new_localidad";
$route['localidad/(:any)']['DELETE'] = "localidad/delete/$1";

$route['rol'] = "/rol";
$route['new_rol'] = "/rol/new_rol";
$route['rol/(:any)']['DELETE'] = "rol/delete/$1";

$route['persona'] = "/persona";
$route['new_persona'] = "/persona/new_persona";
$route['persona/(:any)']['DELETE'] = "persona/delete/$1";

$route['planta'] = "/planta";
$route['new_planta'] = "/planta/new_planta";
$route['planta/(:any)']['DELETE'] = "planta/delete/$1";