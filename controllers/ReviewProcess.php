<?php require_once('./models/Review.php'); ?>
<?php return function($req, $res) {

  session_start();

  if (!isset($_SESSION['ROLE'])) {
    header('Location: login');
    exit();
  }

  $db = \Rapid\Database::getPDO();

  echo $req->body('userName');

  $review = new Review([
    'userName' => $req->body('userName'),
    'review' => $req->body('review_content'),
]);

  $review->save($db);

  //$res->redirect("/reviews");

} ?>
