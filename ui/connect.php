<?php   
$pdo = new PDO('sqlite:./db/data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
    $error = null;
    try{
        $query = $pdo->query('SELECT * FROM article DESC');
        $value = $query->fetchAll();
    } catch(PDOException $e){
        $error = $e-> getMessage();
    }
    
//   echo '<pre>'.print_r($value).'</pre>';
?>

<?php if($error): ?>
<div class="alert alert-danger">
    <?= $error; ?>
</div>

<?php endif ?>

