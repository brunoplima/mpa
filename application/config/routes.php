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
|	$route['default_controller'] = 'welcome';
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

$route['default_controller'] = "userauth";
$route['404_override'] = '';


# Prova
$route['prova/gerar']                                     = 'prova/generate';
$route['prova/corrigir']                                  = 'prova/evaluateAndStore';
$route['prova/visualizar/(:num)']                         = "prova/view/$1";
$route['prova/estatisticas/(:num)']                       = "prova/statistics/$1";
$route['prova/respostas/(:num)']                          = "prova/answers/$1";
$route['prova/lista']                                     = "prova/myList";

# Ranking
$route['ranking/questoes']                                = "ranking/questions_index";
$route['ranking/questoes/(:any)']                         = "ranking/questions/$1";
$route['ranking/alunos']                                  = "ranking/students_index";
$route['ranking/alunos/(:any)']                           = "ranking/students/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */