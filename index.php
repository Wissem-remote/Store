<?php require './ui/connect.php'; ?>
<?php require './vendor/autoload.php'; ?>

<?php 
$router = new AltoRouter();

require './routes/route.php';
$match = $router->match();

if(is_array($match)){
  
    //dump($match);
    //$match['target] ne revoie pas fonction
      if(is_callable($match['target'])){
        call_user_func_array($match['target'],$match['params']);

        }else{
          // je block en temponant 
          ob_start();
          // déclarer la variable params pour la faire passer les infos
          $params = $match['params'];
          require "./page/{$match['target']}.php";
          // puis je sauvegarde mon tempont
          $contenue = ob_get_clean();
        }
    require './components/layout.php';
  }else{
    echo "404";
    // require './components/hearder.php';
    // require "./page/home.php";
    // require './components/footer.php';
  }
?>


