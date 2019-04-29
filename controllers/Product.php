<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

session_start();

$res->status(501);

$role = '';
if(!empty($_SESSION['ROLE'])) {
  $role = $_SESSION['ROLE'];
}

$username = '';
if(!empty($_SESSION['USERNAME'])) {
  $username = $_SESSION['USERNAME'];
}

$db = \Rapid\Database::getPDO();

$shoes = Shoe::findAll($db);

$res->render('main', 'products', [
  'message' => $req->query('success')? 'Successful!': '',
  'role' => $role,
  'username' => $username,
  'displayShoes' => $shoes->fetchAll()   
]);

} ?>