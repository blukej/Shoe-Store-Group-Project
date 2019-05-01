<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

  session_start();

  if (($_SESSION['ROLE']) != 'manager') {
    header('Location: home');
    exit();
  }

  $role = '';
  if(!empty($_SESSION['ROLE'])) {
    $role = $_SESSION['ROLE'];
  }
  
  $username = '';
  if(!empty($_SESSION['USERNAME'])) {
    $username = $_SESSION['USERNAME'];
  }

  $res->status(501);
  $db = \Rapid\Database::getPDO();

  $shoes = Shoe::findAll($db);

  $res->render('main', 'display-shoes', [
    'username'       => $username,
    'role'         => $role,
    'displayShoes' => $shoes->fetchAll()
]);

} ?>

