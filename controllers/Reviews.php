<?php require_once('./models/Review.php'); ?>
<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

  session_start();

  $res->status(501);
  $db = \Rapid\Database::getPDO();
  $reviews = Review::findAll($db);
  $shoes = Shoe::findAll($db);

  $role = '';
  if(!empty($_SESSION['ROLE'])) {
    $role = $_SESSION['ROLE'];
  }
  
  $username = '';
  if(!empty($_SESSION['USERNAME'])) {
    $username = $_SESSION['USERNAME'];
  }

  $res->render('main', 'review', [
    'userName'       => $username,
    'displayReviews' => $reviews->fetchAll(),
    'displayShoes'   => $shoes->fetchAll()
]);

} ?>
