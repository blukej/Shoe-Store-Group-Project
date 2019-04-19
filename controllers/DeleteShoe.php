<?php return function($req, $res) { require_once('./models/Shoe.php');

$db = \Rapid\Database::getPDO();

$id = $req->query('shoe_id');

Shoe::delete($db, $id);

$res->redirect('/display-shoes');
} ?>