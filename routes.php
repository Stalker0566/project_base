<?php
// Главная страница
$router->get('/', 'PlanoController@index');
$router->get('/planos', 'PlanoController@index');

// Планы Тренировок
$router->get('/planos/create', 'PlanoController@create');
$router->post('/planos/store', 'PlanoController@store');

// Упражнения
$router->get('/planos/{id}/exercicios/create', 'PlanoController@createExercicio');
$router->post('/planos/{id}/exercicios/store', 'PlanoController@storeExercicio');