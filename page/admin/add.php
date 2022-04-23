<?php

require './vendor/autoload.php';
// on se connect a notre base donnée

$pdo = new PDO('sqlite:./db/data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

use App\Nav;
use App\Img;
use App\Edit;
// initialisation de ma Class
$lien= new Nav;
$check = new Img;
$take = new Edit;
$error = false;

if(!empty($_FILES['img'])){
    $op = $check->Pic($_FILES);
    $pic = $op[0];
    $error= $op[1];
    dump($pic);
}

if(!empty($_POST)){
    $take->add($pic,$_POST,$pdo);
    dump($_POST);
}
//lien navigation
$home = $lien->link('/admin/connect','Home');
$article = $lien->link('/admin/add','Ajouter Des Articles');

//bare de navigation
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

?>

<div class="container mt-4 p-3">
<h2 class="mb-4"> Ajouter votre article</h2>
    <div class="col-8 m-auto">
    <form class="form-group" action="" method="POST" enctype="multipart/form-data" >
        <?php if($error): ?>
        <div class="alert alert-info">
        <?= $error ?>
            </div>
            <?php endif ?>
        <div class="mb-3">
            <label for="formFile" class="form-label">Ajouter une Image .png, .jpeg, .jpg</label>
            <input required class="form-control" type="file" id="formFile" name="img"/>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Ajouter le Titre de Article</label>
            <input required class="form-control" type="text" id="formFile" name="titre"/>
        </div>
       
        <div class=" mb-3">
        <label class="form-label ">Description : </label>
            <textarea required class="form-control" name="content" ></textarea>
          
        </div>
        <div class="mb-3 row g-2">
        <div class="col-md">
        <label class="form-label">Quantité</label>
            <input min="0" required class="form-control" type="number" name="qte"/>
        </div>

        <div class="col-md">
        <label  class="form-label">Prix</label>
            <input placeholder="100 €" min="0" required class="form-control" type="number"  name="prix"/>
        </div>
        

        </div>

        <div class="mb-3 row g-2">

            <div class="col-md">
            <label class="form-label">Promo :</label>
            <input placeholder="10 %" min="0" max="100" required class="form-control" type="number"  name="promo"/>
            </div>

            <div class="col-md">
            <label class="form-label">Type Article :</label>
            <select class="form-select" name="type" aria-label="Default select example">
                <option selected value="article">Article</option>
                <option value="Accessoiries">Accessoiries</option>
            </select>
            </div>
        

        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Envoyer</button>
        </div>
    </form>
    </div>
</div>