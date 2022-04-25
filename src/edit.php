<?php
namespace App;

class Edit{
    public function add($img,$post,$pdo)
    {
        $query =$pdo->prepare('INSERT INTO article (img, article, content, prix, quantiter, promo, category) 
        VALUES (:img, :article, :content, :prix, :qte, :promo, :cat)');
        $query->execute([
            'img' => $img,
            'article' => $post['titre'],
            'content' => $post['content'],
            'prix' => $post['prix'],
            'qte' => $post['qte'],
            'promo' => $post['promo'],
            'cat' => $post['type'],
        ]);
        header('location: /admin/connect-1');
    }
}