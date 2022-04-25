<?php   
$pdo = new PDO('sqlite:./db/data.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
    $error = null;
    
    try{
        $query = $pdo->prepare('SELECT * FROM article WHERE category = :cat');
        $query->execute([
            'cat' => $type ?? "article"
        ]);
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

