<?php 
$router->map('GET','/', 'home');

$router->map('GET','/store', 'boutique');
$router->map('GET','/store/[*:slug]', 'boutique');
$router->map('GET','/nos-accesoiries', 'accessoiries');
$router->map('GET','/nous-contact', 'contact');

$router->map('GET','/admin', 'admin/login');
?>
