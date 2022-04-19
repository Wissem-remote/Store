
<?php 
require './vendor/autoload.php';

use App\Auth;
if(!empty($_GET)){
$pdo = new PDO('sqlite:./db/data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

$auth = new Auth($pdo);
$user = $auth->login($_GET['user'],$_GET['password']);

dump($user);

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