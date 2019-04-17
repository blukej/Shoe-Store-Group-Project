<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {
    
    $db = new PDO('mysql:host=localhost;dbname=shoe_shop;
charset=utf8mb4', 'root', '');

    $id = $req->query('update');

    $arr = Shoe::findOneById($id, $db);

    $res->render('main', 'update-shoe', [
        'message'   => $req->query('success')? 'Successful!': '',
        'name'      => $arr[0]['name'],
        'brand'      => $arr[0]['brand'],
        'size'      => $arr[0]['size'],
        'price'      => $arr[0]['price'],
    ]);

} ?>