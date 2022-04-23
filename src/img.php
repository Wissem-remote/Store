<?php
namespace App;

class Img{
    public function Pic($file)
    {
        $nameFile = $file['img']['name'];
        $typeFile = $file['img']['type'];
        $sizeFile = $file['img']['size'];
        $tmpFile = $file['img']['tmp_name'];
        $errFile = $file['img']['error'];
        
        $tab = ['png','jpg','jpeg'];
        $type = ['image/png','image/jpg','image/jpeg'];

            // chercher l'extention du ficher grace à la fonction explode appartire du point
            $tabs = explode('.',$nameFile);

        $img = false;
        $error= false;
        if(in_array($typeFile, $type)){
            if(count($tabs) <= 2 && in_array(strtolower(end($tabs)),$tab)){
                    $img= '/asset/'.uniqid().'.'.strtolower(end($tabs));
                    
                    move_uploaded_file($tmpFile,'.'.$img);
            }else{
                $error="Désoler le fichier est inccorect !";
            }
        }else{
            $error=" Le type de votre image ne corespond pas";
        }
        return [$img,$error];
    }
}