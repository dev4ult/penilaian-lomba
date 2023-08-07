<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('DashboardController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'DashboardController::index', ['filter' => 'authenticate']);
$routes->group('login', ['filter' => 'redirectIfAuth'], function ($routes) {
    $routes->get('/', 'AuthController::index');
    $routes->post('/', 'AuthController::login');
});

$routes->get('logout', 'AuthController::logout', ['filter' => 'authenticate']);

$routes->get('users', 'UserController::index', ['filter' => ['authenticate', 'adminAuth']]);

$routes->group('user', ['filter' => ['authenticate', 'adminAuth']], function ($routes) {
    $routes->post('put', 'UserController::put_edit');
    $routes->post('add', 'UserController::post_add');
    $routes->get('delete/(:any)', 'UserController::delete_user/$1');
    $routes->get('(:any)', 'UserController::get_detail_json/$1');
});

$routes->get('contests', 'ContestController::index', ['filter' => 'authenticate']);

$routes->group('contest', ['filter' => 'authenticate'], function ($routes) {
    $routes->group('add', function ($routes) {
        $routes->get('/', 'ContestController::get_add');
        $routes->post('/', 'ContestController::post_add');
    });

    $routes->get('edit/(:any)', 'ContestController::get_edit/$1');
    $routes->post('put', 'ContestController::put_edit');

    $routes->get('get-register-contestants/(:any)', 'ContestController::get_register_contestants_json/$1');
    $routes->post('register-contestant', 'ContestController::register_contestant');
    $routes->Get('remove-contestant/(:any)/(:any)', 'ContestController::remove_contestant/$1/$2');

    $routes->group('evaluation-aspect',  function ($routes) {
        $routes->post('add', 'ContestController::post_eval_aspect');
        $routes->post('put', 'ContestController::put_eval_aspect');
        $routes->get('delete/(:any)/(:any)', 'ContestController::delete_eval_aspect/$1/$2');
        $routes->get('(:any)', 'ContestController::get_eval_aspect/$1');
    });

    $routes->group('contestant-evaluation', function ($routes) {
        $routes->post('put', 'ContestController::put_contestant_eval');
        $routes->get('(:any)/(:any)', 'ContestController::get_contestant_eval/$1/$2');
    });

    $routes->get('(:any)', 'ContestController::get_detail/$1');
});

$routes->get('contestants', 'ContestantController::index', ['filter' => 'authenticate']);

$routes->group('contestant', ['filter' => 'authenticate'], function ($routes) {
    $routes->group('add', static function ($routes) {
        $routes->get('/', 'ContestantController::get_add');
        $routes->post('/', 'ContestantController::post_add');
    });

    $routes->get('edit/(:any)', 'ContestantController::get_edit/$1');
    $routes->post('put', 'ContestantController::put_edit');
    $routes->get('delete/(:any)', 'ContestantController::delete_contestant/$1');

    $routes->get('(:any)', 'ContestantController::get_detail_json/$1');
});


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
