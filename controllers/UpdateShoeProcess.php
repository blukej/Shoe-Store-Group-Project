<?php return function($req, $res) { require_once('./models/Shoe.php'); 

$db = new PDO('mysql:host=localhost;dbname=shoe_shop;
charset=utf8mb4', 'root', '');

$id= $_POST['shoe_id'];

$shoe = new Shoe([
    'name' => $req->body('name'),
    'brand' => $req->body('brand'),
    'size' => $req->body('size'),
    'price' => $req->body('price')
]);

$shoe->update($id, $db);

$res->redirect("/display-shoes");
}?>