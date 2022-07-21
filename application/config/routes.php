<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'DashboardMain';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cms'] =  'DashboardMain';

//Hero
$route['cms/hero-management'] =  'DashboardHero';

//About
$route['cms/about-management'] =  'DashboardAbout';

//Servces
$route['cms/services-management'] =  'DashboardServices';
$route['cms/new-services'] =  'DashboardServices/addForm';
$route['cms/edit-services/(:any)'] =  'DashboardServices/updateForm/$1';
$route['cms/remove-services/(:any)'] =  'DashboardServices/delete/$1';

//Newsletter
$route['cms/newsletter-management'] =  'DashboardNewsletter';
$route['cms/remove-newsletter/(:any)'] =  'DashboardNewsletter/delete/$1';

//Portfolio
$route['cms/portfolio-management'] =  'DashboardPortfolio';
$route['cms/new-portfolio'] =  'DashboardPortfolio/addForm';
$route['cms/edit-portfolio/(:any)'] =  'DashboardPortfolio/updateForm/$1';
$route['cms/remove-portfolio/(:any)'] =  'DashboardPortfolio/delete/$1';
