<?php

require './vendor/autoload.php';

use App\Nav;
use App\Img;
use App\Update;



$pagetitle= "Modifier";

$pdo = new PDO('sqlite:./db/data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
    $error = null;
    
    try{
        $query = $pdo->prepare('SELECT * FROM article WHERE id = :id');
        $query->execute([
            'id' => $params['id']
        ]);
        $value = $query->fetch();
    } catch(PDOException $e){
        $error = $e-> getMessage();
    }


$lien= new Nav;
$take = new Update;
$check = new Img;


if(!empty($_POST)){
    $pic=$value->img;
    if(!empty($_FILES['img']['name'])){
        unlink(substr($pic,1));
        $op = $check->Pic($_FILES);
        $pic = $op[0];
        $error= $op[1];
        dump($pic);
    }
    $take->change($pic,$_POST,$pdo,$value->id);
    
}

$home = $lien->link('/admin/connect','Home');
$article = $lien->link('/admin/add','Ajouter Des Articles/Accessoires');
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



<h2 class="p-3 m-3"> Editions de votre <?= $value->category ?></h2>


<div class="container mt-4 p-3">
<h2 class="mb-4"> Modifier votre <?= $value->category ?></h2>
    <div class="col-8 m-auto">
    <form class="form-group" action="" method="POST" enctype="multipart/form-data" >
        
        <div class="mb-3">
            <label for="formFile" class="form-label">Ajouter une Image .png, .jpeg, .jpg</label>
            <input  class="form-control" type="file" id="formFile" name="img"/>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Modifier le Titre de Article</label>
            <input required value="<?= htmlentities($value->article) ?>" class="form-control" type="text" id="formFile" name="titre"/>
        </div>
    
        <div class=" mb-3">
        <label class="form-label ">Description : </label>
            <textarea required class="form-control" name="content" ><?= htmlentities($value->content) ?></textarea>
        
        </div>
        <div class="mb-3 row g-2">
        <div class="col-md">
        <label class="form-label">Quantité</label>
            <input min="0" value="<?= htmlentities($value->quantiter) ?>" required class="form-control" type="number" name="qte"/>
        </div>

        <div class="col-md">
        <label  class="form-label">Prix</label>
            <input value="<?= htmlentities($value->prix) ?>" placeholder="100 €" min="0" required class="form-control" type="number"  name="prix"/>
        </div>
        

        </div>

        <div class="mb-3 row g-2">

            <div class="col-md">
            <label class="form-label">Promo :</label>
            <input placeholder="10 %" value="<?= htmlentities($value->promo) ?>" min="0" max="100" required class="form-control" type="number"  name="promo"/>
            </div>

        

        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary"> Modifier</button>
        </div>
    </form>
    </div>
</div>