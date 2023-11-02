<?php

namespace Config;
use App\Controllers\Pages;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->get('login', 'Auth::login');
$routes->get('dashboard', 'Home::index');
$routes->get('employee', 'employee::index');
$routes->get('employee/(:any)', 'employee::view/$1');
$routes->get('clients', 'clients::index');
$routes->get('clients/(:any)', 'clients::view/$1');
$routes->get('projects', 'clients::projects');
$routes->get('transaction', 'transaction::index');
$routes->get('transaction/(:any)', 'transaction::view/$1');
$routes->get('payroll', 'Payroll::index');
$routes->get('bill', 'Bill::index');
$routes->get('attendance', 'Attendance::index');
$routes->get('uniform', 'Uniform::index');
$routes->get('executive', 'Executive::index');
$routes->get('reports', 'Reports::index');
$routes->get('user-setting', 'settings::usersetting');
$routes->get('utilities', 'Utilities::index');
$routes->get('settings', 'Settings::index');

$routes->match(['get', 'post'], 'doLogin', 'Auth::doLogin');
$routes->match(['get', 'post'], 'register', 'Auth::register');
$routes->match(['get', 'post'], 'forgot', 'Auth::forgot');
$routes->match(['get', 'post'], 'applicant', 'Applicant::index');
$routes->match(['get', 'post'], 'reset_password/(:any)', 'Auth::reset_password');
$routes->match(['get', 'post'], 'Employee/(:any)', 'Employee::view/$1');
$routes->match(['get', 'post'], 'attendance', 'Attendance::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
