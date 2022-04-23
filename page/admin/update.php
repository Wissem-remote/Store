<?php

require './vendor/autoload.php';

use App\Nav;

$lien= new Nav;
$home = $lien->link('/admin/connect','Home');
$article = $lien->link('/admin/add','Ajouter Des Articles');
$nav = <<<HTML
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
   
    <span class="navbar-brand " >Administration</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    $home
                    </li>
                    <li class="nav-item">
                    $article
                    </li>
                </ul>
                <a class="text-decoration-none text-white" href="/admin/logout">
                <button class="btn btn-info text-white" type="submit">Logout</button>
                </a>
            
        </div>
    </div>
</nav>
HTML;
dump($params)
?>



<h2> Editions de votre Article</h2>