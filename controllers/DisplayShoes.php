<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

  session_start();

  if (($_SESSION['ROLE']) != 'manager') {
    header('Location: home');
    exit();
  }

  $res->status(501);
  $db = \Rapid\Database::getPDO();

  $shoes = Shoe::findAll($db);

  $res->render('main', 'display-shoes', [

    'displayShoes' => $shoes->fetchAll()
]);

} ?>

