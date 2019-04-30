<?php require_once('./models/Review.php'); ?>
<?php require_once('./models/Shoe.php'); ?>
<?php return function($req, $res) {

  session_start();

  if (!isset($_SESSION['ROLE'])) {
    header('Location: login');
    exit();
  }

  $res->status(501);
  $db = \Rapid\Database::getPDO();
  $reviews = Review::findAll($db);
  $shoes = Shoe::findAll($db);

  $res->render('main', 'review', [
    'userName'       => $_SESSION['USERNAME'],
    'displayReviews' => $reviews->fetchAll(),
    'displayShoes'   => $shoes->fetchAll()
]);

} ?>
