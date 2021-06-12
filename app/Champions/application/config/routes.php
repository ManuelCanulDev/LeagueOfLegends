<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['add-champion'] = 'welcome/addChampion';

$route['edit-champion/(:num)'] = 'welcome/editarChampion/$1';

$route['view-champion/(:num)'] = 'welcome/verChampion/$1';

$route['add-hability/(:num)'] = 'welcome/agregarHabilidad/$1';

$route['add-stats/(:num)'] = 'welcome/agregarEstadistica/$1';

$route['add-tips/(:num)'] = 'welcome/agregarTip/$1';

$route['champion-succefully-added/(:num)'] = 'welcome/championAgregado/$1';