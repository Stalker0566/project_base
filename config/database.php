<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'bd_ginasio',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Эта строчка делает так, что тебе больше НИКОГДА не нужно писать 
// "use Illuminate\Database\Eloquent\Model;" в моделях!
class_alias('Illuminate\Database\Eloquent\Model', 'Model');
