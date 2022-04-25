<?php

require './vendor/autoload.php';

if(!empty($_GET['id'])){
  $type= "accessoiries";
  }

require './ui/connect.php';
use App\Nav;
$pagetitle= "Welcome";
$lien= new Nav;
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
$rvalue = array_reverse($value);
?>

<div class="container mt-4">
  <div class="d-flex justify-content-between">
  <h2 class="block col-md"> Bienvenue dans l'espace Administration.</h2>
  <?php if(isset($params['tag'])): ?>
        <div class=" alert alert-info col-md-3 ">
        <?php if($params['tag'] === '2'): ?>
          Felicitation votre Items viens etre Modifier
        <?php endif ?>
        <?php if($params['tag'] === '1'): ?>
          Felicitation vous venez ajouter un Item
        <?php endif ?>
      </div>
    <?php endif ?>
  </div>

  
    <div class="row">

    <a href="/admin/connect" class="btn btn-outline-primary col-lg-1 m-2"> Article</a>
    <a href="/admin/connect?id=1" class="btn btn-outline-primary col-lg-1 m-2"> Accessoire</a>
        <h2 class="p-3 m-3"><?php echo (isset($type))?  "Vos Accessoiries" : "Vos Article" ?></h2>
            <?php foreach($rvalue as $values): ?>
            <div class="card col-lg-2 m-3" >
              <img src="<?= $values->img ?>" class="card-img-top" alt="<?= $values->article ?>">
                <div class="card-body">
                  <h5 class="card-title"><?= $values->article ?></h5>
                  <a href="<?= "/admin/edit/".$values->id ?>" class="btn btn-primary">Update</a>
                  <a href="<?= "/admin/delete/".$values->id ?>" class="btn btn-danger">Delete</a>
                </div>
              </div>
              <?php endforeach ?>
    </div>


</div>