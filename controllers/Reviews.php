<?php require_once('./models/Review.php'); ?>
<?php require_once('./models/Login.php'); ?>
<?php return function($req, $res) {

  session_start();

  if (!isset($_SESSION['ROLE'])) {
    header('Location: login');
    exit();
  }

  $res->status(501);
  $db = \Rapid\Database::getPDO();

  $res->render('main', 'review', [
    'userName' => $_SESSION['USERNAME']
]);

} ?>
