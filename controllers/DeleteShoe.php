<?php return function($req, $res) { require_once('./models/Shoe.php');

$db = new PDO('mysql:host=localhost;dbname=shoe_shop;
charset=utf8mb4', 'root', '');

$id = $req->query('shoe_id');

Shoe::delete($db, $id);

$res->redirect('/display-shoes');
} ?>