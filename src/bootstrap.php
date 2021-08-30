<?php

include('includes/autoloader.php');
Autoloader::register();



$me = new \mkx\Person('Sirleno', 25);

var_dump($me->getAge());

?>