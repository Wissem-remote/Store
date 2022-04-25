<?php
namespace App;

class Update{
    public function change($img,$post,$pdo,$id)
    {
        $query =$pdo->prepare('UPDATE article 
        SET img = :img, article = :article, content = :content, prix = :prix,
        quantiter = :qte, promo = :promo WHERE id = :id');
        $query->execute([
            'id' => $id,
            'img' => $img,
            'article' => $post['titre'],
            'content' => $post['content'],
            'prix' => $post['prix'],
            'qte' => $post['qte'],
            'promo' => $post['promo']
            ]);
        header('location: /admin/connect-2');
    }
}