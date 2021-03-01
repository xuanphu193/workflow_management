<?php 

$router->get('/home', 'HomeController@index');
$router->get('/work', 'WorkController@index');
$router->get('/work/create', 'WorkController@create');
$router->post('/work/create', 'WorkController@create');
$router->get('/work/edit/{id}', 'WorkController@edit');
$router->post('/work/update/{id}', 'WorkController@update');
$router->get('/work/delete/{id}', 'WorkController@delete');