<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection( 

	array(
			'driver'	=> 'mysql',
			'host'		=> 'localhost',
			'username'	=> 'root',
			'password'	=> 'root',
			'database'	=> 'arloriaqdb',
			'charset'	=> 'utf8',
			'collation'	=> 'utf8_unicode_ci',
			'prefix'	=> '',
	)

);
$capsule->setAsGlobal();

$capsule->bootEloquent();