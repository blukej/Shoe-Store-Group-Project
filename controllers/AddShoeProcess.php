<?php return function($req, $res) { require_once('./models/Shoe.php'); 

$db = new PDO('mysql:host=localhost;dbname=shoe_shop;
charset=utf8mb4', 'root', '');

$shoe = new Shoe([
    'name' => $req->body('name'),
    'brand' => $req->body('brand'),
    'size' => $req->body('size'),
    'price' => $req->body('price')
]);

$shoe->save($db);

}?>