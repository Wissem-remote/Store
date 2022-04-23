<?php
namespace App;

class Nav{
    public function link(string $lien, string $title):string
    {
        $class = "nav-link";
        if($_SERVER['REQUEST_URI'] === $lien){
            $class .= " active";
        }
        return "<a class='".$class."' href='".$lien."'>".$title."</a>";
    }
}