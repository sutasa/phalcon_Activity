<?php

$router = $di->getRouter();

// Define your routes here
$router->add(
 "/", //root 
 	[
 		"controller" => "home",
 		"action" => "index",
 	]
);
$router->handle();
