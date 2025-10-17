<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/loginme','Auth::loginme');
$routes->get('/logout','Auth::logout');

$routes->get('/addskill', 'Home::add_skill');
$routes->post('/insertskill', 'Home::insert_skill');
$routes->post('/insertpost', 'Home::insert_post');
$routes->get('/myaccount', 'Home::myaccount');
$routes->post('/getpost', 'Home::get_post');
$routes->get('/profile', 'Home::profile');

//$routes->get('/dashboard', 'Dashboard\Home::index');
//$routes->get('/addskill', 'Dashboard\Home::add_skill');
// $routes->get('/skillanalysis', 'Dashboard\Home::skill_analysis');
// $routes->get('/allskills', 'Dashboard\Home::all_skills');
// $routes->get('/myaccount', 'Dashboard\Home::myaccount');
// $routes->get('/profile', 'Dashboard\Home::profile');
