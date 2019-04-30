<?php return function($req, $res) { require_once('./models/Shoe.php'); 

    $db = \Rapid\Database::getPDO();

    $id= $_POST['shoe_id'];

    $shoe = new Shoe([
        'name' => $req->body('name'),
        'brand' => $req->body('brand'),
        'size' => $req->body('size'),
        'price' => $req->body('price'),
        'url' => $req->body('url')
    ]);

    $shoe->update($id, $db);

    $res->redirect("/display-shoes");
}?>