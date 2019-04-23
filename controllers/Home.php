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

  $res->render('main', 'home', [
    'message' => $req->query('success')? 'Successful!': '',
    'role' => $role,
    'username' => $username   
  ]);

} ?>