<?php return function($req, $res) { require_once('./models/Shoe.php'); 

$db = \Rapid\Database::getPDO();

$shoe = new Shoe([
    'name' => $req->body('name'),
    'brand' => $req->body('brand'),
    'size' => $req->body('size'),
    'price' => $req->body('price'),
    'url' => $req->body('url')
]);

$shoe->save($db);

$res->redirect("/display-shoes");

}?>