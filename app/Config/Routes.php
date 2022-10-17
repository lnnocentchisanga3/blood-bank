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
$routes->get('/', 'Login::index');
$routes->get('logout', 'Logout::index');
/*$routes->get('addinputs', 'Adddonors::addinputs');*/

$routes->group('',['filter'=>'isLogedin'],function($routes){
    $routes->get('','Dashboard::index');
    $routes->get('dashboard/(:any)','Dashboard::index/$1');
    $routes->get('adddonors/(:any)','Adddonors::index/$1');
    $routes->get('dataentry/(:any)','Adddonors::dataentry/$1');
    $routes->get('logout', 'Logout::index');
    $routes->get('donationsites/(:any)','Donationsites::index/$1');
    $routes->get('addsites/(:any)','Dashboard::addsites/$1');
    $routes->get('managedonationsites/(:any)','Dashboard::managedonationsites/$1');
    $routes->get('viewdonationsite/(:any)','Donationsites::view/$1');
    $routes->get('sitedataprint/(:any)/(:num)','Donationsites::sitedata/$1/$2');
    $routes->get('viewprintadata/(:any)/(:num)','Donationsites::viewprintadata/$1/$2');
    $routes->get('deleteSite/(:any)/(:num)','Donationsites::deleteSite/$1/$2');
    $routes->get('editSites/(:any)/(:num)','Donationsites::editSite/$1/$2');
    $routes->get('users/(:any)','Login::users/$1');
    $routes->get('addstaff/(:any)','Login::adduser/$1');
    $routes->get('deleteUser/(:num)/(:any)','Login::deleteUser/$1/$2');
    $routes->get('editStaff/(:num)/(:any)','Login::editStaff/$1/$2');
    $routes->get('listdonors/(:any)','Listdonors::index/$1');
    $routes->get('listdata/(:any)','Listdonors::listdata/$1');
    $routes->get('edit_donor/(:num)/(:any)','Listdonors::edit_donor/$1/$2');
    $routes->get('delete_donor/(:num)/(:any)','Listdonors::delete/$1/$2');

    $routes->get('donordataclerk/(:any)','DonorDataClerk::index/$1');
    $routes->get('donorsection/(:any)','DonorSection::index/$1');
    $routes->get('donorsectionAlldonors/(:any)','DonorSection::listdonors/$1');
    $routes->get('donorsectiondonationsites/(:any)','DonorSection::donationsites/$1');

    $routes->get('donorsectionsitedonors/(:num)/(:any)','DonorSection::sitedonors/$1/$2');
    $routes->get('datedonorsectionsitedonors/(:num)','DonorSection::datesitedonors/$1');
    $routes->get('oneAdddonor/(:any)','Adddonors::oneAdddonor/$1');

    $routes->get('edit_donor_data/(:num)/(:any)','Listdonors::edit_donor_data/$1/$2');
    $routes->get('delete_donor_data/(:num)/(:any)','Listdonors::delete_data/$1/$2');
    $routes->get('viewdonationsitedata/(:any)','Donationsites::viewdata/$1');

    $routes->get('deleteSiteData/(:any)/(:num)','Donationsites::deleteSitedata/$1/$2');
    $routes->get('editSitesData/(:any)/(:num)','Donationsites::editSitedata/$1/$2');

    $routes->get('printData/(:any)/(:num)','DonorSection::printdata/$1/$2');

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
