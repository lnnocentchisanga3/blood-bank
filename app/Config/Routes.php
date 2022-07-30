<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('logout', 'Logout::index');
/*$routes->get('addinputs', 'Adddonors::addinputs');*/

$routes->group('',['filter'=>'isLogedin'],function($routes){
    $routes->get('','Dashboard::index');
    $routes->get('dashboard','Dashboard::index');
    $routes->get('adddonors','Adddonors::index');
    $routes->get('logout', 'Logout::index');
    $routes->get('donationsites','Donationsites::index');
    $routes->get('donationsites/view/(:any)','Donationsites::view/$1');
    $routes->get('donationsites/viewprint/(:num)/(:any)','Donationsites::viewprint/$1/$2');
    $routes->get('files','Files::index');
    $routes->get('listdonors','Listdonors::index');
    $routes->get('listdonors/edit(:any)','edit::index/$1');
    $routes->get('listdonors/delete(:any)','delete::index/$1');

});

$routes->group('',['filter'=>'notIsLoggedIn'],function($routes){
    $routes->get('','Login::index');
    $routes->get('login','Login::index');
    $routes->get('/', 'Home::index');
});

/*$routes->get('auth/login','Login::index');*/

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
