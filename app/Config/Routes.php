<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');



$routes->get('/dashboard', 'Dashboard\Home::index');
$routes->get('/addskill', 'Dashboard\Home::add_skill');
$routes->get('/skillanalysis', 'Dashboard\Home::skill_analysis');
$routes->get('/allskills', 'Dashboard\Home::all_skills');
$routes->get('/myaccount', 'Dashboard\Home::myaccount');