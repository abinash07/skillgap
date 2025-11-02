<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/loginme','Auth::loginme');
$routes->get('/glogin', 'Auth::gLogin');
$routes->get('/googlelogin', 'Auth::googleLogin');

$routes->get('/logout','Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/registerme','Auth::registerme');
$routes->get('/forgot', 'Auth::forgot_password');
$routes->post('/forgotpassword', 'Auth::forgot_password_me');
$routes->get('/reset/(:any)', 'Auth::reset_password/$1');
$routes->post('/resetpassword', 'Auth::reset_password_me');

$routes->get('/addskill', 'Home::add_skill');
$routes->post('/insertskill', 'Home::insert_skill');
$routes->get('/addpost', 'Home::add_post');
$routes->post('/insertpost', 'Home::insert_post');
$routes->get('/myaccount', 'Home::myaccount');
$routes->post('/getmypost', 'Home::get_my_post');
$routes->post('/getmyskill', 'Home::get_my_skill');
$routes->post('/updateaccount', 'Home::update_account');
$routes->post('/change_password', 'Home::reset_user_password');
$routes->post('/getpost', 'Home::get_post');
$routes->post('/getsinglepost', 'Home::get_single_post');
$routes->post('/relatedpost', 'Home::get_related_post');
$routes->post('/suggesteduser', 'Home::get_suggested_user');
$routes->get('/search', 'Home::search');
$routes->post('/searchme', 'Home::search_me');
$routes->post('/insertcontactmessage', 'Home::insert_contact_message');
$routes->get('/settings', 'Home::setting');
$routes->post('/updateaccountme', 'Home::update_account_me');
$routes->post('/updatenotification', 'Home::update_notification_setting');
$routes->post('/updateprivacy', 'Home::update_privacy_setting');



$routes->post('/getpopularskill', 'Home::get_popular_skill');
$routes->get('/postdetails/(:any)', 'Home::post_details/$1');
$routes->get('/posts/(:any)', 'Home::post_list/$1');
$routes->post('/getskillpost', 'Home::get_skill_post');


$routes->post('/getuserdata', 'Home::get_user_data');
$routes->post('/getuserpost', 'Home::get_user_post');
$routes->post('/getuserskill', 'Home::get_user_skill');
$routes->post('/insertlove', 'Home::insert_love');
$routes->post('/insertfollow', 'Home::insert_follow');
$routes->post('/insertmyfollow', 'Home::insert_my_follow');

$routes->get('/aboutus', 'Home::about_us');
$routes->get('/contactus', 'Home::contact_us');
$routes->get('/terms', 'Home::term_condition');
$routes->get('/privacy', 'Home::privacy_policy');


$routes->get('(:any)', 'Home::profile/$1');

//$routes->get('/profile', 'Home::profile');
//$routes->get('/dashboard', 'Dashboard\Home::index');
//$routes->get('/addskill', 'Dashboard\Home::add_skill');
// $routes->get('/skillanalysis', 'Dashboard\Home::skill_analysis');
// $routes->get('/allskills', 'Dashboard\Home::all_skills');
// $routes->get('/myaccount', 'Dashboard\Home::myaccount');
// $routes->get('/profile', 'Dashboard\Home::profile');
