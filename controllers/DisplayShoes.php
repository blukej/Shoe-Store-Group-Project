<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

  $res->status(501);
  $db = new PDO('mysql:host=localhost;dbname=shoe_shop;
  charset=utf8mb4', 'root', '');

  $shoes = Shoe::findAll($db);

  $res->render('main', 'display-shoes', [

    'displayShoes' => $shoes->fetchAll()
]);

} ?>

