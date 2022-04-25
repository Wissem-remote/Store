<?php 
$router->map('GET','/', 'home');

$router->map('GET','/store', 'boutique');
$router->map('GET','/store/[*:slug]', 'boutique');
$router->map('GET','/nos-accesoiries', 'accessoiries');
$router->map('GET','/nous-contact', 'contact');

$router->map('GET','/admin', 'admin/login');

$router->map('GET','/admin/connect', 'admin/auth');

$router->map('GET','/admin/connect-[*:tag]', 'admin/auth');

$router->map('GET','/admin/logout', 'admin/logout');
$router->map('GET|POST','/admin/add', 'admin/add');

$router->map('GET|POST','/admin/edit/[*:id]', 'admin/update');

?>
