<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

  $res->status(501);
  $db = \Rapid\Database::getPDO();

  $shoes = Shoe::findAll($db);

  $res->render('main', 'display-shoes', [

    'displayShoes' => $shoes->fetchAll()
]);

} ?>

