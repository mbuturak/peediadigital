<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
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

//Contact List
$route['cms/contact-management'] =  'DashboardContact';
$route['cms/edit-message/(:any)'] =  'DashboardContact/updateForm/$1';
$route['cms/remove-message/(:any)'] =  'DashboardContact/delete/$1';

//Settings
$route['cms/seo-management'] =  'DashboardSettings';
$route['cms/edit-message/(:any)'] =  'DashboardContact/updateForm/$1';
$route['cms/remove-message/(:any)'] =  'DashboardContact/delete/$1';

//Social Networks
$route['cms/social-management'] =  'DashboardSocial';
$route['cms/new-social'] =  'DashboardSocial/addForm';
$route['cms/edit-social/(:any)'] =  'DashboardSocial/updateForm/$1';
$route['cms/remove-social/(:any)'] =  'DashboardSocial/delete/$1';

//User Management
$route['cms/user-management'] =  'DashboardUser';
$route['cms/new-user'] =  'DashboardUser/addForm';
$route['cms/edit-user/(:any)'] =  'DashboardUser/updateForm/$1';
$route['cms/remove-user/(:any)'] =  'DashboardUser/delete/$1';
$route['cms/login'] =  'DashboardUser/loginForm';
$route['cms/logout'] =  'DashboardUser/logout';


//Web
$route['subscribe'] =  'DashboardNewsletter/logout';