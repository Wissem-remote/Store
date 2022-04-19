<?php
function nav(string $lien, string $title):string
{
    $class = "nav-link";
    if($_SERVER['SCRIPT_NAME'] === $lien){
        $class .= " active";
    }
    return "<a class='".$class."' href='".$lien."'>".$title."</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            <?= $pagetitle ?? 'Mon Site' ?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <?= $nav ?? ' 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid me-2 ms-2">
            <span class="navbar-brand " >Site Web</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
            <div class="navbar-nav ms-auto">
            '. nav('/','ACCEUIL') .'
            '. nav('/store','BOUTIQUE') .'
            '. nav('/nos-accesoiries','ACCESSOIRIES') .'
            '. nav('/nous-contact','CONTACT') .'
            
            </div>
            </div>
        </div>
        </nav> '; ?>


<?= $contenue ?>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>