<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

//$routes->get('Peperoni', 'Peperoni::index');


	
// }

	$routes->get('/', 'Users::index');
	$routes->get('/signin', 'Users::index');
	$routes->get('signout', 'Users::singOut');
	$routes->match(['get','post'],'/signout', 'Users::register');
	//$routes->get('dashboard','Users::index',['filter' => 'auth']);
	//$routes->add('/loginApp','Pizzas::index',['filter' => 'auth']);


	$routes->get('/pizza','Pizzas::index');
	$routes->add('pizza/addPizza','Pizzas::addPizza');
	$routes->add('edit/(:num)', 'Pizzas::editPizza/$1');
	$routes->add('pizza/update', 'Pizzas::updatePizza');
	$routes->add('/delectPizza/(:num)','Pizzas::delectPizza/$1');
	
// 	$routes->group('pizzas', function($routes)
// {
// 	$routes->add('/','Pizzas::index');
// 	$routes->add('add','Pizzas::addPizza');
// 	$routes->add('update','Pizzas::updatePizza');
// 	$routes->add('delete/(:num)','Pizzas::deletePizza/$1');
// 	$routes->add('edit/(:num)','Pizzas::editPizza/$1');

// });
	

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
