
<?php 
require './vendor/autoload.php';
$pagetitle="Admin";
use App\Auth;
// on démare une session
session_start();

// on se connect a notre base donnée

$pdo = new PDO('sqlite:./db/data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

// on attribut a notre variable la classe Auth
$auth = new Auth($pdo);

// on  vérifie si notre est déja en ligne 
if($auth->user() !== null){
    header('location: /admin/connect');
    exit();
}

// on intialise notre message error
$error= false;

// on verfie notre GET via identifiant mot passe

if(!empty($_GET)){
    $user = $auth->login($_GET['user'],$_GET['password']);
            if($user){
                header('location: /admin/connect');
                exit();
                    }
    $error = true;
                }


$pagetitle = "Administration";
$nav = <<<HTML
<nav class="navbar navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Administration</a>
  </div>
</nav>
HTML;
?>

<div class="container mt-4">
<form class="m-auto col-6" action="" method="GET">

<h2> Connecter-vous !</h2>

<?php if($error): ?>
 <div class="alert alert-info">
 Vos identifiant ne sont pas correcte !
 </div>
<?php endif ?>

    <div class="mb-3">
        <label for="exampleInputUser" class="form-label">Identifiant</label>
        <input type="text" class="form-control" id="exampleInputUser" name="user">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>