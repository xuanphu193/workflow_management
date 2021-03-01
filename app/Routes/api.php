<?php 

$router->get('/api/work/get_data', 'WorkApiController@getData');
$router->post('/api/work/create', 'WorkApiController@create');
$router->post('/api/work/update/{id}', 'WorkApiController@update');
$router->get('/api/work/delete/{id}', 'WorkApiController@delete');