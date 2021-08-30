<?php

define('LIBS_PATH', '/var/www/html/libs/');
define('SOURCE_PATH', '/var/www/html/src/');

include LIBS_PATH. 'includes/autoloader.php';
Autoloader::register();



$me = new \mkx\Person('Sirleno', 25);

var_dump($me->getAge());

?>