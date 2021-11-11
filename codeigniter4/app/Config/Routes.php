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
#$routes->setAutoRoute(true);   //기본설정값
$routes->setAutoRoute(false);   //라우트를 직접 설정할 때 false 권장

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

$routes->match(['get', 'post'], 'news/create', 'News::create');

$routes->get('news/(:segment)', 'News::view/$1');
$routes->get('news', 'News::index');    //http://smallworld.loc/news 이렇게만 입력하면 News컨트롤러의 index메서드가 실행된다

$routes->get('(:any)', 'Pages::view/$1');     //http://smallworld.loc/pages/view/about -> http://smallworld.loc/about  컨트롤러의 메서드의 첫번째 파라미터로 아무거나


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
